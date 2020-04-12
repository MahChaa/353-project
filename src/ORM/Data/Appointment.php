<?php

require_once(__DIR__ . '/../Table.php');

/**
 * \JORM {
 * table = Appointment,
 * primaryKeyColumn = id
 * }
 */
class Appointment extends Table {
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
     * col = date_time,
     * type = datetime,
     * header = Date & Time,
     * nullable = 0
     * }
     */
    public $dateTime;

    /**
     * \JORM {
     * col = was_missed,
     * type = boolean,
     * header = Missed Appointment?
     * }
     */
    public $wasMissed;

    /**
     * \JORM {
     * col = dentist_id,
     * manyToOne = Dentist,
     * foreignKey = id,
     * foreignView = name,
     * header = Dentist
     * }
     */
    public $dentist;

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
     * oneToMany = Treatment,
     * foreignKey = appointment_id,
     * header = Treatments,
     * view = View all Treatments
     * }
     */
    public $treatments;
}