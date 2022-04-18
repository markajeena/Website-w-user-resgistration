-- Before execute the file, ADD your database name here:
-- The database name should be the same as your database of your user table from step 1
use `user_registration`; 

--
-- Table structure for table `department`
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`),
);
--
-- Dumping data for table `user`
--
INSERT INTO `user` VALUES ('comp440','pass1234', 'Mark', 'Ajina', 'markajina@sexyman.org'),('comp440','pass1234', 'Ricardo', 'Carrillo', 'bearbear@copcop.com'),('comp440','pass1234','Jesus', 'Garcia', 'Iran@ofideas.com'),('comp440','pass1234', 'Erick', 'Anderson', 'Admiral@aol.com'),('comp440','pass1234','Joe','Bunni','Jojo@Bizzare.com');

--
-- Table structure for table `blog`
--
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` LONGTEXT COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  --KEY `user` (`user`),
  --CONSTRAINT `course_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL,
);
--
-- Dumping data for table `blog`
--
INSERT INTO `blog` VALUES ('101','Welcome','Welcome to the blog'),('105','Nice to meet you all','I hope we can all get along'),('123','Boring','Not much to do on this blog'),('127','Having a great time','Posting on this blog is fun'),('130','Leaving this blog','Im leaving for another blog');

--
-- Table structure for table `comment`
--
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` MEDIUMTEXT COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  --KEY `dept_name` (`dept_name`),
  --CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`) ON DELETE SET NULL,
  --CONSTRAINT `instructor_chk_1` CHECK ((`salary` > 29000))
);
--
--Dumping data for table `comment`
--
INSERT INTO `blog` VALUES ('101','Welcome','Welcome to the blog'),('105','Nice to meet you all','I hope we can all get along'),('123','Boring','Not much to do on this blog'),('127','Having a great time','Posting on this blog is fun'),('130','Leaving this blog','Im leaving for another blog');


--
-- Table structure for table "tags"
--
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  --KEY `dept_name` (`dept_name`),
  --CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`) ON DELETE SET NULL,
  --CONSTRAINT `instructor_chk_1` CHECK ((`salary` > 29000))
);
--
-- Dumping data for table `tags`
--
INSERT INTO `tags` VALUES ('14365','NewBlog'),('15347','Friendly'),('19368','Bored'),('22591','Fun, GreatTime'),('25946','Leavinglol');
