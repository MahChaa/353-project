INSERT INTO Clinic (id, name, address, email, telephone)
VALUES (1, 'Team Jorge', '7th', 'boi@gosm.com', '455-454-4555'),
       (2, 'Team Juan', '600th', 'buttah@gosm.com', '233-333-5544'),
       (3, 'Team AG', '147th', 'ahkay@gosm.com', '787-787-7567');


INSERT INTO Dentist (id, name, address, email, telephone, is_assistant, clinic_id)
VALUES (1, 'Bob1', '7th', 'boi@gosm.com', '455-454-4555', 0, 1),
       (2, 'Argh1', '600th', 'buttah@gosm.com', '233-333-5544', 0, 1),
       (3, 'Jorn1', '147th', 'ahkay@gosm.com', '787-787-7567', 1, 1),

       (4, 'Bob2', '7th', 'boi@gosm.com', '455-454-4555', 0, 2),
       (5, 'Argh2', '600th', 'buttah@gosm.com', '233-333-5544', 0, 2),
       (6, 'Jorn2', '147th', 'ahkay@gosm.com', '787-787-7567', 1, 2),

       (7, 'Bob3', '7th', 'boi@gosm.com', '455-454-4555', 0, 3),
       (8, 'Argh3', '600th', 'buttah@gosm.com', '233-333-5544', 0, 3),
       (9, 'Jorn3', '147th', 'ahkay@gosm.com', '787-787-7567', 1, 3);

INSERT INTO Receptionist (id, name, address, email, telephone, clinic_id)
VALUES (1, 'Recep1', '7th', 'boi@gosm.com', '455-454-4555', 1),
       (2, 'Recep2', '7th', 'boi@gosm.com', '455-454-4555', 1),
       (3, 'Recep3', '7th', 'boi@gosm.com', '455-454-4555', 1),
       (4, 'Recep4', '7th', 'boi@gosm.com', '455-454-4555', 1),
       (5, 'Recep5', '7th', 'boi@gosm.com', '455-454-4555', 1);

INSERT INTO Patient (id, name, date_of_birth, address, email, telephone)
VALUES (1, 'Patient1', '1998-02-24', '7th', 'boi@gosm.com', '455-454-4555'),
       (2, 'Patient2', '1997-02-24', '7th', 'boi@gosm.com', '455-454-4555'),
       (3, 'Patient3', '1996-02-24', '7th', 'boi@gosm.com', '455-454-4555'),
       (4, 'Patient4', '1995-02-24', '7th', 'boi@gosm.com', '455-454-4555'),
       (5, 'Patient5', '1994-02-24', '7th', 'boi@gosm.com', '455-454-4555');

INSERT INTO Appointment (date_time, dentist_id, receptionist_id, clinic_id, patient_id, was_missed)
VALUES ('2020-04-05', 1, 1, 1, 1, 1),
       ('2020-04-06', 1, 1, 1, 1, 1),
       ('2020-04-07', 1, 1, 1, 1, 1),
       ('2020-04-08', 1, 1, 1, 1, 1),
       ('2020-04-09', 1, 1, 1, 1, 1);

INSERT INTO Bill (date_time, clinic_id, patient_id, receptionist_id)
VALUES ('2020-04-05', 1, 1, 1),
       ('2020-04-06', 1, 1, 1),
       ('2020-04-07', 1, 1, 1),
       ('2020-04-08', 1, 1, 1),
       ('2020-04-09', 1, 1, 1);

INSERT INTO Treatment (name, cost, appointment_id, bill_id, assigned_by_dentist_id, assigned_to_dentist_id)
VALUES ('Cleaning', 350, 1, 1, 1, 1),
       ('Cleaning', 350, 1, 1, 1, 1),
       ('Cleaning', 350, 1, 1, 1, 1),
       ('Cleaning', 350, 1, 1, 1, 1),
       ('Cleaning', 350, 1, 1, 1, 1);

INSERT INTO Appointment (date_time, dentist_id, receptionist_id, clinic_id, patient_id, was_missed)
VALUES ('2017-02-27', 1, 1, 1, 2, 0),
       ('2017-02-27', 1, 1, 1, 2, 1),
       ('2017-02-27', 1, 1, 1, 2, 1),
       ('2017-02-27', 1, 1, 1, 2, 0),
       ('2017-02-27', 1, 1, 1, 2, 0);

