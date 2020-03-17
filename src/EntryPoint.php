<?php

require_once(__DIR__ . '/ORM/TestTable.php');
require_once(__DIR__ . '/ORM/ManyTable.php');
require_once(__DIR__ . '/Database.php');

$database = new Database();
$database->initialize();

include(__DIR__ . '/InitializeRoutes.php');

?>
<style>
    body {
        background-color: teal;
    }

    .edit-link, .edit-link:visited {
        color: blue;
    }

    .delete-link, .delete-link:visited {
        color: red;
    }

    .db-table {
        width: 75%;
        font-size: 13px;
        text-align: center;
        border-spacing: 0;
    }

    .db-table th {
        background-color: #494c49;
        border-left: 1px solid #878c87;
        padding: 12px;
        color: white;
        font-weight: 700;
    }

    .db-table th:first-of-type {
        border-radius: 5px 0 0 0;
        border-left: 0;
        padding-right: 0;
    }

    .db-table th:last-of-type {
        border-radius: 0 5px 0 0;
        padding-left: 0;
        padding-right: 0;
    }

    .db-table tr:nth-child(odd) {
        background-color: #fff;
    }

    .db-table tr:nth-child(even) {
        background-color: #ecf1f5;
    }

    .db-table td {
        padding: 7px 10px;
        border-left: 1px solid #fff;
    }

    .db-table td:first-of-type {
        border-left: 0;
    }

    .db-table td:nth-last-child(1), .db-table td:nth-last-child(2) {
        font-weight: bold;
        padding: 0;
    }
</style>
