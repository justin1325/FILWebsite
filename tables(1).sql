CREATE DATABASE `COEN161`;


CREATE TABLE  `COEN161`,`donations` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `name` VARCHAR( 100 ) NOT NULL ,
 `amount` VARCHAR( 10 ) NOT NULL ,
 `date` VARCHAT( 100 ) NOT NULL
) ENGINE = INNODB;

CREATE TABLE  `COEN161`.`blog` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `title` VARCHAR( 100 ) NOT NULL ,
 `body` LONGTEXT NOT NULL ,
 `poster` VARCHAR( 100 ) NOT NULL ,
 `date` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;

CREATE TABLE  `COEN161`.`proposals` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `name` VARCHAR( 100 ) NOT NULL ,
 `email` VARCHAR( 100 ) NOT NULL ,
 `body` LONGTEXT NOT NULL,
 `date` VARCHAR( 100) NOT NULL
) ENGINE = INNODB;


INSERT INTO  `COEN161`.`forum` (
`id` ,
`title` ,
`body` ,
`poster` ,
`date`
)
VALUES (
NULL ,  'HELLO WORLD!',  'Hello world and greetings program!',  'Webroot',  '23-Nov-2014 08:12:20'
);

INSERT INTO  `COEN161`.`forum` (
`id` ,
`title` ,
`body` ,
`poster` ,
`date`
)
VALUES (
NULL ,  'Test',  'This is
a test
of multiline content
and \"escaped\" \'quotations\'',  'Webroot',  '23-Nov-2014 08:15:33'
);



CREATE TABLE  `projects` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `title` VARCHAR( 100 ) NOT NULL ,
 `category` VARCHAR( 50 ) NOT NULL ,
 `desc` LONGTEXT NOT NULL
) ENGINE = INNODB;

-- 
-- Dumping data for table `projects`
-- 

