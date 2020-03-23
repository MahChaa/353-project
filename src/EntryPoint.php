<?php

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
        min-width: 600px;
        font-size: 13px;
        text-align: center;
        border-spacing: 0;
    }

    .db-table th {
        background-color: #494c49;
        padding: 12px;
        color: white;
        font-weight: 700;
    }

    .db-table:not(.db-table-vertical) th {
        border-left: 1px solid #878c87;
    }

    .db-table.db-table-vertical th {
        border-top: 1px solid #878c87;
    }

    .db-table:not(.db-table-vertical) th:first-of-type,
    .db-table.db-table-vertical tr:first-of-type th {
        border-radius: 5px 0 0 0;
        border-left: 0;
        border-top: 0;
    }

    .db-table:not(.db-table-vertical) th:last-of-type {
        padding-left: 0;
        padding-right: 0;
    }

    .db-table:not(.db-table-vertical) th:last-of-type {
        border-radius: 0 5px 0 0;
    }

    .db-table.db-table-vertical tr:last-of-type th {
        border-radius: 0 0 0 5px;
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
