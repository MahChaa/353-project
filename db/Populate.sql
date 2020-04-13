INSERT INTO Clinic (id, name, address, email, telephone)
VALUES (1, 'Dental Center Jorge', '7261 Broad Street, Romulus, MI 48174', 'dcj@gosmail.com', '(596) 725-5229'),
       (2, 'Mimac Dental Emergency', '7970 El Dorado Ave., Clifton Park, NY 12065', 'mde@att.com', '(911) 962-6734'),
       (3, 'AG Dental', '51 Cypress Street, Ottawa, IL 61350', 'agd@hottymail.com', '(802) 580-3310');


INSERT INTO Dentist (id, name, address, email, telephone, is_assistant, clinic_id)
VALUES (1, 'Luke Gardner', '221 Wilson St., Salt Lake City, UT 84119', 'lukeg@freemail.com', '(733) 494-9921', 0, 1),
       (2, 'Tommy Lloyd', '136 Bridle Ave., Athens, GA 30605', 'lewd.tommyh@bumble.com', '(653) 710-8700', 0, 1),
       (3, 'Rory Hamilton', '8835 Mayfair Rd., Warner Robins, GA 31088', 'roar.ham@amail.com', '(974) 394-9651', 1, 1),

       (4, 'Gabriel Murray', '74 Saxon Dr., Chelsea, MA 02150', 'geebm@gusta.com', '(361) 618-0619', 0, 2),
       (5, 'Theo Matthews', '929 Penn Street, Oceanside, NY 11572', 't.mathh@live.com', '(576) 501-6482', 0, 2),
       (6, 'Van Guzman', '7371 Blue Spring St., Palos Verdes Peninsula, CA 90274', 'gustaman@aol.com', '(865) 815-7288', 1, 2),

       (7, 'Cannon Mcneil', '1 Fulton Ave., Gwynn Oak, MD 21207', 'camac@mms.com', '(661) 635-9434', 0, 3),
       (8, 'Rowen Ayers', '887 New Court, Beltsville, MD 20705', 'wen.aye@bortmail.com', '(616) 310-0099', 0, 3),
       (9, 'Callan Poole', '38 Homewood Road, Clermont, FL 34711', 'callythepoo@plitsec.com', '(262) 581-7791', 1, 3);

INSERT INTO Receptionist (id, name, address, email, telephone, clinic_id)
VALUES (1, 'Emily Simpson', '9270 Grandrose Dr., West Babylon, NY 11704', 'emmi.s@msn.com', '(200) 509-8453', 1),
       (2, 'Caitlin Harris', '8133 1st Dr., Oxon Hill, MD 20745', 'hairy,cat@att.com', '(216) 298-3131', 1),
       (3, 'Hollie Fisher', '171 Oakland Dr., Lanham, MD 20706', 'fish.hoe@memail.com', '(612) 931-0107', 1),
       (4, 'Amber Gallagher', '8355 Mayflower St., Sidney, OH 45365', 'ammy.gal@comcast.com', '(857) 841-3403', 1),
       (5, 'Shannon Thomas', '2 Johnson Street, Fayetteville, NC 28303', 'shanny.t@hotmail.com', '(624) 500-1602', 1);

INSERT INTO `Patient`(`id`, `name`, `date_of_birth`, `address`, `email`, `telephone`)
VALUES
	(NULL, 'Bobson Dugnutt', '1968-04-12', '13 SW. Sunbeam Street,Bolingbrook, IL 60440', NULL, '(401) 950-3972'),
	(NULL, 'Scott Dourque', '1970-05-16', NULL, 'scott.dourque@memail.com', '(454) 658-1025'),
	(NULL, 'Tony Smehrik', '1980-06-30', '525 West Prospect Lane, Oak Creek, WI 53154', NULL, '(328) 912-8299'),
	(NULL, 'Jeromy Gride', '1994-10-06', NULL, 'Jeromy.Gride@mail.com', '(454) 254-5416'),
	(NULL, 'Mike Truk', '1969-02-18', '7497 Locust Lane, Streamwood, IL 60107', NULL, '(572) 296-1598'),
	(NULL, 'Karl Dandleton', '1966-03-26', NULL, 'dandledoo@hive.com', '(619) 650-1898'),
	(NULL, 'Anatoli Smorin', '1986-11-20', '166 Charles St., Carmel, NY 10512', NULL, '(645) 442-3561'),
	(NULL, 'Daryl Archideld', '1996-12-29', NULL, 'daryl.arch@fishsail.com', '(229) 424-7182'),
	(NULL, 'Sleve Mcdichael', '1978-07-10', '6 West Ramblewood Street, Central Islip, NY 11722', NULL, '(787) 206-9858'),
	(NULL, 'Tim Sandaele', '1966-05-03', NULL, 'timmy,sandals@skadoodle.com', '(414) 268-3589');

