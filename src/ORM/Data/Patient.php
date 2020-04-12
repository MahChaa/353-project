<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Patient,
 * primaryKeyColumn = id
 * }
 */
class Patient extends Table {
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
     * col = name,
     * type = string,
     * header = Full Name
     * }
     */
    public $name;

    /**
     * \JORM {
     * col = date_of_birth,
     * type = date,
     * header = DoB
     * }
     */
    public $birth;

    /**
     * \JORM {
     * col = address,
     * type = string,
     * header = Address
     * }
     */
    public $address;

    /**
     * \JORM {
     * col = telephone,
     * type = string,
     * header = Telephone
     * }
     */
    public $telephone;

    /**
     * \JORM {
     * oneToMany = Appointment,
     * foreignKey = id,
     * header = Appointments,
     * view = View all Appointments
     * }
     */
    public $appointments;
}