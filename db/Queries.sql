# Get details of all dentists in all the clinics.
SELECT *
FROM Dentist;

# Get details of all appointments for a given dentist for a specific week.
SELECT *
FROM Appointment
         INNER JOIN Treatment T ON Appointment.id = T.appointment_id
WHERE T.assigned_to_dentist_id = 1
  AND Appointment.date_time BETWEEN '2020-04-05' and '2020-04-12';
# Put the ID of whoever you want here.

# Get details of all appointments at a given clinic on a specific date.
SELECT *
FROM Appointment
         INNER JOIN Clinic C ON Appointment.clinic_id = C.id
WHERE C.id = 1
  AND Appointment.date_time = '2017-02-27';

# Get details of all appointments of a given patient.
SELECT *
FROM Appointment
         INNER JOIN Patient P ON Appointment.patient_id = P.id
WHERE P.id = 1;

# Get the number of missed appointments for each patient (only for patients who have
# missed at least 1 appointment).
SELECT patient_id, COUNT(*) AS missed_appointments
FROM Appointment
         INNER JOIN Patient P ON Appointment.patient_id = P.id
WHERE was_missed = 1
GROUP BY patient_id;

# Get details of all the treatments made during a given appointment.
SELECT *
FROM Treatment
         INNER JOIN Appointment A on Treatment.appointment_id = A.id
WHERE A.id = 1;

# Get details of all unpaid bills.
SELECT *
FROM Bill
WHERE is_paid = 0;