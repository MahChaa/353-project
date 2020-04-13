<?php

require_once(__DIR__ . '/../HTMLUtils.php');

abstract class Table {
    /**
     * Converts the doc comment's JORM to an array.
     *
     * @param string $docComment the doc comment of the property.
     *
     * @return array
     */
    private static function convertDocCommentToJORM(string $docComment): array {
        preg_match_all('/(\w+)\s*=\s*([^,\n\r]+)/', $docComment, $matches);

        return array_combine($matches[1], $matches[2]);
    }

    private static function getClassHeaderJORM() {
        $reflectionClass = new ReflectionClass(get_called_class());
        return self::convertDocCommentToJORM($reflectionClass->getDocComment());
    }

    /**
     * @param array $row
     * @throws ReflectionException
     */
    public function convertRelationToObject(array $row): void {
        $reflectionClass = new ReflectionClass($this);

        foreach ($reflectionClass->getProperties() as $property) {
            $jormInfo = $this->convertDocCommentToJORM($property->getDocComment());

            if (isset($jormInfo['oneToMany'])) {
                continue;
            }

            $dbColumn = $jormInfo['col'];

            $property->setValue($this, $row[$dbColumn]);
        }
    }

    /**
     * @param string $whereClause
     * @return string
     * @throws ReflectionException
     */
    public static function constructViewHTMLTable(string $whereClause = ''): string {
        global $database;
        $reflectionClass = new ReflectionClass(get_called_class());

        $jormInfo = self::getClassHeaderJORM();
        $sqlRows = $database->queryAllRowsFromTable($jormInfo['table'], $whereClause);

        $resultTable = '<table class="db-table">';
        $resultTable .= self::constructHTMLTableHeaders($reflectionClass);

        $resultTable .= '<tbody>';
        foreach ($sqlRows as $row) {
            /* @var Table $instance */
            $instance = $reflectionClass->newInstance();

            $instance->convertRelationToObject($row);
            $resultTable .= $instance->constructHTMLTableRow($reflectionClass);
        }
        $resultTable .= '</tbody>';

        $resultTable .= '</table>';

        return $resultTable;
    }

    private static function constructHTMLTableHeaders(ReflectionClass $reflectionClass): string {
        $headerResult = '<thead>';

        foreach ($reflectionClass->getProperties() as $property) {
            $jormInfo = self::convertDocCommentToJORM($property->getDocComment());
            $headerResult .= '<th>' . $jormInfo['header'] . '</th>';
        }
        $headerResult .= '<th colspan="2"></th>';

        $headerResult .= '</thead>';
        return $headerResult;
    }

    /**
     * Converts the object to an HTML table row.
     *
     * @param ReflectionClass $reflectionClass
     * @return string
     */
    private function constructHTMLTableRow(ReflectionClass $reflectionClass): string {
        global $database;

        $classJORM = self::getClassHeaderJORM();
        $primaryKey = -1;
        $retVal = '<tr>';

        foreach ($reflectionClass->getProperties() as $property) {
            $jormInfo = $this->convertDocCommentToJORM($property->getDocComment());

            if (isset($jormInfo['volatile']) && $jormInfo['volatile'] === '0') {
                if ($primaryKey < 0) {
                    if ($jormInfo['col'] === $classJORM['primaryKeyColumn']) {
                        $primaryKey = (int) $property->getValue($this);
                    }
                }
            }

            $value = $property->getValue($this);

            // If the column is a foreign key then we need to figure out what it wants.
            if (isset($jormInfo['manyToOne'])) {
                if ($value === null) {
                    $retVal .= '<td></td>';
                    continue;
                }

                $tableName = $jormInfo['manyToOne'];
                $foreignKeyColumn = $jormInfo['foreignKey'];
                $desiredColumn = $jormInfo['foreignView'];

                $infoToDisplay = $database->getTableCellFromForeignKey($tableName, $value, $foreignKeyColumn, $desiredColumn);
                $retVal .= '<td>' . HTMLUtils::generateManyToOneHyperlink(strtolower($tableName), $value, $infoToDisplay) . '</td>';
            } else if (isset($jormInfo['oneToMany'])) {
                $tableName = $jormInfo['oneToMany'];
                $foreignKeyColumn = $jormInfo['foreignKey'];
                $infoToDisplay = $jormInfo['view'];

                $retVal .= '<td>' . HTMLUtils::generateOneToManyHyperlink($tableName, $foreignKeyColumn, $primaryKey, $infoToDisplay) . '</td>';
            } else {
                $retVal .= "<td>$value</td>";
            }
        }

        $tableRoute = strtolower($classJORM['table']);
        $retVal .= '<td>'. HTMLUtils::generateEditHyperlink($tableRoute, $primaryKey) . '</td>';
        $retVal .= '<td>'. HTMLUtils::generateDeleteHyperlink($tableRoute, $primaryKey) . '</td>';

        $retVal .= '</tr>';
        return $retVal;
    }

