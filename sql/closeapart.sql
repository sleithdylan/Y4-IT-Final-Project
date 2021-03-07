-- Drop database if exists

DROP DATABASE IF EXISTS closeapart;

-- Create database

CREATE DATABASE closeapart CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Use database

USE closeapart;

-- Table MathsQuestions

DROP TABLE IF EXISTS MathsQuestions;
CREATE TABLE IF NOT EXISTS MathsQuestions (
question_number int(11) NOT NULL,
question text COLLATE utf16_bin NOT NULL
);

-- Data for MathsQuestions

INSERT INTO MathsQuestions (question_number, question) VALUES
(1, 'What is four-fifths as a decimal?'),
(2, 'What is the volume of a cube which has edges measuring 5cm?'),
(3, 'How many months are there in twelve years?'),
(4, 'What is the next number in the series: 2, 9, 30, 93, ?'),
(5, 'What is the cube root of 512?'),
(6, 'If a recipe requires 400 grams of potatoes for four people, how many kilograms would be required for twelve
people?'),
(7, 'A dress has a thirty percent discount applied and is on sale for 63 euro. What was the original price of the dress
before the reduction?'),
(8, 'Geoff thinks of a number. He deducts five from it and then divides the result by three. His answer is 25. What
number did he start with?'),
(9, 'What is nine-tenths of 2000?'),
(10, 'How many months of the year have only 30 days?');

-- Table MathsChoices

DROP TABLE IF EXISTS MathsChoices;
CREATE TABLE IF NOT EXISTS MathsChoices (
id int(11) NOT NULL,
question_number int(11) NOT NULL,
is_correct tinyint(4) NOT NULL DEFAULT '0',
choice text COLLATE utf16_bin NOT NULL,
PRIMARY KEY (id));

-- Data for MathsChoices

INSERT INTO MathsChoices (id, question_number, is_correct, choice) VALUES
(12, 1, 0, '0.4'),
(13, 1, 1, '0.8'),
(14, 1, 0, '0.1'),
(15, 1, 0, '0.6'),
(16, 2, 0, '111 centimetres cubed'),
(17, 2, 0, '200 centimetres cubed'),
(18, 2, 1, '125 centimetres cubed'),
(19, 2, 0, '150 centimetres cubed'),
(20, 3, 1, '144'),
(21, 3, 0, '120'),
(22, 3, 0, '168'),
(23, 3, 0, '96'),
(24, 4, 0, '123'),
(25, 4, 0, '141'),
(26, 4, 0, '321'),
(27, 4, 1, '282'),
(28, 5, 0, '10'),
(29, 5, 0, '6'),
(30, 5, 1, '8'),
(31, 5, 0, '4'),
(32, 6, 0, '1200kg'),
(33, 6, 1, '1.2kg'),
(34, 6, 0, '12kg'),
(35, 6, 0, '0.12kg'),
(36, 7, 1, '90 euro'),
(37, 7, 0, '100 euro'),
(38, 7, 0, '93 euro'),
(39, 7, 0, '110 euro'),
(40, 8, 0, '60'),
(41, 8, 0, '40'),
(42, 8, 0, '20'),
(43, 8, 1, '80'),
(44, 9, 0, '1950'),
(45, 9, 1, '1800'),
(46, 9, 0, '1750'),
(47, 9, 0, '1850'),
(48, 10, 0, '3'),
(49, 10, 0, '2'),
(50, 10, 1, '4'),
(51, 10, 0, '1');

-- Table EnglishQuestions

DROP TABLE IF EXISTS EnglishQuestions;
CREATE TABLE IF NOT EXISTS EnglishQuestions (
question_number int(11) NOT NULL,
question text COLLATE utf16_bin NOT NULL
);

-- Data for EnglishQuestions

INSERT INTO EnglishQuestions (question_number, question) VALUES
(1, 'My grandfather walks very________'),
(2, 'Choose the correct word order'),
(3, 'Please give me a ______________ Of paper'),
(4, 'Which is the longest pause?'),
(5, 'Sorry, she cannot come to the phone. She _______ a bath.'),
(6, 'Please _____ your dog.'),
(7, 'A ______ of books.'),
(8, 'The teacher is popular _____ his pupils.'),
(9, 'One who travels from place to place'),
(10, 'KINDLE (Find word with opposite in meaning)');


-- Table EnglishChoices

DROP TABLE IF EXISTS EnglishChoices;
CREATE TABLE IF NOT EXISTS EnglishChoices (
id int(11) NOT NULL,
question_number int(11) NOT NULL,
is_correct tinyint(4) NOT NULL DEFAULT '0',
choice text COLLATE utf16_bin NOT NULL,
PRIMARY KEY (id));

-- Data for EnglishChoices

INSERT INTO EnglishChoices (id, question_number, is_correct, choice) VALUES
(12, 1, 0, 'quick'),
(13, 1, 0, 'fastly'),
(14, 1, 1, 'fast'),
(15, 1, 0, 'nice'),
(16, 2, 0, 'Why she did leave so early?'),
(17, 2, 1, 'Why did she leave so early?'),
(18, 2, 0, 'Why did so early she leave?'),
(19, 2, 0, 'Why so early did she leave?'),
(20, 3, 0, 'peice'),
(21, 3, 1, 'piece'),
(22, 3, 0, 'piese'),
(23, 3, 0, 'peace'),
(24, 4, 0, 'Apostrophe'),
(25, 4, 1, 'Dash'),
(26, 4, 0, 'Hyphen'),
(27, 4, 0, 'Full-stop'),
(28, 5, 1, 'is having'),
(29, 5, 0, 'having'),
(30, 5, 0, 'have'),
(31, 5, 0, 'has'),
(32, 6, 0, 'prevent'),
(33, 6, 0, 'stop'),
(34, 6, 1, 'restrain'),
(35, 6, 0, 'subdue'),
(36, 7, 0, 'group'),
(37, 7, 1, 'liberty'),
(38, 7, 0, 'pack'),
(39, 7, 0, 'course'),
(40, 8, 0, 'for'),
(41, 8, 0, 'to'),
(42, 8, 0, 'with'),
(43, 8, 1, 'among'),
(44, 9, 0, 'Mendicant'),
(45, 9, 0, 'Tramp'),
(46, 9, 1, 'Itinerant'),
(47, 9, 0, 'Journeyman'),
(48, 10, 0, 'Ignite'),
(49, 10, 0, 'Encourage'),
(50, 10, 0, 'Ignore'),
(51, 10, 1, 'Extinguish');

-- Table HistoryQuestions

DROP TABLE IF EXISTS HistoryQuestions;
CREATE TABLE IF NOT EXISTS HistoryQuestions (
question_number int(11) NOT NULL,
question text COLLATE utf16_bin NOT NULL
);

-- Data for HistoryQuestions

INSERT INTO HistoryQuestions (question_number, question) VALUES
(1, 'What was special about the types of roads built by the Romans?'),
(2, 'During which year did World War I begin?'),
(3, 'What was the name of the German leader during World War II?'),
(4, 'In which country are the famous Pyramids of Giza?'),
(5, 'What type of flower is worn on Remembrance Day in Britain?'),
(6, 'Which three countries did the Vikings come from?'),
(7, 'Which famous explorer discovered Cuba?'),
(8, 'How many wives did King Henry VIII have?'),
(9, 'What year was the Battle of Hastings?'),
(10, 'Who was the President of America before Barack Obama?');

-- Table HistoryChoices

DROP TABLE IF EXISTS HistoryChoices;
CREATE TABLE IF NOT EXISTS HistoryChoices (
id int(11) NOT NULL,
question_number int(11) NOT NULL,
is_correct tinyint(4) NOT NULL DEFAULT '0',
choice text COLLATE utf16_bin NOT NULL,
PRIMARY KEY (id));

-- Data for HistoryChoices

INSERT INTO HistoryChoices (id, question_number, is_correct, choice) VALUES
(12, 1, 0, 'They were narrow'),
(13, 1, 0, 'They were winding'),
(14, 1, 1, 'They were straight'),
(15, 1, 0, 'They were wide'),
(16, 2, 0, '1904'),
(17, 2, 1, '1914'),
(18, 2, 0, '1910'),
(19, 2, 0, '1941'),
(20, 3, 1, 'Adolf Hitler'),
(21, 3, 0, 'Josef Stalin'),
(22, 3, 0, 'Mao Zedong'),
(23, 3, 0, 'Genghis Khan'),
(24, 4, 0, 'Algeria'),
(25, 4, 0, 'Libya'),
(26, 4, 0, 'Syria'),
(27, 4, 1, 'Egypt'),
(28, 5, 0, 'Windflower'),
(29, 5, 0, 'Satin Flower'),
(30, 5, 1, 'Poppy Flower'),
(31, 5, 0, 'Lily Flower'),
(32, 6, 0, 'Norway, Sweden, Finland'),
(33, 6, 1, 'Denmark, Norway and Sweden'),
(34, 6, 0, 'Estonia, Denmark, Norway'),
(35, 6, 0, 'Finland, Netherlands, Belgium'),
(36, 7, 0, 'Marco Polo'),
(37, 7, 0, 'Pedro Alvares Cabral'),
(38, 7, 0, 'John Cabot'),
(39, 7, 1, 'Christopher Columbus'),
(40, 8, 0, '4'),
(41, 8, 1, '6'),
(42, 8, 0, '8'),
(43, 8, 0, '10'),
(44, 9, 1, '1066'),
(45, 9, 0, '1966'),
(46, 9, 0, '1696'),
(47, 9, 0, '1016'),
(48, 10, 0, 'Bill Clinton'),
(49, 10, 0, 'Ronald Reagan'),
(50, 10, 1, 'George Bush'),
(51, 10, 0, 'Donald Trump');


-- Table Staff

DROP TABLE IF EXISTS Staff;
CREATE TABLE IF NOT EXISTS Staff (
staff_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
staff_fullname VARCHAR(255) NULL DEFAULT NULL,
staff_email VARCHAR(255) NULL DEFAULT NULL,
staff_password VARCHAR(255) NULL DEFAULT NULL,
staff_phone INT(10) ZEROFILL NULL,
staff_address VARCHAR(255) NULL,
staff_city VARCHAR(255) NULL,
staff_country VARCHAR(255) NULL,
staff_eircode VARCHAR(255) NULL,
staff_bio TEXT NULL,
staff_avatar VARCHAR(255) DEFAULT 'avataaars.png',
PRIMARY KEY (staff_id));

-- Data for Staff

INSERT INTO Staff (staff_id, staff_fullname, staff_email, staff_password, staff_phone, staff_address, staff_city, staff_country, staff_eircode, staff_bio, staff_avatar) VALUES
(1, 'Daniel Lawson', 'daniel.lawson@gmail.com', '$2y$10$6gP5WxdxC.r4PX5VCMlUreCRTFHk5me1KAeg1zzYV5pgYoNV.4pBi', 0865992719, '10 Doughiska Rd, Doughiska, County Galway, H91 R4H9', 'Galway', 'Ireland', 'H91 R4H9', 'I`m Daniel, vice principle of Merlin Woods primary school', 'avataaars.png');

-- Table Students

DROP TABLE IF EXISTS Students;
CREATE TABLE IF NOT EXISTS Students (
student_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
student_fullname VARCHAR(255) NULL DEFAULT NULL,
student_email VARCHAR(255) NULL DEFAULT NULL,
student_password VARCHAR(255) NULL DEFAULT NULL,
student_phone INT(10) ZEROFILL NULL,
student_address VARCHAR(255) NULL,
student_city VARCHAR(255) NULL,
student_country VARCHAR(255) NULL,
student_eircode VARCHAR(255) NULL,
student_bio TEXT NULL,
student_avatar VARCHAR(255) DEFAULT 'avataaars.png',
attendance SMALLINT(3) NULL,
attendance_explained SMALLINT(3) NULL,
attendance_unexplained SMALLINT(3) NULL,
class_id INT(11) NOT NULL,
PRIMARY KEY (student_id));

-- Data for Students

INSERT INTO Students (student_id, student_fullname, student_email, student_password, student_phone, student_address, student_city, student_country, student_eircode, student_bio, student_avatar, attendance, attendance_explained, attendance_unexplained, class_id) VALUES
(1, 'David Moore', 'david.moore@gmail.com', '$2y$10$kmV5/cQZ3jkhsMmXdhEHHeZ22iFe6lQNax0NVatd7R1FVlBizGOH2', 0892861635, '93 Park Street, Dundalk, County Louth, A91 P868', 'Dundalk', 'Ireland', 'A91 P868', 'Hi, I am David!', 'avataaars.png', 70, 20, 10, 1),
(2, 'Harvey Lane', 'harvey.lane@gmail.com', '$2y$10$8gsngH.F4HVX9sUfTrIZ1..fFe7RybSvrSV2EC/atidwLJ2928Xsu', NULL, '41 Summercove, Lahinch, County Clare, V95 XE97', 'Lahinch', 'Ireland', 'V95 XE97', 'Hi, I am Harvey!', 'avataaars.png', 40, 35, 25, 1),
(3, 'Lucy Stewart', 'lucy.stewart@gmail.com', '$2y$10$f6Ezo5BX8VwgHO2Ac4ApHeU0b1cxL9QFZopmi1nzkKHCybeL3bqBW', NULL, '40 Brookdale Road, Swords, County Dublin, K67 T9E2', 'Swords', 'Ireland', 'K67 T9E2', 'Hi, I am Lucy!', 'avataaars.png', 85, 10, 5, 1),
(4, 'Adam Hill', 'adam.hill@gmail.com', '$2y$10$eCyqnt/D3DgbEOltd3B1a.Tojth6YkLvUE3u.08zSkcrap0nEOHha', 0863759952, '14 Woodville Heath, Athlone, County Westmeath, N37 TC95', 'Athlone', 'Ireland', 'N37 TC95', 'Hi, I am Adam!', 'avataaars.png', 50, 25, 25, 1),
(5, 'Naomi Kerr', 'naomi.kerr@gmail.com', '$2y$10$FoYfC8NZg3v7mHYDHmQyWuwm/ori./ORJvYYPaQLf.nVhwt21nLLu', 0894538753, '22 Woodlands, Lackagh, County Galway, H65 W957', 'Lackagh', 'Ireland', 'H65 W957', 'Hi, I am Naomi!', 'avataaars.png', 75, 20, 5, 1);

-- Table Subjects

DROP TABLE IF EXISTS Subjects;
CREATE TABLE IF NOT EXISTS Subjects (
subject_id INT(11) NOT NULL,
subject_name VARCHAR(255) NULL DEFAULT NULL,
subject_grade SMALLINT(3) NULL DEFAULT NULL,
subject_gpa VARCHAR(255) NULL DEFAULT NULL,
subject_attendance SMALLINT(3) NULL DEFAULT NULL,
student_email VARCHAR(255) NOT NULL);

-- Data for Students

INSERT INTO Subjects (subject_id, subject_name, subject_grade, subject_gpa, subject_attendance, student_email) VALUES
(1, 'English', 70, '3', 95, 'david.moore@gmail.com'),
(2, 'Maths', 65, '2.5', 90, 'david.moore@gmail.com'),
(3, 'History', 80, '1.5', 95, 'david.moore@gmail.com'),
(4, 'Geography', 75, '2', 90, 'david.moore@gmail.com'),
(5, 'Science', 65, '4', 85, 'david.moore@gmail.com'),
(6, 'Gaeilge', 65, '2', 85, 'david.moore@gmail.com'),
(1, 'English', 60, '2', 55, 'harvey.lane@gmail.com'),
(2, 'Maths', 40, '1.5', 50, 'harvey.lane@gmail.com'),
(3, 'History', 45, '1.5', 60, 'harvey.lane@gmail.com'),
(4, 'Geography', 70, '4', 80, 'harvey.lane@gmail.com'),
(5, 'Science', 50, '2.5', 65, 'harvey.lane@gmail.com'),
(6, 'Gaeilge', 35, '1', 65, 'harvey.lane@gmail.com'),
(1, 'English', 70, '3', 90, 'lucy.stewart@gmail.com'),
(2, 'Maths', 80, '4', 85, 'lucy.stewart@gmail.com'),
(3, 'History', 70, '3', 95, 'lucy.stewart@gmail.com'),
(4, 'Geography', 75, '3', 90, 'lucy.stewart@gmail.com'),
(5, 'Science', 70, '3', 85, 'lucy.stewart@gmail.com'),
(6, 'Gaeilge', 60, '2.5', 75, 'lucy.stewart@gmail.com'),
(1, 'English', 75, '4', 85, 'adam.hill@gmail.com'),
(2, 'Maths', 70, '2.5', 80, 'adam.hill@gmail.com'),
(3, 'History', 60, '2', 65, 'adam.hill@gmail.com'),
(4, 'Geography', 65, '2', 70, 'adam.hill@gmail.com'),
(5, 'Science', 45, '1.5', 50, 'adam.hill@gmail.com'),
(6, 'Gaeilge', 55, '1.5', 55, 'adam.hill@gmail.com'),
(1, 'English', 60, '2', 75, 'naomi.kerr@gmail.com'),
(2, 'Maths', 65, '2.5', 80, 'naomi.kerr@gmail.com'),
(3, 'History', 60, '2', 75, 'naomi.kerr@gmail.com'),
(4, 'Geography', 55, '1.5', 60, 'naomi.kerr@gmail.com'),
(5, 'Science', 75, '4', 85, 'naomi.kerr@gmail.com'),
(6, 'Gaeilge', 60, '2', 85, 'naomi.kerr@gmail.com');

-- Table Classes

DROP TABLE IF EXISTS Classes;
CREATE TABLE IF NOT EXISTS Classes (
class_id INT(11) NOT NULL AUTO_INCREMENT,
class_name VARCHAR(255) NULL DEFAULT NULL,
staff_email VARCHAR(255) NULL DEFAULT NULL,
PRIMARY KEY (class_id));

-- Data for Classes

INSERT INTO Classes (class_id, class_name, staff_email) VALUES
(1, "Daniel Lawson", 'daniel.lawson@gmail.com');