-- Before execute the file, ADD your database name here:
-- The database name should be the same as your database of your user table from step 1
use `phase1`;

--
-- Table structure for table `department`
--
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `tag`;
DROP TABLE IF EXISTS `blog`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
  `userid` bigint(20) COLLATE utf8mb4_general_ci NOT NULL,
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
  `user_id` bigint(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`blogid`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE SET NULL
);
--
-- Dumping data for table `blog`
--
INSERT INTO `blog` VALUES ('111','Hi There','Welcome to the blog. Please enjoy your stay','1'),('112','Pleasure to be here','I hope to talk to everyone soon','1'),('113','Not Good','I dont like this blog','2'),('114','Rice Cakes','I like rice cakes','3'),('115','This sucks','Not using this blog anymore','1');

CREATE TABLE `comment` (
  `commentid` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `blog_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`commentid`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blogid`) ON DELETE SET NULL,
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE SET NULL

);
INSERT INTO `comment` VALUES ('101','Hi there Nice to meet you','101','1'),('105','I hope we can all get along','101','2'),('123','Not much to do on this blog','101','3'),('127','Posting on this blog is fun','101' ,'3'),('130','Im leave with you','101','1');


--
-- Table structure for table "tag"
--
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tagid` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`tagid`)
);
--
-- Dumping data for table `tag`
--
INSERT INTO `tag` VALUES ('155','NewHere'),('156','WantToMeetPpl'),('157','Yawn'),('158','Excited, RiceCakes'),('159','BuhBye');
