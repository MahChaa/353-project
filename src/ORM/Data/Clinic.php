<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Clinic,
 * primaryKeyColumn = id
 * }
 */
class Clinic extends Table {
    /**
     * \JORM {
     * col = id,
     * type = integer,
     * header = CID,
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
     * header = Telephone
     * }
     */
    public $telephone;

    /**
     * \JORM {
     * oneToMany = Dentist,
     * foreignKey = clinic_id,
     * header = Dentists,
     * view = View all Dentists
     * }
     */
    public $dentists;

    /**
     * \JORM {
     * oneToMany = Receptionist,
     * foreignKey = clinic_id,
     * header = Receptionists,
     * view = View all Receptionists
     * }
     */
    public $receptionist;

    /**
     * \JORM {
     * oneToMany = Appointment,
     * foreignKey = clinic_id,
     * header = Appointments,
     * view = View all Appointments
     * }
     */
    public $appointments;

    /**
     * \JORM {
     * oneToMany = Bill,
     * foreignKey = clinic_id,
     * header = Bills,
     * view = View all Bills
     * }
     */
    public $bills;
}