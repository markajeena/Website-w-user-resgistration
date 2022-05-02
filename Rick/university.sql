-- Before execute the file, ADD your database name here:
-- The database name should be the same as your database of your user table from step 1
use `phase1`;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `follower`;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `tag`;
DROP TABLE IF EXISTS `blog`;
DROP TABLE IF EXISTS `hobbies`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`(
  `userid` bigint(20) COLLATE utf8mb4_general_ci NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userid`));
--
-- Dumping data for table `user`
--
INSERT INTO `user` VALUES ('1','comp440','pass1234', 'Jon', 'Doe', 'mysteryman@missing.org'),('2','comp440','pass1234', 'Ricardo', 'Carrillo', 'bearbear@copcop.com'),('3','comp440','pass1234','Andre', 'Obispo', 'Definitely@notme.com'),('4','comp440','pass1234', 'Rick', 'Rolled', 'GetTrolled@aol.com'),('5','comp440','pass1234','Your','Mom','CoolChick@gmail.com');

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `blog_date` DATE DEFAULT NULL,
  `user_id` bigint(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`blogid`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE SET NULL
);
--
-- Dumping data for table `blog`
--
INSERT INTO `blog` VALUES ('111','Hi There','Welcome to the blog. Please enjoy your stay', '2022-05-01','1'),('112','Pleasure to be here','I hope to talk to everyone soon','2022-05-01','1'),('113','Not Good','I dont like this blog','2022-05-01','2'),('114','Rice Cakes','I like rice cakes','2022-05-03','3'),('115','This sucks','Not using this blog anymore','2022-05-01','2');

CREATE TABLE `comment` (
  `commentid` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sentiment` BOOLEAN COLLATE utf8mb4_general_ci NOT NULL,
  `comment_date` DATE DEFAULT NULL,
  `blog_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`commentid`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blogid`) ON DELETE SET NULL,
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE SET NULL

);
INSERT INTO `comment` VALUES ('101','Hi there Nice to meet you','1' , '2022-05-01','111','4'),('105','Lets be Friends!','1' ,'2022-05-02','111','2'),('123','Hiiiiiiiiiiii','1' ,'2022-05-02','112','3'),('127','I love waffles','1' ,'2022-05-05','113' ,'3'),('130','I dont lose','0' ,'2022-05-03','114','1');


--
-- Table structure for table "tag"
--
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tagid` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`tagid`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blogid`) ON DELETE SET NULL
);
--
-- Dumping data for table `tag`
--
INSERT INTO `tag` VALUES ('155','NewHere', '111'),('156','WantToMeetPpl', '112'),('157','Yawn', '113'),('158','Excited, RiceCakes', '114'),('159','BuhBye', '115');

--
-- Table structure for table "hobies"
--
CREATE TABLE `hobbies` (
  `hobbyid` bigint(20) NOT NULL AUTO_INCREMENT,
  `hobby` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`hobbyid`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `hobby_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE SET NULL
);
--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` VALUES ('50','swimming','1'),('51','bowling','2'),('53','movie','3'),('55','movie','4'),('56','cooking','4');

--
-- Table structure for table "follower"
--
CREATE TABLE `follower` (
  `followerid` bigint(20) DEFAULT NULL,
  `followingid` bigint(20) DEFAULT NULL,
  KEY `followingid` (`followingid`),
  CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`followingid`) REFERENCES `user` (`userid`) ON DELETE SET NULL
);
--
-- Dumping data for table `follower`
--
INSERT INTO `follower` VALUES ('3','4'),('2', '5'),('2','4'),('1','4'),('1','5');
