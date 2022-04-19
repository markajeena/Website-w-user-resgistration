-- Before execute the file, ADD your database name here:
-- The database name should be the same as your database of your user table from step 1
use `user_registration`; 

--
-- Table structure for table `department`
--
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `blog`;
DROP TABLE IF EXISTS `tags`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`));
--
-- Dumping data for table `user`
--
INSERT INTO `user` VALUES ('comp440','pass1234', 'Mark', 'Ajina', 'markajina@sexyman.org'),('comp441','pass1234', 'Jesus', 'Garcia', 'thedumpy@dumptruck.com'),('comp442','pass1234','John', 'Doe', 'Iran@ofideas.com'),('comp443','pass1234', 'Erick', 'Anderson', 'Admiral@aol.com'),('comp444','pass1234','Joe','Bunni','Jojo@Bizzare.com');

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` LONGTEXT COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`blogid`),
  KEY `username` (`username`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL
);
--
-- Dumping data for table `blog`
--
INSERT INTO `blog` VALUES ('101','Welcome','Welcome to the blog','comp440'),('105','Nice to meet you all','I hope we can all get along','comp440'),('123','Boring','Not much to do on this blog','comp440'),('127','Having a great time','Posting on this blog is fun','comp440'),('130','Leaving this blog','Im leaving for another blog','comp440');

CREATE TABLE `comment` (
 `comment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
 `sentiment` BOOLEAN COLLATE utf8mb4_general_ci NOT NULL,
 `blogid` int(11) DEFAULT NULL,
 `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
 PRIMARY KEY (`comment`),
 KEY `blogid` (`blogid`),
 KEY `username` (`username`),
 CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`blogid`) REFERENCES `blog` (`blogid`) ON DELETE SET NULL,
 CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL

);
INSERT INTO `comment` VALUES ('Welcome to the blog', 1 ,'101','comp440'),('I hope we can all get along', 1 ,'101','comp442'),('Not much to do on this blog', 0, '101','comp441'),('Posting on this blog is fun',1,'101' ,'comp443'),('Im leaving for another blog',0,'101','comp440');


--
-- Table structure for table "tags"
--
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
);
--
-- Dumping data for table `tags`
--
INSERT INTO `tags` VALUES ('14365','NewBlog'),('15347','Friendly'),('19368','Bored'),('22591','Fun, GreatTime'),('25946','Leavinglol');
