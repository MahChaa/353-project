<?php

require_once(__DIR__ . '/Table.php');

/**
 * \JORM {
 * table = TableMany,
 * primaryKeyColumn = many_id
 * }
 */
class ManyTable extends Table {
    /**
     * \JORM {
     * col = many_id,
     * type = integer,
     * header = MID,
     * volatile = 0
     * }
     */
    public $manyID;

    /**
     * \JORM {
     * col = test_id,
     * manyToOne = Test,
     * foreignKey = test_id,
     * foreignView = test_str,
     * header = Test Str of another Table
     * }
     */
    public $test_id;

    /**
     * \JORM {
     * col = luresubject,
     * type = string,
     * header = LureSubject
     * }
     */
    public $luresubject;
}