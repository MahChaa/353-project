<?php

class Database {
    /* @var mysqli $connection */
    private $connection = null;

    public function initialize(): void {
        $servername = __DB_HOST__;
        $username   = __DB_USER__;
        $password   = __DB_PASS__;
        $dbname     = __DB_NAME__;

        $this->connection = new mysqli($servername, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    private function convertQueryToAssociativeArray(mysqli_result $result): array {
        if ($result->num_rows < 1) {
            return array();
        }

        $rows = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($rows, $row);
        }

        return $rows;
    }

    /**
     * Performs a wildcard select on a table with an optional WHERE clause.
     *
     * @param string $tableName
     * @param string $whereClause
     * @return array
     */
    public function queryAllRowsFromTable(string $tableName, string $whereClause = ''): array {
        $select = "SELECT * FROM `$tableName`";

        $query = $select;
        if ($whereClause !== '') {
            $query .= " WHERE $whereClause";
        }
        $query .= ';';

        $result = $this->connection->query($query) or die($this->connection->error);
        return $this->convertQueryToAssociativeArray($result);
    }

    /**
     * Selects the primary key and additional column to be queried from a table for assigning a row to a foreign key.
     *
     * @param string $tableName
     * @param string $foreignKey
     * @param string $foreignView
     * @return array
     */
    public function queryAllKeysFromTable(string $tableName, string $foreignKey, string $foreignView): array {
        $query = "SELECT $foreignKey, $foreignView FROM `$tableName`;";
        $result = $this->connection->query($query);

        return $this->convertQueryToAssociativeArray($result);
    }

    /**
     * Given a foreign key to a table, returns a specific cell from a row.
     *
     * @param $tableName
     * @param int $foreignKey
     * @param string $foreignKeyColumn
     * @param string $desiredColumn
     * @return null|string
     */
    public function getTableCellFromForeignKey(string $tableName, int $foreignKey, string $foreignKeyColumn, string $desiredColumn): ?string {
        $query = "SELECT $desiredColumn AS `foreign_grabber` FROM `$tableName` WHERE $foreignKeyColumn = $foreignKey";

        $result = $this->connection->query($query);
        $result = $this->convertQueryToAssociativeArray($result);
        return $result[0]['foreign_grabber'];
    }

    public function createRowAndGetID(string $tableName, array $rowData): int {
        $query = "INSERT INTO $tableName";
        $query .= '(';
        $query .= implode(', ', array_keys($rowData));
        $query .= ') VALUES (';
        $query .= implode(', ', $rowData);
        $query .= ');';

        $result = $this->connection->query($query) or die($this->connection->error);

        $index = 'LAST_INSERT_ID()';
        $query = "SELECT $index;";

        $result = $this->connection->query($query);
        $result = $this->convertQueryToAssociativeArray($result);
        return $result[0][$index];
    }

    public function updateRow(string $tableName, string $primaryKeyColumn, string $primaryKey, array $updateData): void {
        $query = "UPDATE $tableName";

        $setClauses = array();
        foreach ($_POST as $column => $value) {
            if ($value === "''") {
                $value = 'NULL';
            }
            array_push($setClauses, "$column = $value");
        }
        $setClauses = 'SET ' . implode(', ', $setClauses);
        $whereClause = "WHERE $primaryKeyColumn = $primaryKey";

        $query .= " $setClauses $whereClause";
        $this->connection->query($query) or die($this->connection->error);
    }

    public function deleteRow(string $tableName, string $primaryKeyColumn, string $primaryKey): void {
        $query = "DELETE FROM $tableName WHERE $primaryKeyColumn = $primaryKey";
        $this->connection->query($query) or die($this->connection->error);
    }

    public function sendRawSQL(string $query): string {
        $result = $this->connection->query($query);
        if (!$result) {
            $error = $this->connection->error;
            return "<p style='color: red'>$error</p>";
        }

        $result = $this->convertQueryToAssociativeArray($result);
        if (count($result) < 1) {
            return '<p style="color: red">No results found.</p>';
        }

        $html = '<table class="db-table">';

        $html .= '<tr>';
        foreach (array_keys($result[0]) as $header) {
            $html .= "<th>$header</th>";
        }
        $html .= '</tr>';

        foreach ($result as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= '</tr>';
        }

        $html .= '</table>';
        return $html;
    }
}