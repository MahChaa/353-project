<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Dentist,
 * primaryKeyColumn = id
 * }
 */
class Dentist extends Table {
    /**
     * \JORM {
     * col = id,
     * type = integer,
     * header = PID,
     * volatile = 0
     * }
     */
    public $id;

    /**
     * \JORM {
     * col = id,
     * type = string,
     * header = Full Name,
     * nullable = 0
     * }
     */
    public $name;

    /**
     * \JORM {
     * col = address,
     * type = string,
     * header = Address,
     * nullable = 0
     * }
     */
    public $address;

    /**
     * \JORM {
     * col = email,
     * type = string,
     * header = Email
     * }
     */
    public $email;

    /**
     * \JORM {
     * col = telephone,
     * type = string,
     * header = Telephone,
     * nullable = 0
     * }
     */
    public $telephone;

    /**
     * \JORM {
     * col = is_assistant,
     * type = integer,
     * header = Assistant?,
     * nullable = 0
     * }
     */
    public $isAssistant;

    /**
     * \JORM {
     * col = clinic_id,
     * manyToOne = Clinic,
     * foreignKey = id,
     * foreignView = name,
     * header = Clinic
     * }
     */
    public $clinic;
}