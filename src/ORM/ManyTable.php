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
     * manyToOne = Test,
     * foreignKey = test_id,
     * foreignView = test_str,
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