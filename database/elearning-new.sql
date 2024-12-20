-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for elearning
CREATE DATABASE IF NOT EXISTS `elearning` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `elearning`;

-- Dumping structure for table elearning.academic_year
CREATE TABLE IF NOT EXISTS `academic_year` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `sy` varchar(150) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.academic_year: ~2 rows (approximately)
/*!40000 ALTER TABLE `academic_year` DISABLE KEYS */;
INSERT INTO `academic_year` (`id`, `sy`, `status`) VALUES
	(1, '2020-2019', 1),
	(2, '2021', 0);
/*!40000 ALTER TABLE `academic_year` ENABLE KEYS */;

-- Dumping structure for table elearning.backpack
CREATE TABLE IF NOT EXISTS `backpack` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `student_id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `upload_file_id` int(30) NOT NULL,
  `lesson_id` int(30) NOT NULL,
  `pinned` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.backpack: ~2 rows (approximately)
/*!40000 ALTER TABLE `backpack` DISABLE KEYS */;
INSERT INTO `backpack` (`id`, `student_id`, `title`, `description`, `upload_file_id`, `lesson_id`, `pinned`, `date_created`, `date_updated`) VALUES
	(1, 3, 'Sample File 101', 'This is a sample File save on my backpack 101.', 2, 1, 1, '2021-09-04 09:03:27', '2022-11-21 22:20:06'),
	(2, 3, 'Sample Video', 'Sample Video Stored on my Backpack.', 4, 1, 1, '2021-09-04 09:16:15', '2022-11-21 22:20:08');
/*!40000 ALTER TABLE `backpack` ENABLE KEYS */;

-- Dumping structure for table elearning.class
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `department_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `level` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.class: ~2 rows (approximately)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`id`, `department_id`, `course_id`, `level`, `section`) VALUES
	(1, 1, 1, '1', 'A'),
	(2, 1, 1, '1', 'B');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- Dumping structure for table elearning.class_subjects
CREATE TABLE IF NOT EXISTS `class_subjects` (
  `academic_year_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.class_subjects: ~4 rows (approximately)
/*!40000 ALTER TABLE `class_subjects` DISABLE KEYS */;
INSERT INTO `class_subjects` (`academic_year_id`, `class_id`, `subject_id`) VALUES
	(1, 1, 1),
	(1, 1, 2),
	(1, 2, 1),
	(1, 2, 2);
/*!40000 ALTER TABLE `class_subjects` ENABLE KEYS */;

-- Dumping structure for table elearning.class_subjects_faculty
CREATE TABLE IF NOT EXISTS `class_subjects_faculty` (
  `academic_year_id` int(30) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `class_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.class_subjects_faculty: ~2 rows (approximately)
/*!40000 ALTER TABLE `class_subjects_faculty` DISABLE KEYS */;
INSERT INTO `class_subjects_faculty` (`academic_year_id`, `faculty_id`, `class_id`, `subject_id`) VALUES
	(1, 'F-12345', 1, 1),
	(1, 'F-12345', 2, 2);
/*!40000 ALTER TABLE `class_subjects_faculty` ENABLE KEYS */;

-- Dumping structure for table elearning.course
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `course` varchar(250) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.course: ~0 rows (approximately)
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`id`, `course`, `description`) VALUES
	(1, 'BSIS', 'Bachelor of Science in Information Systems');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;

-- Dumping structure for table elearning.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `department` varchar(250) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.department: ~0 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `department`, `description`) VALUES
	(1, 'CIT', 'College of industrial Technology');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table elearning.faculty
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `faculty_id` varchar(50) NOT NULL,
  `department_id` int(30) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text,
  `password` text,
  `dob` date DEFAULT NULL,
  `avatar` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.faculty: ~0 rows (approximately)
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` (`id`, `faculty_id`, `department_id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `address`, `password`, `dob`, `avatar`) VALUES
	(1, 'F-12345', 1, 'George', 'C', 'Wilson', 'gwilson@sample.com', '+1234567899', 'Male', 'Sample Address', '25f9e794323b453885f5181f1b624d0b', '2022-08-22', 'uploads/1668882660_faculty.png');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;

