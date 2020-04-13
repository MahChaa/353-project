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
     * header = Full Name,
     * nullable = 0
     * }
     */
    public $name;

    /**
     * \JORM {
     * col = date_of_birth,
     * type = date,
     * header = DoB,
     * nullable = 0
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
     * oneToMany = Appointment,
     * foreignKey = patient_id,
     * header = Appointments,
     * view = View all Appointments
     * }
     */
    public $appointments;
}