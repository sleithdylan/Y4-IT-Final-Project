-- Drop database if exists

DROP DATABASE IF EXISTS closeapart;

-- Create database

CREATE DATABASE closeapart CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Use database

USE closeapart;

-- Table EnglishQuiz
DROP TABLE IF EXISTS EnglishQuiz;
CREATE TABLE IF NOT EXISTS EnglishQuiz (
english_quiz_id int(11) NOT NULL AUTO_INCREMENT,
question varchar(500) NOT NULL,
answer_one varchar(256) NOT NULL,
answer_two varchar(256) NOT NULL,
answer_three varchar(256) NOT NULL,
answer_four varchar(256) NOT NULL,
correct_answer tinyint(4) NOT NULL,
PRIMARY KEY (english_quiz_id));

-- Data for EnglishQuiz
INSERT INTO EnglishQuiz (english_quiz_id, question, answer_one, answer_two, answer_three, answer_four, correct_answer) VALUES
(1, 'My grandfather walks very________', 'quick', 'fastly', 'fast', 'nice', 3),
(2, 'Choose the correct word order', 'Why she did leave so early?', 'Why did she leave so early?', 'Why did so early she leave?', 'Why so early did she leave?', 2),
(3, 'Please give me a ______________ Of paper','peice', 'piece', 'piese', 'peace', 2),
(4, 'Which is the longest pause?', 'Apostrophe', 'Dash', 'Hyphen', 'Full-stop', 2),
(5, 'Sorry, she cannot come to the phone. She _______ a bath.', 'is having', 'having', 'have', 'has', 1),
(6, 'Please _____ your dog.', 'prevent', 'stop', 'restrain', 'subdue', 3),
(7, 'A ______ of books.', 'group', 'liberty', 'pack', 'course', 2),
(8, 'The teacher is popular _____ his pupils.', 'for', 'to', 'with', 'among', 4),
(9, 'One who travels from place to place', 'Mendicant', 'Tramp', 'Itinerant', 'Journeyman', 3),
(10, 'KINDLE (Find word with opposite in meaning)', 'Ignite', 'Encourage', 'Ignore', 'Extinguish', 4);

-- Table EnglishResults
DROP TABLE IF EXISTS EnglishResults;
CREATE TABLE IF NOT EXISTS EnglishResults (
    english_result_id int(11) NOT NULL AUTO_INCREMENT,
    english_result_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    english_result_marks int(11) NOT NULL,
    student_fullname varchar(255) NOT NULL,
PRIMARY KEY (english_result_id));

-- Data for EnglishResults
INSERT INTO EnglishResults (english_result_id, english_result_date, english_result_marks, student_fullname) VALUES
(1, '2021-02-06 21:15:10', 7, 'David Ryan');

-- Table MathsQuiz
DROP TABLE IF EXISTS MathsQuiz;
CREATE TABLE IF NOT EXISTS MathsQuiz (
maths_quiz_id int(11) NOT NULL AUTO_INCREMENT,
question varchar(500) NOT NULL,
answer_one varchar(256) NOT NULL,
answer_two varchar(256) NOT NULL,
answer_three varchar(256) NOT NULL,
answer_four varchar(256) NOT NULL,
correct_answer tinyint(4) NOT NULL,
PRIMARY KEY (maths_quiz_id));

