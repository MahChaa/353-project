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

        $result = $this->connection->query($query);
        return $this->convertQueryToAssociativeArray($result);
    }

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
    public function getTableCellFromForeignKey($tableName, int $foreignKey, string $foreignKeyColumn, string $desiredColumn): ?string {
        $query = "SELECT $desiredColumn AS `foreign_grabber` FROM `$tableName` WHERE $foreignKeyColumn = $foreignKey";

        $result = $this->connection->query($query);
        $result = $this->convertQueryToAssociativeArray($result);
        return $result[0]['foreign_grabber'];
    }
}