    private static function constructEditHTML(Table $instance = null): string {
        $reflectionClass = new ReflectionClass(get_called_class());

        $tableData = array();

        foreach ($reflectionClass->getProperties() as $property) {
            $row = array();
            $jormInfo = self::convertDocCommentToJORM($property->getDocComment());

            if (isset($jormInfo['volatile']) && $jormInfo['volatile'] === '0') {
                continue;
            }

            if (isset($jormInfo['oneToMany'])) {
                continue;
            }

            $row['header'] = $jormInfo['header'];
            $row['name'] = $jormInfo['col'];

            if (isset($jormInfo['nullable'])) {
                $row['required'] = $jormInfo['nullable'] === '0';
            } else {
                $row['required'] = false;
            }

            if (isset($jormInfo['manyToOne'])) {
                $defaultValue = '';
                if ($instance !== null) {
                    $defaultValue = $property->getValue($instance);
                    if ($defaultValue === null) {
                        $defaultValue = '';
                    }
                }

                $row['inputType'] = 'selection';
                $row['value'] = HTMLUtils::generateManyToOneSelection($jormInfo['manyToOne'], $jormInfo['col'], $jormInfo['foreignKey'], $jormInfo['foreignView'], $defaultValue, $row['required']);

                array_push($tableData, $row);
                continue;
            }

            if ($instance !== null) {
                $row['value'] = $property->getValue($instance);
            }

            $inputType = null;
            switch ($jormInfo['type']) {
                case 'integer': {
                    $inputType = 'number';
                } break;

                case 'datetime': {
                    $inputType = 'datetime-local';
                } break;

                case 'date': {
                    $inputType = 'date';
                } break;

                case 'boolean': {
                    $inputType = 'checkbox';
                    $row['value'] = '1';
                } break;

                default: {
                    $inputType = 'text';
                }
            }
            $row['inputType'] = $inputType;

            array_push($tableData, $row);
        }

        $form = '<form method="post" action="">';
        $form .= HTMLUtils::generateEditHTMLTable($tableData);
        $form .= '<input type="submit" name="submit" value="Submit"></form>';

        return $form;
    }

