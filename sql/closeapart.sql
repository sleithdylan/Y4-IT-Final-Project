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
(1, 'Daniel Obrien', 'daniel.obrien@gmail.com', 'Demo', 0865992719, '10 Doughiska Rd, Doughiska, County Galway, H91 R4H9', 'Galway', 'Ireland', 'H91 R4H9', 'I`m Daniel, vice principle of Merlin Woods primary school', 'avataaars.png');

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
(1, 'David Ryan', 'david.ryan@gmail.com', 'Demo', 0892861635, '93 Park Street, Dundalk, County Louth, A91 P868', 'Dundalk', 'Ireland', 'A91 P868', 'Hi, I am David!', 'avataaars.png', 70, 20, 10, 1);

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
(1, 'English', 70, '3', 95, 'david.ryan@gmail.com'),
(2, 'Maths', 65, '2.5', 90, 'david.ryan@gmail.com'),
(3, 'History', 80, '1.5', 95, 'david.ryan@gmail.com'),
(4, 'Geography', 75, '2', 90, 'david.ryan@gmail.com'),
(5, 'Science', 65, '4', 85, 'david.ryan@gmail.com'),
(6, 'Gaeilge', 65, '2', 85, 'david.ryan@gmail.com');

-- Table Classes

DROP TABLE IF EXISTS Classes;
CREATE TABLE IF NOT EXISTS Classes (
class_id INT(11) NOT NULL AUTO_INCREMENT,
class_name VARCHAR(255) NULL DEFAULT NULL,
staff_email VARCHAR(255) NULL DEFAULT NULL,
PRIMARY KEY (class_id));

-- Data for Classes

INSERT INTO Classes (class_id, class_name, staff_email) VALUES
(1, "Daniel Obrien", 'daniel.obrien@gmail.com');