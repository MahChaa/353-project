<?php

require_once(__DIR__ . '/Table.php');

/**
 * \JORM {
 * table = Test,
 * primaryKeyColumn = test_id
 * }
 */
class TestTable extends Table {
    /**
     * \JORM {
     * col = test_id,
     * type = integer,
     * header = TID,
     * volatile = 0
     * }
     */
    public $testID;

    /**
     * \JORM {
     * col = test_int,
     * type = integer,
     * header = Test Integer
     * }
     */
    public $testInt;

    /**
     * \JORM {
     * col = test_str,
     * type = string,
     * header = Test String
     * }
     */
    public $testStr;

    /**
     * \JORM {
     * col = test_date,
     * type = datetime,
     * header = Test Date
     * }
     */
    public $testDate;

    /**
     * \JORM {
     * oneToMany = TableMany,
     * foreignKey = test_id,
     * header = Test Int of another Table,
     * view = View all Foreigners
     * }
     */
    public $test_id;
}