    public static function constructRoutes(): string {
        $jormInfo = self::getClassHeaderJORM();
        $routeMainPath = $jormInfo['table'];
        $primaryKey = $jormInfo['primaryKeyColumn'];

        Router::add("/$routeMainPath", function() use ($routeMainPath) {
            $whereClause = '';
            if (isset($_GET['where'])) {
                $whereClause = urldecode($_GET['where']);
            }
            echo "<a href='/$routeMainPath/create'><input type='button' value='Add new row'></a><br>";
            echo self::constructViewHTMLTable($whereClause);
        });

        Router::add("/$routeMainPath/([0-9]+)", function($id) use ($primaryKey) {
            $whereClause = "$primaryKey = $id";
            echo self::constructViewHTMLTable($whereClause);
        });

        Router::add("/$routeMainPath/([0-9]+)/edit", function($id) use ($routeMainPath, $primaryKey)  {
            $instance = self::convertPrimaryKeyToInstance($routeMainPath, $primaryKey, $id);
            if ($instance === null) {
                echo('Entry with ID "' . $id . '" does not exist!');
                return;
            }

            echo self::constructEditHTML($instance);
        });

        Router::add("/$routeMainPath/([0-9]+)/edit", function($id) use ($routeMainPath, $primaryKey)  {
            global $database;

            $instance = self::convertPrimaryKeyToInstance($routeMainPath, $primaryKey, $id);
            if ($instance === null) {
                echo('Entry with ID "' . $id . '" does not exist!');
                return;
            }
            $reflectionClass = new ReflectionClass($instance);

            unset($_POST['submit']);
            $unsetArr = array();
            foreach ($reflectionClass->getProperties() as $property) {
                $jormInfo = self::convertDocCommentToJORM($property->getDocComment());
                if (isset($jormInfo['oneToMany']) || (isset($jormInfo['volatile']) && $jormInfo['volatile'] === '0')) {
                    continue;
                }

                $value = $property->getValue($instance);

                // Checkboxes only send a value if they're checked.
                if (!isset($jormInfo['manyToOne']) && $jormInfo['type'] === 'boolean') {
                    if (isset($_POST[$jormInfo['col']])) {
                        $_POST[$jormInfo['col']] = '1';
                    } else {
                        $_POST[$jormInfo['col']] = '0';
                    }
                    continue;
                }

                if ($value === $_POST[$jormInfo['col']] || ($value === null && $_POST[$jormInfo['col']] === '')) {
                    array_push($unsetArr, $jormInfo['col']);
                }
            }

            foreach ($unsetArr as $data) {
                unset($_POST[$data]);
            }

            foreach ($_POST as $key => $value) {
                if ($value === '' || preg_match('/[^\d]+/', $value)) {
                    $_POST[$key] = "'$value'";
                }
            }

            if (count($_POST) > 0) {
                $database->updateRow($routeMainPath, $primaryKey, $id, $_POST);
            }

            $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            header("Location: $actualLink/$routeMainPath/$id");
        }, "post");

        Router::add("/$routeMainPath/create", function() use ($routeMainPath)  {
            echo self::constructEditHTML();
        });

        Router::add("/$routeMainPath/create", function() use ($routeMainPath)  {
            global $database;
            unset($_POST['submit']);

            // Add single quotes to strings and remove empty fields.
            $unsetArr = array();
            foreach ($_POST as $key => $value) {
                if (preg_match('/[^\d]+/', $value)) {
                    $_POST[$key] = "'$value'";
                }
                if ($value === null || $value === '') {
                    array_push($unsetArr, $key);
                }
            }

            foreach ($unsetArr as $data) {
                unset($_POST[$data]);
            }

            $id = $database->createRowAndGetID($routeMainPath, $_POST);
            $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            header("Location: $actualLink/$routeMainPath/$id");
        }, "post");

        Router::add("/$routeMainPath/([0-9]+)/delete", function($id) use ($routeMainPath, $primaryKey)  {
            global $database;
            $database->deleteRow($routeMainPath, $primaryKey, $id);

            $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            header("Location: $actualLink/$routeMainPath");
        }, "post");

        return $routeMainPath;
    }

    private static function convertPrimaryKeyToInstance(string $tableName, string $primaryKeyColumn, int $primaryKey): Table {
        global $database;

        $whereClause = "$primaryKeyColumn = $primaryKey";
        $result = $database->queryAllRowsFromTable($tableName, $whereClause);
        if (count($result) < 1) {
            return null;
        }

        $reflectionClass = new ReflectionClass(get_called_class());
        /* @var Table $instance */
        $instance = $reflectionClass->newInstance();
        $instance->convertRelationToObject($result[0]);
        return $instance;
    }
}