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
     * type = boolean,
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

    /**
     * \JORM {
     * oneToMany = Appointment,
     * foreignKey = dentist_id,
     * header = Appointments,
     * view = View all Appointments
     * }
     */
    public $appointments;

    /**
     * \JORM {
     * oneToMany = Appointment,
     * foreignKey = assigned_to_dentist_id,
     * header = Assigned To,
     * view = View all Assignments
     * }
     */
    public $assignedTo;

    /**
     * \JORM {
     * oneToMany = Appointment,
     * foreignKey = assigned_by_dentist_id,
     * header = Assigner,
     * view = View all Assignments
     * }
     */
    public $assignedBy;
}