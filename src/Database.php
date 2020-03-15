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

    public function queryAllRowsFromTable(string $tableName, string $whereClause = ''): array {
        $select = "SELECT * FROM `$tableName`";

        $query = $select;
        if ($whereClause !== '') {
            $query .= "WHERE $whereClause";
        }
        $query .= ';';

        $result = $this->connection->query($query);

        if ($result->num_rows < 1) {
            return array();
        }

        $rows = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($rows, $row);
        }
        return $rows;
    }
}