INSERT INTO `Patient`(`id`, `name`, `date_of_birth`, `address`, `email`, `telephone`)
VALUES (NULL, 'Bobson Dugnutt', '1968-04-12', '13 SW. Sunbeam Street,Bolingbrook, IL 60440', NULL, '(401) 950-3972'),
       (NULL, 'Scott Dourque', '1970-05-16', NULL, 'scott.dourque@memail.com', '(454) 658-1025'),
       (NULL, 'Tony Smehrik', '1980-06-30', '525 West Prospect Lane, Oak Creek, WI 53154', NULL, '(328) 912-8299'),
       (NULL, 'Jeromy Gride', '1994-10-06', NULL, 'Jeromy.Gride@mail.com', '(454) 254-5416'),
       (NULL, 'Mike Truk', '1969-02-18', '7497 Locust Lane, Streamwood, IL 60107', NULL, '(572) 296-1598'),
       (NULL, 'Karl Dandleton', '1966-03-26', NULL, 'dandledoo@hive.com', '(619) 650-1898'),
       (NULL, 'Anatoli Smorin', '1986-11-20', '166 Charles St., Carmel, NY 10512', NULL, '(645) 442-3561'),
       (NULL, 'Daryl Archideld', '1996-12-29', NULL, 'daryl.arch@fishsail.com', '(229) 424-7182'),
       (NULL, 'Sleve Mcdichael', '1978-07-10', '6 West Ramblewood Street, Central Islip, NY 11722', NULL,
        '(787) 206-9858'),
       (NULL, 'Tim Sandaele', '1966-05-03', NULL, 'timmy,sandals@skadoodle.com', '(414) 268-3589');

INSERT INTO `Clinic`(`id`, `name`, `address`, `email`, `telephone`)
VALUES (NULL, 'Divine Intervention Dental Clinic', '318 Euclid Rd., Kent, OH 44240', 'didc@dental.mail.com',
        '(598) 934-9631'),
       (NULL, 'Steel Teeth Clinic', '93 West San Pablo Ave., Owatonna, MN 55060', 'stc@dental.mail.com',
        '(490) 780-1504'),
       (NULL, 'Bright White Dentistry', '165 Nicolls Street, Prattville, AL 36067', 'bwd@dental.mail.com',
        '(339) 643-1179'),
       (NULL, 'Emergency Dental Clinic', '735 James Ave., San Lorenzo, CA 94580', 'wdc@dental.mail.com',
        '(531) 782-6192'),
       (NULL, 'Wide Open Dental Work', '8057 Selby Drive, Hazleton, PA 18201', 'wodw@dental.mail.com',
        '(581) 735-9703'),
       (NULL, 'Mouth Care Clinic', '11 Saxon Dr., Muscatine, IA 52761', 'mcc@dental.mail.com', '(823) 284-2274'),
       (NULL, 'Jaw Work Dental Clinic', '7510 W. Windsor St., New Baltimore, MI 48047', 'jwdc@dental.mail.com',
        '(834) 852-8625'),
       (NULL, 'Urgent Smile Clinic', '7284 Wellington Street, Bismarck, ND 58501', 'usc@dental.mail.com',
        '(275) 562-0304'),
       (NULL, 'Advanced Dentisty', '45 Trout Ave., Oconomowoc, WI 53066', 'ad@dental.mail.com', '(882) 954-2633'),
       (NULL, 'Clean Job Dentistry', '506 E. Heather Road, Mount Juliet, TN 37122', 'cjd@dental.mail.com',
        '(206) 648-8808');

INSERT INTO `Dentist`(`id`, `name`, `address`, `email`, `telephone`, `is_assistant`, `clinic_id`)
VALUES (NULL, 'Onson Sweemey', '32 Jones Lane, Palm Coast, FL 32137', NULL, '(531) 782-6192', 0, 1),
       (NULL, 'Rey Mcsriff', '195 S. Squaw Creek St., Camp Hill, PA 17011', 'rey.micmac@live.com', '(339) 643-1179', 1,
        1),
       (NULL, 'Glenallen Mixon', '9346 Greenview Ave., Duluth, GA 30096', NULL, '(796) 758-2605', 0, 2),
       (NULL, 'Mario Mcrlwain', '811 Riverview Lane, Drexel Hill, PA 19026', NULL, '(612) 638-1422', 1, 2),
       (NULL, 'Raul Chamgerlain', '360 Saxon Street, Hightstown, NJ 08520', 'raulc@roover.com', '(237) 950-6108', 0, 3),
       (NULL, 'Kevin Nogilny', '2 Lawrence St., Natick, MA 01760', 'nogilny.kev@stuv.com', '(272) 621-3882', 1, 3),
       (NULL, 'Willie Dustice', '408 North Crescent Street, Marietta, GA 30008', NULL, '(634) 653-4646', 0, 4),
       (NULL, 'Shown Furcotte', '7448 Augusta St., Southampton, PA 18966', 'see.shown@bumble.com', '(221) 761-7034', 1,
        4),
       (NULL, 'Dean Wesrey', '259 Myrtle Street, Raleigh, NC 27603', NULL, '(742) 582-1362', 0, 5),
       (NULL, 'Dwigt Rortugal', '65 Plymouth Street, Bloomfield, NJ 07003', 'd.roar@mail.com', '(244) 892-6848', 0, 5);

