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
INSERT INTO `user` VALUES ('1','comp440','pass1234', 'Mark', 'Ajina', 'markajina@sexyman.org'),('2','comp440','pass1234', 'Ricardo', 'Carrillo', 'bearbear@copcop.com'),('3','comp442','pass1234','Jesus', 'Garcia', 'Iran@ofideas.com'),('4','comp443','pass1234', 'Erick', 'Anderson', 'Admiral@aol.com'),('5','comp444','pass1234','Joe','Bunni','Jojo@Bizzare.com');

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
INSERT INTO `blog` VALUES ('101','Welcome','Welcome to the blog','1'),('105','Nice to meet you all','I hope we can all get along','1'),('123','Boring','Not much to do on this blog','2'),('127','Having a great time','Posting on this blog is fun','3'),('130','Leaving this blog','Im leaving for another blog','1');

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
INSERT INTO `comment` VALUES ('101','Welcome to the blog','101','1'),('105','I hope we can all get along','101','2'),('123','Not much to do on this blog','101','3'),('127','Posting on this blog is fun','101' ,'3'),('130','Im leaving for another blog','101','1');


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
INSERT INTO `tag` VALUES ('14365','NewBlog'),('15347','Friendly'),('19368','Bored'),('22591','Fun, GreatTime'),('25946','Leavinglol');
