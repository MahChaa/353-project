<?php

class HTMLUtils {
    public static function generateEditHyperlink(string $tableRoute, string $primaryKey): string {
        return "<a class='edit-link' href='/$tableRoute/$primaryKey/edit'>Edit</a>";
    }

    public static function generateDeleteHyperlink(string $tableRoute, string $primaryKey): string {
        return "<a class='delete-link' href='/$tableRoute/$primaryKey/delete' onclick='return confirm(\"Are you sure ? \")'>Delete</a>";
    }

    public static function generateManyToOneHyperlink(string $tableName, string $foreignKey, string $innerHTML): string {
        return "<a href='/$tableName/$foreignKey'>$innerHTML</a>";
    }

    public static function generateOneToManyHyperlink(string $tableName, string $foreignKeyColumn, string $primaryKey, string $innerHTML): string {
        $whereClause = urlencode("$foreignKeyColumn = $primaryKey");
        return "<a href='/$tableName?where=$whereClause'>$innerHTML</a>";
    }

    public static function generateManyToOneSelection(string $tableName, string $column, string $foreignKey, string $foreignView, string $defaultValue): string {
        global $database;
        $returnHTML = "<select name='$column'><option value=''>None</option>";

        $queryResult = $database->queryAllKeysFromTable($tableName, $foreignKey, $foreignView);
        foreach ($queryResult as $row) {
            $value = $row[$foreignKey];
            $text = $row[$foreignView];
            $selected  = $defaultValue === $value ? ' selected' : '';

            $returnHTML .= "<option value='$value'$selected>$text</option>";
        }
        
        $returnHTML .= "</select>";
        return $returnHTML;
    }

    public static function generateEditHTMLTable(array $data): string {
        $retVal = '<table class="db-table db-table-vertical">';

        foreach ($data as $row) {
            $header = $row['header'];

            $input = null;
            if ($row['inputType'] === 'selection') {
                $input = $row['value'];
            } else {
                $inputType = $row['inputType'];
                $name = $row['name'];
                $defaultValue = isset($row['value']) ? $row['value'] : '';

                // datetime-local only accepts timestamps that have a 'T' separating the date and time.
                if ($inputType === 'datetime-local') {
                    $defaultValue = str_replace(' ', 'T', $defaultValue);
                }

                $input = "<input type='$inputType' name='$name' value='$defaultValue'>";
            }

            $retVal .= "<tr><th>$header</th><td>$input</td></tr>";
        }

        $retVal .= '</table>';

        return $retVal;
    }
}