INSERT INTO `Clinic`(`id`, `name`, `address`, `email`, `telephone`)
VALUES
	(NULL, 'Divine Intervention Dental Clinic', '318 Euclid Rd., Kent, OH 44240', 'didc@dental.mail.com', '(598) 934-9631'),
	(NULL, 'Steel Teeth Clinic', '93 West San Pablo Ave., Owatonna, MN 55060', 'stc@dental.mail.com', '(490) 780-1504'),
	(NULL, 'Bright White Dentistry', '165 Nicolls Street, Prattville, AL 36067', 'bwd@dental.mail.com', '(339) 643-1179'),
	(NULL, 'Emergency Dental Clinic', '735 James Ave., San Lorenzo, CA 94580', 'wdc@dental.mail.com', '(531) 782-6192'),
	(NULL, 'Wide Open Dental Work', '8057 Selby Drive, Hazleton, PA 18201', 'wodw@dental.mail.com', '(581) 735-9703'),
	(NULL, 'Mouth Care Clinic', '11 Saxon Dr., Muscatine, IA 52761', 'mcc@dental.mail.com', '(823) 284-2274'),
	(NULL, 'Jaw Work Dental Clinic', '7510 W. Windsor St., New Baltimore, MI 48047', 'jwdc@dental.mail.com', '(834) 852-8625'),
	(NULL, 'Urgent Smile Clinic', '7284 Wellington Street, Bismarck, ND 58501', 'usc@dental.mail.com', '(275) 562-0304'),
	(NULL, 'Advanced Dentisty', '45 Trout Ave., Oconomowoc, WI 53066', 'ad@dental.mail.com', '(882) 954-2633'),
	(NULL, 'Clean Job Dentistry', '506 E. Heather Road, Mount Juliet, TN 37122', 'cjd@dental.mail.com', '(206) 648-8808');

INSERT INTO `Dentist`(`id`, `name`, `address`, `email`, `telephone`, `is_assistant`, `clinic_id`)
VALUES
	(NULL, 'Onson Sweemey', '32 Jones Lane, Palm Coast, FL 32137', NULL, '(531) 782-6192', 0, 1),
	(NULL, 'Rey Mcsriff', '195 S. Squaw Creek St., Camp Hill, PA 17011', 'rey.micmac@live.com', '(339) 643-1179', 1, 1),
	(NULL, 'Glenallen Mixon', '9346 Greenview Ave., Duluth, GA 30096', NULL, '(796) 758-2605', 0, 2),
	(NULL, 'Mario Mcrlwain', '811 Riverview Lane, Drexel Hill, PA 19026', NULL, '(612) 638-1422', 1, 2),
	(NULL, 'Raul Chamgerlain', '360 Saxon Street, Hightstown, NJ 08520', 'raulc@roover.com', '(237) 950-6108', 0, 3),
	(NULL, 'Kevin Nogilny', '2 Lawrence St., Natick, MA 01760', 'nogilny.kev@stuv.com', '(272) 621-3882', 1, 3),
	(NULL, 'Willie Dustice', '408 North Crescent Street, Marietta, GA 30008', NULL, '(634) 653-4646', 0, 4),
	(NULL, 'Shown Furcotte', '7448 Augusta St., Southampton, PA 18966', 'see.shown@bumble.com', '(221) 761-7034', 1, 4),
	(NULL, 'Dean Wesrey', '259 Myrtle Street, Raleigh, NC 27603', NULL, '(742) 582-1362', 0, 5),
	(NULL, 'Dwigt Rortugal', '65 Plymouth Street, Bloomfield, NJ 07003', 'd.roar@mail.com', '(244) 892-6848', 0, 5);

INSERT INTO `Receptionist`(`id`, `name`, `address`, `email`, `telephone`, `clinic_id`)
VALUES
	(NULL, 'Mike Sernandez', '395 South Devonshire Street, Hamden, CT 06514', NULL, '(739) 673-2915', 1),
	(NULL, 'Todd Bonzalez', '98 S. Halifax St., Annandale, VA 22003', 'ToddB@roover.com', '(454) 961-6807', 2),
	(NULL, 'Gabriel Burton', '276 Wentworth Rd., Brownsburg, IN 46112', NULL, '(904) 504-7671', 3),
	(NULL, 'Charlie Kaur', '813 James St., Ocean Springs, MS 39564', 'k.charlie@hive.com', '(873) 920-1716', 4),
	(NULL, 'Harley Gardner', '9 Washington Dr., New Rochelle, NY 10801', NULL, '(452) 767-5900', 5),
	(NULL, 'Jake Robinson', '836 Gates Rd., Burlington, MA 01803', 'Jake.robin@stuv.com', '(231) 472-0913', 1),
	(NULL, 'Leon Rees', '9494 Pendergast St., Hoffman Estates, IL 60169', NULL, '(265) 226-4231', 2),
	(NULL, 'Eliseo Ramirez', '460 Rockville Ave., Plainfield, NJ 07060', 'ella.ra@fishsail.com', '(966) 538-7004', 3),
	(NULL, 'Leland Gill', '9984 Penn Street, Staten Island, NY 10301', NULL, '(624) 970-8733', 4),
	(NULL, 'Alfonso Baird', '927 N. West Dr., North Royalton, OH 44133', 'alob@skadoodle.com', '(403) 684-8368', 5);

