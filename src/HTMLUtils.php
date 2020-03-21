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
}