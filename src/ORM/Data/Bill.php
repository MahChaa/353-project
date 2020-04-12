<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Bill,
 * primaryKeyColumn = id
 * }
 */
class Bill extends Table {
    /**
     * \JORM {
     * col = id,
     * type = integer,
     * header = BID,
     * volatile = 0
     * }
     */
    public $id;

    /**
     * \JORM {
     * col = date_time,
     * type = datetime,
     * header = Date & Time,
     * nullable = 0
     * }
     */
    public $dateTime;

    /**
     * \JORM {
     * col = is_paid,
     * type = boolean,
     * header = Paid?
     * }
     */
    public $isPaid;

    /**
     * \JORM {
     * col = clinic_id,
     * manyToOne = Clinic,
     * foreignKey = id,
     * foreignView = name,
     * header = Clinic,
     * nullable = 0
     * }
     */
    public $clinic;

    /**
     * \JORM {
     * col = patient_id,
     * manyToOne = Patient,
     * foreignKey = id,
     * foreignView = name,
     * header = Patient,
     * nullable = 0
     * }
     */
    public $patient;

    /**
     * \JORM {
     * col = receptionist_id,
     * manyToOne = Receptionist,
     * foreignKey = id,
     * foreignView = name,
     * header = Receptionist
     * }
     */
    public $receptionist;
}