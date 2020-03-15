<?php

require_once(__DIR__ . '/Table.php');

/**
 * \JORM {
 * table = TableMany
 * }
 */
class ManyTable extends Table {
    /**
     * \JORM {
     * col = many_id,
     * type = integer,
     * public = 0
     * }
     */
    public $manyID;

    /**
     * \JORM {
     * col = test_id,
     * type = string,
     * public = 1,
     * foreignTable = Test,
     * view = test_int,
     * header = Test Int of another Table
     * }
     */
    public $test_id;

    /**
     * \JORM {
     * col = luresubject,
     * type = string,
     * public = 1,
     * header = LureSubject
     * }
     */
    public $luresubject;
}