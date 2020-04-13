<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Treatment,
 * primaryKeyColumn = id
 * }
 */
class Treatment extends Table {
    /**
     * \JORM {
     * col = id,
     * type = integer,
     * header = TID,
     * volatile = 0
     * }
     */
    public $id;

    /**
     * \JORM {
     * col = name,
     * type = string,
     * header = Name,
     * nullable = 0
     * }
     */
    public $name;

    /**
     * \JORM {
     * col = cost,
     * type = integer,
     * header = Cost
     * }
     */
    public $cost;

    /**
     * \JORM {
     * col = appointment_id,
     * manyToOne = Appointment,
     * foreignKey = id,
     * foreignView = id,
     * header = Appointment ID
     * }
     */
    public $appointment;

    /**
     * \JORM {
     * col = bill_id,
     * manyToOne = Bill,
     * foreignKey = id,
     * foreignView = id,
     * header = Bill ID,
     * nullable = 0
     * }
     */
    public $bill;

    /**
     * \JORM {
     * col = assigned_by_dentist_id,
     * manyToOne = Dentist,
     * foreignKey = id,
     * foreignView = name,
     * header = Assigner
     * }
     */
    public $assigner;

    /**
     * \JORM {
     * col = assigned_to_dentist_id,
     * manyToOne = Dentist,
     * foreignKey = id,
     * foreignView = name,
     * header = Assignee
     * }
     */
    public $assignee;
}