-- Dumping structure for table elearning.lessons
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `academic_year_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text,
  `ppt_path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.lessons: ~2 rows (approximately)
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` (`id`, `academic_year_id`, `subject_id`, `faculty_id`, `title`, `description`, `ppt_path`) VALUES
	(1, 1, 2, 'F-12345', 'Lesson 101 Test', '&lt;h2 style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;&lt;b&gt;Sample Heading 1&lt;/b&gt;&lt;/h2&gt;&lt;h2 style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; font-size: 14px;&quot;&gt;Lorem ipsum sasaaa sit amet, consectetur adipiscing elit. Sed enim ipsum, rutrum eu erat sed, lacinia hendrerit sapien. Ut viverra dapibus velit nec pellentesque. Morbi ac gravida tortor. Curabitur scelerisque nisl metus. Fusce diam dui, feugiat vel congue a, convallis pulvinar dui. Donec ut felis vel dolor vehicula tincidunt vitae id nibh. Mauris mollis leo pulvinar vehicula sagittis. Sed bibendum arcu at eros imperdiet pellentesque non non orci. Etiam accumsan pulvinar egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec odio nec quam ultrices facilisis. Nam tempor a neque dapibus lacinia. Etiam porttitor at urna sed pellentesque. Phasellus rhoncus mi at lobortis semper. Vivamus tempus urna nec sagittis vehicula. Nam sagittis velit nec quam molestie volutpat quis et ex.&lt;/p&gt;&lt;/h2&gt;&lt;h2&gt;&lt;b&gt;Sample Heading 2&lt;/b&gt;&lt;/h2&gt;&lt;h2&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; font-size: 14px;&quot;&gt;Sed in imperdiet nisi, non ultrices lectus. Donec auctor, ante sed vestibulum cursus, ex neque scelerisque augue, a faucibus libero lectus eu mauris. Morbi ac quam non felis malesuada lacinia vel laoreet tortor. Proin euismod risus sit amet scelerisque imperdiet. Phasellus ut neque mollis, porttitor velit a, congue libero. Ut cursus accumsan lectus, vitae congue mi pellentesque vitae. Integer pulvinar accumsan dignissim. Proin bibendum dapibus risus at accumsan. Donec a sapien sed arcu malesuada maximus. Integer eu feugiat eros.&lt;/p&gt;&lt;/h2&gt;', 'uploads/slides/lesson_1'),
	(2, 1, 3, 'F-12345', 'Sample 101', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;Aliquam dictum ante at dapibus luctus. Maecenas semper pulvinar congue. Pellentesque semper, velit eget auctor euismod, ante sem vulputate augue, ut volutpat felis lorem nec ex. Praesent non porttitor nunc, non ullamcorper est. Donec eu arcu viverra augue tristique fermentum. Duis scelerisque bibendum augue, id laoreet massa tempor eu. Vivamus nec ante est. Fusce eu lacus sapien. Sed viverra lorem nec ante consequat tempor. Quisque ligula dolor, feugiat nec ligula porttitor, fermentum lacinia augue. Morbi fringilla vitae massa vitae tempus. Etiam ut vehicula lectus. Fusce cursus dolor vel dignissim volutpat. Etiam iaculis, justo vel fermentum varius, sem turpis hendrerit nulla, eget dapibus neque urna vitae arcu.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;Ut euismod tempor turpis, quis fringilla enim varius eget. Duis id neque blandit, vehicula purus eu, molestie dolor. Aliquam erat volutpat. Pellentesque quis dapibus elit. Curabitur ac lectus tortor. Phasellus et nibh nisl. Phasellus eu imperdiet nisi, tempor semper purus&lt;/p&gt;&lt;h3 style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);&quot;&gt;Sample Video&lt;/h3&gt;&lt;p style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);&quot;&gt;&lt;video controls=&quot;&quot; src=&quot;http://localhost/elearning/uploads/media/1/sample-mp4-file.mp4&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&gt;&lt;/video&gt;&lt;/p&gt;&lt;h2 style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);&quot;&gt;Sample Image&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;img style=&quot;width: 520.317px; height: 308.188px; float: left;&quot; src=&quot;http://localhost/elearning/uploads/media/1/clinic-cover.jpg&quot; class=&quot;note-float-left&quot;&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat orci fringilla eleifend suscipit. Nullam pulvinar sem sed velit scelerisque interdum. Aenean condimentum pellentesque fermentum. In at gravida arcu. Pellentesque iaculis commodo dolor non fringilla. Pellentesque erat ipsum, lobortis nec urna id, varius feugiat ante. Sed luctus massa libero, vel dapibus magna ullamcorper ut.&lt;/p&gt;&lt;div&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;Pellentesque dictum id lectus id vulputate. Integer mattis orci nisl, euismod vestibulum libero sollicitudin sed. Aliquam felis ipsum, mattis ut leo at, vulputate eleifend ligula. Nam placerat aliquam finibus. Sed pretium erat a arcu tempor, nec laoreet nulla iaculis. Praesent diam orci, rhoncus vel tempus in, bibendum vel enim. Nulla hendrerit cursus lectus. Integer porttitor sodales eleifend. Vestibulum auctor felis id odio malesuada, in dapibus nunc ornare. Ut ullamcorper viverra nisi et rhoncus. Etiam venenatis ante vel elit euismod porta.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;&quot;=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;/div&gt;&lt;h3 style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);&quot;&gt;Sample PDF Viewer&lt;/h3&gt;&lt;p style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;[pdf_view path = uploads/media/1/sample.pdf]&lt;/font&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/slides/lesson_2');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;

-- Dumping structure for table elearning.lesson_class
CREATE TABLE IF NOT EXISTS `lesson_class` (
  `lesson_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.lesson_class: ~16 rows (approximately)