INSERT INTO `Receptionist`(`id`, `name`, `address`, `email`, `telephone`, `clinic_id`)
VALUES (NULL, 'Mike Sernandez', '395 South Devonshire Street, Hamden, CT 06514', NULL, '(739) 673-2915', 1),
       (NULL, 'Todd Bonzalez', '98 S. Halifax St., Annandale, VA 22003', 'ToddB@roover.com', '(454) 961-6807', 2),
       (NULL, 'Gabriel Burton', '276 Wentworth Rd., Brownsburg, IN 46112', NULL, '(904) 504-7671', 3),
       (NULL, 'Charlie Kaur', '813 James St., Ocean Springs, MS 39564', 'k.charlie@hive.com', '(873) 920-1716', 4),
       (NULL, 'Harley Gardner', '9 Washington Dr., New Rochelle, NY 10801', NULL, '(452) 767-5900', 5),
       (NULL, 'Jake Robinson', '836 Gates Rd., Burlington, MA 01803', 'Jake.robin@stuv.com', '(231) 472-0913', 1),
       (NULL, 'Leon Rees', '9494 Pendergast St., Hoffman Estates, IL 60169', NULL, '(265) 226-4231', 2),
       (NULL, 'Eliseo Ramirez', '460 Rockville Ave., Plainfield, NJ 07060', 'ella.ra@fishsail.com', '(966) 538-7004',
        3),
       (NULL, 'Leland Gill', '9984 Penn Street, Staten Island, NY 10301', NULL, '(624) 970-8733', 4),
       (NULL, 'Alfonso Baird', '927 N. West Dr., North Royalton, OH 44133', 'alob@skadoodle.com', '(403) 684-8368', 5);



INSERT INTO `Bill`(`id`, `date_time`, `is_paid`, `clinic_id`, `patient_id`, `receptionist_id`)
VALUES (NULL, '2017-02-27 23:59:59', NULL, 1, 1, 5),
       (NULL, '2017-02-27 23:59:59', 1, 2, 2, 5),
       (NULL, '2017-02-27 23:59:59', NULL, 3, 3, 4),
       (NULL, '2017-02-27 23:59:59', 1, 4, 4, 3),
       (NULL, '2017-02-27 23:59:59', NULL, 5, 5, 2),
       (NULL, '2017-02-27 23:59:59', 0, 6, 6, 10);

INSERT INTO `Treatment`(`id`, `name`, `cost`, `appointment_id`, `bill_id`, `assigned_by_dentist_id`,
                        `assigned_to_dentist_id`)
VALUES (NULL, 'Dental Implants', 5300.95, 1, 1, 1, 10),
       (NULL, 'Tooth Whitening', 150.99, 2, 2, 1, 9),
       (NULL, 'Crowns', 500.50, 3, 3, 3, 8),
       (NULL, 'Orthodontic Braces', 7800.00, 4, 4, 3, 7),
       (NULL, 'Bridges', 780.00, 5, 5, 5, 6),
       (NULL, 'Dentures', 10800.30, 5, 5, 5, 5),
       (NULL, 'Examination', 100.00, 6, 6, 7, 4),
       (NULL, 'Root Canal', 230.00, 6, 6, 7, 3),
       (NULL, 'Gum Treatment', 200.60, 4, 4, 9, 2),
       (NULL, 'Wisdom Tooth Extraction', 610.00, 1, 1, 9, 1);

INSERT INTO `Appointment`(`id`, `date_time`, `was_missed`, `receptionist_id`, `clinic_id`, `patient_id`, `dentist_id`)
VALUES (NULL, '2017-02-27', NULL, 1, 1, 1, NULL),
       (NULL, '2017-02-27', 1, NULL, 2, 2, 2),
       (NULL, '2020-04-05', 0, 3, 3, 3, NULL),
       (NULL, '2020-04-06', NULL, 4, 4, 4, NULL),
       (NULL, '2019-10-23', 0, NULL, 5, 5, 5),
       (NULL, '2017-07-30', 0, 6, 6, 6, NULL),
       (NULL, '2018-06-10', NULL, 7, 7, 7, NULL),
       (NULL, '2018-07-03', 1, 8, 8, 8, NULL),
       (NULL, '2016-04-15', 1, NULL, 9, 9, 10),
       (NULL, '2015-09-19', NULL, 10, 10, 10, NULL);