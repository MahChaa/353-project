<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Receptionist,
 * primaryKeyColumn = id
 * }
 */
class Receptionist extends Table {
    /**
     * \JORM {
     * col = id,
     * type = integer,
     * header = RID,
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
     * col = clinic_id,
     * manyToOne = Clinic,
     * foreignKey = id,
     * foreignView = name,
     * header = Clinic
     * }
     */
    public $clinic;

    /**
     * \JORM {
     * oneToMany = Appointment,
     * foreignKey = receptionist_id,
     * header = Appointments,
     * view = View all Appointments
     * }
     */
    public $appointments;
}