INSERT INTO `Bill`(`id`, `date_time`, `is_paid`, `clinic_id`, `patient_id`, `receptionist_id`)
VALUES
	(NULL, '2005-10-30 13:25:00', 0, 1, 1, 5),
	(NULL, '2008-04-15 10:30:00', 1, 2, 2, 5),
	(NULL, '2002-06-26 14:15:00', 0, 3, 3, 4),
	(NULL, '2015-09-16 17:45:00', 1, 4, 4, 3),
	(NULL, '2019-08-02 16:00:00', 0, 5, 5, 2),
	(NULL, '2020-12-09 16:00:00', 0, 7, 8, 9),
	(NULL, '2016-02-11 18:10:00', 0, 6, 6, 10);

INSERT INTO `Appointment`(`id`, `date_time`, `was_missed`, `receptionist_id`, `clinic_id`, `patient_id`, `dentist_id`)
VALUES
	(NULL, '2017-02-27 08:00:00', 1, 1, 7, 1, NULL),
	(NULL, '2017-02-27 15:30:00', 1, NULL, 1, 1, 2),
	(NULL, '2020-04-05 16:15:00', 0, 3, 3, 3, NULL),
	(NULL, '2020-04-06 10:00:00', 0, 4, 4, 4, NULL),
	(NULL, '2019-10-23 12:30:00', 0, NULL, 5, 5, 5),
	(NULL, '2017-07-30 15:00:00', 0, 6, 6, 6, NULL),
	(NULL, '2018-06-10 16:15:00', 1, 7, 7, 7, NULL),
	(NULL, '2018-07-03 14:00:00', 1, 8, 8, 8, NULL),
	(NULL, '2016-04-15 13:45:00', 1, NULL, 9, 1, 10),
	(NULL, '2015-09-19 14:30:00', 0, 10, 10, 10, NULL);
    
INSERT INTO Appointment (date_time, dentist_id, receptionist_id, clinic_id, patient_id, was_missed)
VALUES ('2020-04-05 15:30:00', NULL, 1, 13, 1, 1),
       ('2020-04-06 8:10:00', 13, NULL, 8, 2, 0),
       ('2020-04-07 16:40:00', 6, NULL, 2, 3, 1),
       ('2020-04-08 12:30:00', NULL, 4, 9, 4, 0),
       ('2020-04-09 13:00:00', 18, NULL, 10, 5, 1);

INSERT INTO Appointment (date_time, dentist_id, receptionist_id, clinic_id, patient_id, was_missed)
VALUES ('2017-02-27 12:00:00', NULL, 13, 1, 1, 0),
       ('2017-02-27 10:15:00', 4, NULL, 1, 2, 1),
       ('2017-02-27 13:30:00', 10, NULL, 1, 3, 1),
       ('2017-02-27 15:10:00', NULL, 10, 1, 4, 0),
       ('2017-02-27 18:10:00', NULL, 7, 1, 5, 0);

INSERT INTO `Treatment`(`id`, `name`, `cost`, `appointment_id`, `bill_id`, `assigned_by_dentist_id`, `assigned_to_dentist_id`)
VALUES
	(NULL, 'Dental Implants', 5300.95, 11, 1, 10, 1),
	(NULL, 'Tooth Whitening', 150.99, 12, 2, 10, 1),
	(NULL, 'Crowns', 500.50, 1, 3, 12, 8),
	(NULL, 'Orthodontic Braces', 7800.00, 3, 4, 12, 1),
	(NULL, 'Bridges', 780.00, 5, 5, 14, 1),
	(NULL, 'Dentures', 10800.30, 1, 5, 14, 5),
	(NULL, 'Examination', 100.00, 1, 6, 16, 4),
	(NULL, 'Root Canal', 230.00, 13, 6, 16, 1),
	(NULL, 'Gum Treatment', 200.60, 1, 4, 18, 2),
	(NULL, 'General Cleaning', 100.99, 1, 4, 18, 15),
	(NULL, 'Wisdom Tooth Extraction', 610.00, 4, 1, 18, 1);