-- Data for MathsQuiz
INSERT INTO MathsQuiz (maths_quiz_id, question, answer_one, answer_two, answer_three, answer_four, correct_answer) VALUES
(1, 'What is four-fifths as a decimal?', '0.4', '0.8', '0.1', '0.6', 2),
(2, 'What is the volume of a cube which has edges measuring 5cm?', '111 centimetres cubed', '200 centimetres cubed', '125 centimetres cubed', '150 centimetres cubed', 3),
(3, 'How many months are there in twelve years?', '144', '120', '168', '96', 1),
(4, 'What is the next number in the series: 2, 9, 30, 93, ?', '123', '141', '321', '282', 4),
(5, 'What is the cube root of 512?', '10', '6', '8', '4', 3),
(6, 'If a recipe requires 400 grams of potatoes for four people, how many kilograms would be required for twelve
people?', '1200kg', '1.2kg', '12kg', '0.12kg', 2),
(7, 'A dress has a thirty percent discount applied and is on sale for 63 euro. What was the original price of the dress
before the reduction?', '90 euro', '100 euro', '93 euro', '110 euro', 1),
(8, 'Geoff thinks of a number. He deducts five from it and then divides the result by three. His answer is 25. What
number did he start with?', '60', '40', '20', '80', 4),
(9, 'What is nine-tenths of 2000?', '1950', '1800', '1750', '1850', 2),
(10, 'How many months of the year have only 30 days?', '3', '2', '4', '1', 3);

-- Table MathsResults
DROP TABLE IF EXISTS MathsResults;
CREATE TABLE IF NOT EXISTS MathsResults (
    maths_result_id int(11) NOT NULL AUTO_INCREMENT,
    maths_result_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    maths_result_marks int(11) NOT NULL,
    student_fullname varchar(255) NOT NULL,
PRIMARY KEY (maths_result_id));

-- Data for MathsResults
INSERT INTO MathsResults (maths_result_id, maths_result_date, maths_result_marks, student_fullname) VALUES
(1, '2021-02-06 21:15:10', 7, 'David Ryan');

-- Table HistoryQuiz
DROP TABLE IF EXISTS HistoryQuiz;
CREATE TABLE IF NOT EXISTS HistoryQuiz (
history_quiz_id int(11) NOT NULL AUTO_INCREMENT,
question varchar(500) NOT NULL,
answer_one varchar(256) NOT NULL,
answer_two varchar(256) NOT NULL,
answer_three varchar(256) NOT NULL,
answer_four varchar(256) NOT NULL,
correct_answer tinyint(4) NOT NULL,
PRIMARY KEY (history_quiz_id));

-- Data for HistoryQuiz
INSERT INTO HistoryQuiz (history_quiz_id, question, answer_one, answer_two, answer_three, answer_four, correct_answer) VALUES
(1, 'What was special about the types of roads built by the Romans?', 'They were narrow', 'They were winding', 'They were straight', 'They were wide', 3),
(2, 'During which year did World War I begin?', '1904', '1914', '1910', '1941', 2),
(3, 'What was the name of the German leader during World War II?', 'Adolf Hitler', 'Josef Stalin', 'Mao Zedong', 'Genghis Khan', 1),
(4, 'In which country are the famous Pyramids of Giza?', 'Algeria', 'Libya', 'Syria', 'Egypt', 4),
(5, 'What type of flower is worn on Remembrance Day in Britain?', 'Windflower', 'Satin Flower', 'Poppy Flower', 'Lily Flower', 3),
(6, 'Which three countries did the Vikings come from?', 'Norway, Sweden, Finland', 'Denmark, Norway and Sweden', 'Estonia, Denmark, Norway', 'Finland, Netherlands, Belgium', 2),
(7, 'Which famous explorer discovered Cuba?', 'Marco Polo', 'Pedro Alvares Cabral', 'John Cabot', 'Christopher Columbus', 4),
(8, 'How many wives did King Henry VIII have?', '4', '6', '8', '10', 2),
(9, 'What year was the Battle of Hastings?', '1066', '1966', '1696', '1016', 1),
(10, 'Who was the President of America before Barack Obama?', 'Bill Clinton', 'Ronald Reagan', 'George Bush', 'Donald Trump', 3);

-- Table HistoryResults
DROP TABLE IF EXISTS HistoryResults;
CREATE TABLE IF NOT EXISTS HistoryResults (
    history_result_id int(11) NOT NULL AUTO_INCREMENT,
    history_result_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    history_result_marks int(11) NOT NULL,
    student_fullname varchar(255) NOT NULL,
PRIMARY KEY (history_result_id));

-- Data for HistoryResults
INSERT INTO HistoryResults (history_result_id, history_result_date, history_result_marks, student_fullname) VALUES
(1, '2021-02-06 21:15:10', 7, 'David Ryan');

-- Table GeographyQuiz
DROP TABLE IF EXISTS GeographyQuiz;
CREATE TABLE IF NOT EXISTS GeographyQuiz (
geography_quiz_id int(11) NOT NULL AUTO_INCREMENT,
question varchar(500) NOT NULL,
answer_one varchar(256) NOT NULL,
answer_two varchar(256) NOT NULL,
answer_three varchar(256) NOT NULL,
answer_four varchar(256) NOT NULL,
correct_answer tinyint(4) NOT NULL,
PRIMARY KEY (geography_quiz_id));

-- Data for GeographyQuiz
INSERT INTO GeographyQuiz (geography_quiz_id, question, answer_one, answer_two, answer_three, answer_four, correct_answer) VALUES
(1, 'Apart from Dutch and French, what is the other official language of Belgium?', 'German', 'Polish', 'Spanish', 'English', 1),
(2, 'In which hemisphere is Australia in?', 'Northern', 'Southern', 'Western', 'Eastern', 2),
(3, 'In which country is the Yellow River, also known as Huang He, located?', 'Singapore', 'India', 'Japan', 'China', 4),
(4, 'Which state did the US purchase from Russia?', 'Alaska', 'Washington', 'Oregon', 'California', 1),
(5, 'Which country is called the Land of Rising Sun?', 'Indonesia', 'Japan', 'Vietnam', 'Malaysia', 2),
(6, 'How many countries surround the Czech Republic?', '3', '2', '6', '4', 4),
(7, 'In which ocean is Fiji?', 'Pacific', 'Atlantic', 'Indian', 'Arctic', 1),
(8, 'Which Irish city is the second largest in the Republic of Ireland?', 'Galway', 'Limerick', 'Cork', 'Waterford', 3),
(9, 'What is the largest country in Scandinavia?', 'Denmark', 'Sweden', 'Norway', 'Iceland', 2),
(10, 'Madagascar is surrounded by which ocean?', 'Pacific', 'Atlantic', 'Indian', 'Arctic', 3);

-- Table GeographyResults
DROP TABLE IF EXISTS GeographyResults;
CREATE TABLE IF NOT EXISTS GeographyResults (
    geography_result_id int(11) NOT NULL AUTO_INCREMENT,
    geography_result_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    geography_result_marks int(11) NOT NULL,
    student_fullname varchar(255) NOT NULL,
PRIMARY KEY (geography_result_id));

-- Data for GeographyResults
INSERT INTO GeographyResults (geography_result_id, geography_result_date, geography_result_marks, student_fullname) VALUES
(1, '2021-02-06 21:15:10', 7, 'David Ryan');

-- Table ScienceQuiz
DROP TABLE IF EXISTS ScienceQuiz;
CREATE TABLE IF NOT EXISTS ScienceQuiz (
science_quiz_id int(11) NOT NULL AUTO_INCREMENT,
question varchar(500) NOT NULL,
answer_one varchar(256) NOT NULL,
answer_two varchar(256) NOT NULL,
answer_three varchar(256) NOT NULL,
answer_four varchar(256) NOT NULL,
correct_answer tinyint(4) NOT NULL,
PRIMARY KEY (science_quiz_id));

-- Data for ScienceQuiz
INSERT INTO ScienceQuiz (science_quiz_id, question, answer_one, answer_two, answer_three, answer_four, correct_answer) VALUES
(1, 'What is the name of a frogs young one?', 'Infant', 'Puppy', 'Tadpole', 'Calf', 3),
(2, 'What part of the skeletal system protects the brain?', 'Skull', 'Pelvis', 'Thigh', 'Spine', 1),
(3, 'Which animal from the below list is best adapted to the desert?', 'Tiger', 'Camel', 'Deer', 'Cheetah', 2),
(4, 'Which material from the following has the highest transparency?', 'Paper', 'Wood', 'Metal', 'Glass', 4),
(5, 'Where does our food collect after we chew and swallow it?', 'Stomach', 'Small intestine', 'Large intestine', 'Liver', 1),
(6, 'When you push something, what do you apply?.', 'Acceleration', 'Force', 'Mass', 'Compression', 2),
(7, 'What does boiling water convert into?', 'Mist', 'Clouds', 'Snow', 'Steam', 4),
(8, 'How does a dog express happiness?', 'Twitching ears', 'Wagging tail', 'Closing eyes', 'Moving head', 2),
(9, 'What pumps blood through the entire body?', 'Brain', 'Kidneys', 'Lungs', 'Heart', 4),
(10, 'What part of the plant conducts photosynthesis?', 'Branch', 'Root', 'Leaf', 'Trunk', 3);

-- Table ScienceResults
DROP TABLE IF EXISTS ScienceResults;
CREATE TABLE IF NOT EXISTS ScienceResults (
    science_result_id int(11) NOT NULL AUTO_INCREMENT,
    science_result_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    science_result_marks int(11) NOT NULL,
    student_fullname varchar(255) NOT NULL,
PRIMARY KEY (science_result_id));

-- Data for ScienceResults
INSERT INTO ScienceResults (science_result_id, science_result_date, science_result_marks, student_fullname) VALUES
(1, '2021-02-06 21:15:10', 7, 'David Ryan');

-- Table GaeilgeQuiz
DROP TABLE IF EXISTS GaeilgeQuiz;
CREATE TABLE IF NOT EXISTS GaeilgeQuiz (
gaeilge_quiz_id int(11) NOT NULL AUTO_INCREMENT,
question varchar(500) NOT NULL,
answer_one varchar(256) NOT NULL,
answer_two varchar(256) NOT NULL,
answer_three varchar(256) NOT NULL,
answer_four varchar(256) NOT NULL,
correct_answer tinyint(4) NOT NULL,
PRIMARY KEY (gaeilge_quiz_id));

-- Data for GaeilgeQuiz
INSERT INTO GaeilgeQuiz (gaeilge_quiz_id, question, answer_one, answer_two, answer_three, answer_four, correct_answer) VALUES
(1, 'Whats Laptop in Irish?', 'Riomhaire', 'Tabla', 'Bosca isteach', 'Teilifis', 1),
(2, 'Whats Cow in Irish?', 'Madra', 'Asal', 'Bo', 'Cangaru', 3),
(3, 'Whats Ice cream in Irish?', 'Caca milis', 'Uachtar reoite', 'Seaclaid', 'Torthai', 2),
(4, 'Whats Potato in Irish?', 'coilis', 'Tratai', 'Cairead', 'Pratai', 4),
(5, 'Whats Jam in Irish?', 'Subh', 'Su', 'Torthai', 'Glasrai', 1),
(6, 'Whats Ambulance in Irish?', 'Poilini', 'Altra', 'Otharcharr', 'Dochtuir', 3),
(7, 'Whats Fork in Irish?', 'Spunog', 'Forc', 'Scian', 'Plata', 2),
(8, 'Whats Fire in Irish?', 'Domhan', 'Gaoth', 'Uisce', 'Doiteain', 4),
(9, 'Whats Car in Irish?', 'Bad', 'Gluaistean', 'Gluaisrothar', 'Rothar', 2),
(10, 'Whats Italy in Irish?', 'An Ioslainn', 'An Indineis', 'An Iodail', 'An Iaraic', 3);

-- Table GaeilgeResults
DROP TABLE IF EXISTS GaeilgeResults;
CREATE TABLE IF NOT EXISTS GaeilgeResults (
    gaeilge_result_id int(11) NOT NULL AUTO_INCREMENT,
    gaeilge_result_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    gaeilge_result_marks int(11) NOT NULL,
    student_fullname varchar(255) NOT NULL,
PRIMARY KEY (gaeilge_result_id));

-- Data for GaeilgeResults
INSERT INTO GaeilgeResults (gaeilge_result_id, gaeilge_result_date, gaeilge_result_marks, student_fullname) VALUES
(1, '2021-02-06 21:15:10', 7, 'David Ryan');


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
staff_avatar VARCHAR(255) DEFAULT 'daniel-avataaar.png',
google_id VARCHAR(255) NULL,
PRIMARY KEY (staff_id));

-- Data for Staff

INSERT INTO Staff (staff_id, staff_fullname, staff_email, staff_password, staff_phone, staff_address, staff_city, staff_country, staff_eircode, staff_bio, staff_avatar, google_id) VALUES
(1, 'Daniel Lawson', 'daniel.lawson@gmail.com', '$2y$10$6gP5WxdxC.r4PX5VCMlUreCRTFHk5me1KAeg1zzYV5pgYoNV.4pBi', 0865992719, '10 Doughiska Rd, Doughiska, County Galway, H91 R4H9', 'Galway', 'Ireland', 'H91 R4H9', 'I`m Daniel, vice principle of Merlin Woods primary school', 'daniel-avataaar.png', NULL);

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
student_avatar VARCHAR(255) DEFAULT 'david-avataaar.png',
attendance SMALLINT(3) NULL,
attendance_explained SMALLINT(3) NULL,
attendance_unexplained SMALLINT(3) NULL,
class_id INT(11) NOT NULL,
PRIMARY KEY (student_id));

-- Data for Students

INSERT INTO Students (student_id, student_fullname, student_email, student_password, student_phone, student_address, student_city, student_country, student_eircode, student_bio, student_avatar, attendance, attendance_explained, attendance_unexplained, class_id) VALUES
(1, 'David Moore', 'david.moore@gmail.com', '$2y$10$kmV5/cQZ3jkhsMmXdhEHHeZ22iFe6lQNax0NVatd7R1FVlBizGOH2', 0892861635, '93 Park Street, Dundalk, County Louth, A91 P868', 'Dundalk', 'Ireland', 'A91 P868', 'Hi, I am David!', 'david-avataaar.png', 70, 20, 10, 1),
(2, 'Harvey Lane', 'harvey.lane@gmail.com', '$2y$10$8gsngH.F4HVX9sUfTrIZ1..fFe7RybSvrSV2EC/atidwLJ2928Xsu', NULL, '41 Summercove, Lahinch, County Clare, V95 XE97', 'Lahinch', 'Ireland', 'V95 XE97', 'Hi, I am Harvey!', 'harvey-avataaar.png', 40, 35, 25, 1),
(3, 'Lucy Stewart', 'lucy.stewart@gmail.com', '$2y$10$f6Ezo5BX8VwgHO2Ac4ApHeU0b1cxL9QFZopmi1nzkKHCybeL3bqBW', NULL, '40 Brookdale Road, Swords, County Dublin, K67 T9E2', 'Swords', 'Ireland', 'K67 T9E2', 'Hi, I am Lucy!', 'lucy-avataaar.png', 85, 10, 5, 1),
(4, 'Adam Hill', 'adam.hill@gmail.com', '$2y$10$eCyqnt/D3DgbEOltd3B1a.Tojth6YkLvUE3u.08zSkcrap0nEOHha', 0863759952, '14 Woodville Heath, Athlone, County Westmeath, N37 TC95', 'Athlone', 'Ireland', 'N37 TC95', 'Hi, I am Adam!', 'adam-avataaar.png', 50, 25, 25, 1),
(5, 'Naomi Kerr', 'naomi.kerr@gmail.com', '$2y$10$FoYfC8NZg3v7mHYDHmQyWuwm/ori./ORJvYYPaQLf.nVhwt21nLLu', 0894538753, '22 Woodlands, Lackagh, County Galway, H65 W957', 'Lackagh', 'Ireland', 'H65 W957', 'Hi, I am Naomi!', 'naomi-avataaar.png', 75, 20, 5, 1);

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

-- Table Announcements

DROP TABLE IF EXISTS Announcements;
CREATE TABLE IF NOT EXISTS Announcements (
  announcement_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  announcement_subject VARCHAR(255) NOT NULL,
  announcement_description TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  staff_email VARCHAR(255) NULL DEFAULT NULL,
PRIMARY KEY (announcement_id));

-- Data for Announcements

INSERT INTO Announcements (announcement_id, announcement_subject, announcement_description, created_at, staff_email) VALUES
(1, 'Homework', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nulla commodi fuga incidunt aliquid quibusdam.', '2021-02-01 10:30:00', 'daniel.lawson@gmail.com');