/*!40000 ALTER TABLE `lesson_class` DISABLE KEYS */;
INSERT INTO `lesson_class` (`lesson_id`, `class_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(2, 1),
	(2, 2),
	(3, 2),
	(4, 2);
/*!40000 ALTER TABLE `lesson_class` ENABLE KEYS */;

-- Dumping structure for table elearning.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text,
  `password` text,
  `dob` date DEFAULT NULL,
  `avatar` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.students: ~2 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `student_id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `address`, `password`, `dob`, `avatar`) VALUES
	(2, '2020001', 'Nimrah', 'test', 'Test', 'test@gmail.com', '0316855475', 'Male', 'Sahiwal', '25f9e794323b453885f5181f1b624d0b', '2022-08-22', NULL),
	(3, '1277', 'Nimra', 'asassa', 'Sheikh', 'nimrah@gmail.com', '03168512125', 'Male', 'sassasasasaasa', '25f9e794323b453885f5181f1b624d0b', '2022-08-26', 'uploads/1668890880_student.png');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table elearning.student_class
CREATE TABLE IF NOT EXISTS `student_class` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `academic_year_id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.student_class: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_class` DISABLE KEYS */;
INSERT INTO `student_class` (`id`, `academic_year_id`, `student_id`, `class_id`) VALUES
	(1, 1, 1277, 1);
/*!40000 ALTER TABLE `student_class` ENABLE KEYS */;

-- Dumping structure for table elearning.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(250) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.subjects: ~2 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `subject_code`, `description`) VALUES
	(1, 'S101', 'Subject 10'),
	(2, 'S102', 'Subject 102');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table elearning.system_info
CREATE TABLE IF NOT EXISTS `system_info` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.system_info: ~0 rows (approximately)
/*!40000 ALTER TABLE `system_info` DISABLE KEYS */;
INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
	(1, 'name', 'Online Learning System'),
	(2, 'address', 'Philippines'),
	(3, 'contact', '+1234567890'),
	(4, 'email', 'info@sample.com'),
	(6, 'short_name', 'Online Learning System'),
	(9, 'logo', 'uploads/1630740180_elearning-logo.jpg');
/*!40000 ALTER TABLE `system_info` ENABLE KEYS */;

-- Dumping structure for table elearning.upload_files
CREATE TABLE IF NOT EXISTS `upload_files` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `file_path` text NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.upload_files: ~0 rows (approximately)
/*!40000 ALTER TABLE `upload_files` DISABLE KEYS */;
INSERT INTO `upload_files` (`id`, `filename`, `file_path`, `faculty_id`, `date_created`) VALUES
	(1, 'sample.pdf', 'uploads/media/1/sample.pdf', 1, '2021-09-03 14:03:48'),
	(2, 'clinic-cover.jpg', 'uploads/media/1/clinic-cover.jpg', 1, '2021-09-03 14:03:48'),
	(4, 'sample-mp4-file.mp4', 'uploads/media/1/sample-mp4-file.mp4', 1, '2021-09-03 14:19:24');
/*!40000 ALTER TABLE `upload_files` ENABLE KEYS */;

-- Dumping structure for table elearning.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elearning.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `date_added`, `date_updated`) VALUES
	(1, 'Admin', 'User', 'admin', '25f9e794323b453885f5181f1b624d0b', 'uploads/1668712980_admin.png', NULL, '2021-01-20 14:02:37', '2022-11-18 00:39:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