INSERT INTO `projects` VALUES (1, 'Energy Made In Uganda', 'Renewable Energy', 'Students:\r\nJaqueline Barbosa\r\nKirsten Petersen\r\n\r\nFaculty:\r\nShoba Krishnan, Associate Professor of Electrical Engineering');
INSERT INTO `projects` VALUES (2, 'Dynamic Poverty Heat Map', 'Renewable Energy', 'Students:\r\nJonathan Ahumada\r\nKurt Jurgens\r\nJasmine Farias\r\n\r\nFaculty:\r\nSilvia Figueira, Associate Professor of Computer Engineering');
INSERT INTO `projects` VALUES (3, 'MUVE', 'Renewable Energy', 'MUVE\r\n‘MUVE’-ing better jobs and education to change lives.\r\nA web tool to digitize books for use in rural areas. Computer engineering students designed this tool to be implemented for a social enterprise called ''iMerit'' that generates new economy livelihoods in India (CEO of iMerit is Radha Basu, Director of the Frugal Innovation Lab). Considers the fact that feature phones are common, schools have outdated books, and women want and need jobs. iMerit works with employees and publishers, who then utilize MUVE to digitize relevant content. With the aim of providing a better education and enabling more jobs to be generated, MUVE is currently being deployed by a team of SCU students in rural centers in India.\r\n\r\nStudents:\r\nElysia Chu\r\nVictoria Hall\r\nMaya Hough\r\nUrvashi Reddy\r\n\r\nFaculty:\r\nSilvia Figueira, Associate Professor of Computer Engineering\r\nRadha R. Basu, Regis and Dianne McKenna Executive Professor of Engineering');
INSERT INTO `projects` VALUES (4, 'Lab On A Chip', 'Clean Water', 'Students:\r\nSonny Gandhi\r\nZuhayr Elahi\r\nJohn Seubert\r\nBen Demaree\r\nJessica VanderGiessen\r\n\r\nFaculty:\r\nShoba Krishnan, Associate Professor of Electrical Engineering\r\nSilvia Figueira, Associate Professor of Computer Engineering\r\nUnyoung (Ashley) Kim, Assistant Professor of Bioengineering');
INSERT INTO `projects` VALUES (5, 'Electrochemical Detection of Arsenic', 'Clean Water', 'Electrochemical Detection of Arsenic');
INSERT INTO `projects` VALUES (6, 'salaUno CATRA', 'Mobile For Humanity', 'Students: \r\nAnthea Buchin\r\nRuth Borrud\r\nTimothy Cheng\r\nJasmin Gonzalez\r\nAlec Nicholas\r\nLayne Orr\r\nSean Screws\r\n\r\nAdvisors:\r\nRadha R. Basu, Regis and Dianne McKenna Executive Professor of Engineering\r\n-- In Collaboration with MIT Media Labs and salaUno (Social Enterprise) --');
INSERT INTO `projects` VALUES (7, 'Seed Bank Tracking in Nicaragua', 'Mobile For Humanity', 'Frugal Innovation’s Mobile Health Lab helped Assistant Professor Chris Bacon and his student Ian Dougherty from the Department of Environmental Studies to test a mobile tracking solution for seed banks in Nicaragua. The project aims to help seed banks collect, store, and analyze data from seed deposits and withdrawals to help combat seasonal hunger. Mobile Lab TA Ryan Davidson worked with Ian to install an OpenXData server in Nicaragua and create the electronic data collection forms to be filled in via mobile phone. This initial implementation increased the efficiency of seed banks in the area by allowing them to share pricing and quantity data. Eventually the data collected at each seed bank will be analyzed for trends, which can then be used to prevent seasonal hunger due to shortages of seed. This is an example of how the tools hosted by the Mobile Health Lab can be utilized by organizations to test, develop, and distribute functional mobile software applications.\r\n\r\nStudents:\r\nIan Dougherty\r\nRyan Davidson\r\n\r\nAdvisors:\r\nChris Bacon, Assistant Professor of Environmental Studies\r\nSilvia Figueira, Associate Professor of Computer Engineering');
INSERT INTO `projects` VALUES (8, 'NetHope and SCU Mobile Health Interoperability Research', 'Mobile For Humanity', 'FIL is working with NetHope to discover how to further utilize existing technology primarily in health related fields. NetHope is an organization that is dedicated to bringing together humanitarian organizations in order to share information and practices to serve people in the developing world. This particular project explores how to analyze and develop solutions for mHealth.  Demonstration & Interoperability Lab with openXdata, DHIS 2, and OpenMRS.  Pilot with Kenya MOH.\r\n\r\nStudents:\r\nArturo Posadas\r\nJohn Seubert\r\nJesus Gonzalez\r\nRyan Davidson\r\n\r\nAdvisors:\r\nSilvia Figueira, Associate Professor of Computer Engineering');
INSERT INTO `projects` VALUES (9, 'StreetConnect', 'Mobile For Humanity', 'This project began as an idea at Community Technology Alliance (CTA), a local organization which combines technical expertise, government regulation, and a non-profit understanding to build systems collaboratively with communities and service agencies to support the homeless. CTA came to SCU wanting a group of students to implement a mobile app that would help improve their lives by utilizing a fact that many homeless people have phones. Our project is a system which provides text announcements about services such as food, shelter, jobs, and health. People can register their phone numbers online and choose which services they wish to receive text updates for, and whether they should be location-specific. Then, organizations post their announcements or event information to a web portal, and these are sent to all of the registered phone numbers in the database signed up for those services. All of the registered people’s information is stored in a database and easily changed online with the use of a one-time password. This app is clean and simple, and provides a unique service for the homeless community which has never been done before.\r\n\r\nStudents:\r\nCOEN 129 Students, Spring 2013 (Continued in ''Street Connect II'' by Nicholas Fong)\r\n\r\nAdvisors:\r\nSilvia Figueira, Associate Professor of Computer Engineering');
INSERT INTO `projects` VALUES (10, 'Community Projects', 'Community Projects', 'Advisors: Shoba Krishnan, Patti Rimland \r\n');
INSERT INTO `projects` VALUES (11, 'App for Artisans', 'Livelihood Development', 'Nishant Bisen\r\nAdvisor: Silvia Figueira\r\nPartner: SOKO');
INSERT INTO `projects` VALUES (12, 'Poverty Crusher', 'Livelihood Development', 'Rob Golterman, Brian Hammond, Thien-Ryan Le, Arvin Lie\r\nAdvisor: Timothy Hight\r\nPartners: Santa Clara Ignatian Center, SCU School of Engineering ');
INSERT INTO `projects` VALUES (13, 'Text To Learn', 'Livelihood Development', 'Melissa Bica and Elizabeth Donahue\r\nAdvisor: Silvia Figueira\r\nRoelandts (CSTS) ');
INSERT INTO `projects` VALUES (14, 'AkaBot: 3D Printing Filament Extruder', 'Other Interdisciplinary', 'Emily Albi, Kevin Kozel, Daniel Ventoza, Rachel Wilmoth\r\nAdvisor: Panthea Seperhband\r\nPartners: Roelandts (CSTS), ASME, SCU School of Engineering, Santa Clara Entrepreneurs Organization');
INSERT INTO `projects` VALUES (15, 'Mobile Cooler for the Last Mile Distribution of Vaccines in Developing Nations', 'Public Health', 'Paul Novisoff, Arturo Nunez Perez, Ryne Sitar\r\nAdvisor: Hohyun Lee\r\nPartners: Roelandts (CSTS) ');
INSERT INTO `projects` VALUES (16, 'Bamboo Connection Designs for Seismic Areas', 'Sustainable Building', 'Erik McAdams, Jenny Van Truong\r\nAdvisors: Mark Aschheim, Tonya Nilsson ');
INSERT INTO `projects` VALUES (17, 'Beacon Pack', 'Other Interdisciplinary', 'Aidan Barbari, Bryant Larsen, Jimmy Mack, James Terry, Thomas Martin\r\nAdvisors: Silvia Figueira ');
INSERT INTO `projects` VALUES (18, 'Citizen Tree Mapping', 'Other Interdisciplinary', 'Guilherme Carvalho, Tian Zhang\r\nAdvisors: Silvia Figueira ');
