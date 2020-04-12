DROP TABLE IF EXISTS Patient;
CREATE TABLE Patient
(
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(255) NOT NULL,
    date_of_birth DATE         NOT NULL,
    address       VARCHAR(255),
    email         VARCHAR(255),
    telephone     VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS Clinic;
CREATE TABLE Clinic
(
    id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name      VARCHAR(255) NOT NULL,
    address   VARCHAR(255) NOT NULL,
    email     VARCHAR(255),
    telephone VARCHAR(255)
);

DROP TABLE IF EXISTS Dentist;
CREATE TABLE Dentist
(
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    address      VARCHAR(255) NOT NULL,
    email        VARCHAR(255),
    telephone    VARCHAR(255) NOT NULL,
    is_assistant BIT(1)       NOT NULL,
    clinic_id    INT UNSIGNED,
    FOREIGN KEY(clinic_id) REFERENCES Clinic (id)
);

DROP TABLE IF EXISTS Receptionist;
CREATE TABLE Receptionist
(
    id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name      VARCHAR(255) NOT NULL,
    address   VARCHAR(255) NOT NULL,
    email     VARCHAR(255),
    telephone VARCHAR(255) NOT NULL,
    clinic_id INT UNSIGNED,
    FOREIGN KEY(clinic_id) REFERENCES Clinic (id)
);

DROP TABLE IF EXISTS Appointment;
CREATE TABLE Appointment
(
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date_time       DATETIME     NOT NULL,
    was_missed      BIT(1) DEFAULT 0,
    dentist_id      INT UNSIGNED,
    FOREIGN KEY (dentist_id) REFERENCES Dentist (id),
    receptionist_id INT UNSIGNED REFERENCES Receptionist (id),
    FOREIGN KEY (receptionist_id) REFERENCES Receptionist (id),
    clinic_id       INT UNSIGNED NOT NULL,
    FOREIGN KEY (clinic_id) REFERENCES Clinic (id) ON DELETE CASCADE,
    patient_id      INT UNSIGNED NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES Patient (id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS Bill;
CREATE TABLE Bill
(
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date_time       DATETIME     NOT NULL,
    is_paid         BIT(1) DEFAULT 0,
    clinic_id       INT UNSIGNED NOT NULL,
    FOREIGN KEY(clinic_id) REFERENCES Clinic (id)  ON DELETE CASCADE,
    patient_id      INT UNSIGNED NOT NULL,
    FOREIGN KEY(patient_id) REFERENCES Patient (id) ON DELETE CASCADE,
    receptionist_id INT UNSIGNED,
    FOREIGN KEY(receptionist_id) REFERENCES Receptionist (id)
);

DROP TABLE IF EXISTS Treatment;
CREATE TABLE Treatment
(
    id                     INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name                   VARCHAR(255) NOT NULL,
    cost                   DECIMAL(7, 2),
    appointment_id         INT UNSIGNED,
    FOREIGN KEY(appointment_id) REFERENCES Appointment (id),
    bill_id                INT UNSIGNED NOT NULL,
    FOREIGN KEY(bill_id) REFERENCES Bill (id) ON DELETE CASCADE,
    assigned_by_dentist_id INT UNSIGNED,
    FOREIGN KEY(assigned_by_dentist_id) REFERENCES Dentist (id),
    assigned_to_dentist_id INT UNSIGNED,
    FOREIGN KEY(assigned_to_dentist_id) REFERENCES Dentist (id)
);

delimiter //
drop trigger if exists trg_treatment_no_assistant_assign //
create trigger trg_treatment_no_assistant_assign
    before insert
    on Treatment
    for each row
begin
    declare msg varchar(128);
    if new.assigned_by_dentist_id IN (
        SELECT id
        FROM Dentist
        WHERE is_assistant = 1
    ) then
        set msg = concat('MyTriggerError: Trying to insert an assistant in Treatment: ', cast(new.id as char));
        signal sqlstate '45000' set message_text = msg;
    end if;
end
//

delimiter ;