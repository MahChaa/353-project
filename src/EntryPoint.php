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

    a:visited {
        color: blue;
    }

    .edit-link, .edit-link:visited {
        color: blue;
    }

    .delete-link, .delete-link:visited {
        color: red;
    }

    .required {
        color: red;
    }

    .hyperlink-btn {
        align-items: normal;
        background-color: rgba(0,0,0,0);
        border-color: rgb(0, 0, 238);
        border-style: none;
        box-sizing: content-box;
        cursor: pointer;
        display: inline;
        font: inherit;
        height: auto;
        padding: 0;
        perspective-origin: 0 0;
        text-align: start;
        text-decoration: underline;
        transform-origin: 0 0;
        width: auto;
        -moz-appearance: none;
    }

    /* Mozilla uses a pseudo-element to show focus on buttons, */
    /* but anchors are highlighted via the focus pseudo-class. */

    @supports (-moz-appearance:none) { /* Mozilla-only */
        .hyperlink-btn::-moz-focus-inner { /* reset any predefined properties */
            border: none;
            padding: 0;
        }
        .hyperlink-btn:focus { /* add outline to focus pseudo-class */
            outline-style: dotted;
            outline-width: 1px;
        }
    }

    .delete-form {
        display: inline;
    }

    .db-table {
        width: 100%;
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
