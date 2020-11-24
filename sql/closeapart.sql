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
(4, 'What is the next number in the series: 2, 9, 30, 93, …?'),
(5, 'If y=10x − 1 and the value of x is 10, what is the value of y?'),
(6, 'If a recipe requires 400 grams of potatoes for four people, how many kilograms would be required for twelve
people?'),
(7, 'A dress has a thirty percent discount applied and is on sale for €63. What was the original price of the dress
before the reduction?'),
(8, 'Geoff thinks of a number. He deducts five from it and then divides the result by three. His answer is 25. What
number did he start with?'),
(9, 'What is nine-tenths of 2000?'),
(10, '3 − 7 × 4 = ?');

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
(16, 2, 0, '111cm³ (centimetres cubed)'),
(17, 2, 0, '200cm³ (centimetres cubed)'),
(18, 2, 1, '125cm³ (centimetres cubed)'),
(19, 2, 0, '150cm³ (centimetres cubed)'),
(20, 3, 1, '144'),
(21, 3, 0, '120'),
(22, 3, 0, '168'),
(23, 3, 0, '96'),
(24, 4, 0, '123'),
(25, 4, 0, '141'),
(26, 4, 0, '321'),
(27, 4, 1, '282'),
(28, 5, 0, '1009'),
(29, 5, 0, '10'),
(30, 5, 1, '99'),
(31, 5, 0, '199'),
(32, 6, 0, '1200kg'),
(33, 6, 1, '1.2kg'),
(34, 6, 0, '12kg'),
(35, 6, 0, '0.12kg'),
(36, 7, 1, '€90'),
(37, 7, 0, '€100'),
(38, 7, 0, '€93'),
(39, 7, 0, '€110'),
(40, 8, 0, '60'),
(41, 8, 0, '40'),
(42, 8, 0, '20'),
(43, 8, 1, '80'),
(44, 9, 0, '1950'),
(45, 9, 1, '1800'),
(46, 9, 0, '1750'),
(47, 9, 0, '1850'),
(48, 10, 0, '31'),
(49, 10, 0, '-31'),
(50, 10, 1, '-25'),
(51, 10, 0, '-16');

-- Table Students

DROP TABLE IF EXISTS Students;
CREATE TABLE IF NOT EXISTS Students (
student_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
student_fullname VARCHAR(255) NULL DEFAULT NULL,
student_email VARCHAR(255) NULL DEFAULT NULL,
student_phone INT(10) ZEROFILL NULL,
student_address VARCHAR(255) NULL,
student_city VARCHAR(255) NULL,
student_country VARCHAR(255) NULL,
student_eircode VARCHAR(255) NULL,
student_bio TEXT NULL,
student_avatar VARCHAR(255) DEFAULT 'blank-profile-picture.png',
PRIMARY KEY (student_id));

-- Data for Students

INSERT INTO Students (student_id, student_fullname, student_email, student_phone, student_address, student_city, student_country, student_eircode, student_bio, student_avatar) VALUES
(1, 'David Ryan', 'david.ryan@gmail.com', 0892861635, '93 Park Street, Dundalk, County Louth, A91 P868', 'Dundalk', 'Ireland', 'A91 P868', 'Hi, I am David!', 'blank-profile-picture.png');