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
     * public = 0
     * }
     */
    public $testID;

    /**
     * \JORM {
     * col = test_int,
     * type = integer,
     * public = 1,
     * header = Test Integer
     * }
     */
    public $testInt;

    /**
     * \JORM {
     * col = test_str,
     * type = string,
     * public = 1,
     * header = Test String
     * }
     */
    public $testStr;

    /**
     * \JORM {
     * col = test_date,
     * type = datetime,
     * public = 1,
     * header = Test Date
     * }
     */
    public $testDate;
}