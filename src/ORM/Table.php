<?php


class Table {
    /**
     * Converts the doc comment's JORM to an array.
     *
     * @param string $docComment the doc comment of the property.
     *
     * @return array
     */
    private static function convertDocCommentToJORM(string $docComment): array {
        preg_match_all('/(\w+)\s*=\s*([^,\n]+)/', $docComment, $matches);

        return array_combine($matches[1], $matches[2]);
    }

    /**
     * @param array $row
     * @throws ReflectionException
     */
    public function convertRelationToObject(array $row): void {
        $reflectionClass = new ReflectionClass($this);

        foreach ($reflectionClass->getProperties() as $property) {
            $jormInfo = $this->convertDocCommentToJORM($property->getDocComment());
            $dbColumn = $jormInfo['col'];

            $property->setValue($this, $row[$dbColumn]);
        }
    }

    /**
     * @param string $whereClause
     * @return string
     * @throws ReflectionException
     */
    public static function constructHTMLTable(string $whereClause = ''): string {
        global $database;
        $reflectionClass = new ReflectionClass(get_called_class());

        $jormInfo = self::convertDocCommentToJORM($reflectionClass->getDocComment());
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
            if ($jormInfo['public'] === '0') {
                continue;
            }

            $headerResult .= '<th>' . $jormInfo['header'] . '</th>';
        }

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

        $retVal = '<tr>';
        foreach ($reflectionClass->getProperties() as $property) {
            $jormInfo = $this->convertDocCommentToJORM($property->getDocComment());
            if ($jormInfo['public'] === '0') {
                continue;
            }

            $value = $property->getValue($this);

            // If the column is a foreign key then we need to figure out what it wants.
            if (isset($jormInfo['manyToOne'])) {
                $tableName = $jormInfo['manyToOne'];
                $foreignKeyColumn = $jormInfo['foreignKey'];
                $desiredColumn = $jormInfo['foreignView'];

                $infoToDisplay = $database->getTableCellFromForeignKey($tableName, $value, $foreignKeyColumn, $desiredColumn);
                $retVal .= '<td>'. $infoToDisplay . '</td>';
            } else {
                $retVal .= '<td>'. $value . '</td>';
            }
        }

        $retVal .= '</tr>';
        return $retVal;
    }
};