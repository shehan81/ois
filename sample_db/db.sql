/*
SQLyog Ultimate v8.55 
MySQL - 5.7.14 : Database - ois
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ois` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `class_schedules` */

DROP TABLE IF EXISTS `class_schedules`;

CREATE TABLE `class_schedules` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeframe_id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `instructor_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `class_schedules_timeframe_id_index` (`timeframe_id`),
  KEY `class_schedules_subject_id_index` (`subject_id`),
  KEY `class_schedules_instructor_id_index` (`instructor_id`),
  CONSTRAINT `class_schedules_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  CONSTRAINT `class_schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  CONSTRAINT `class_schedules_timeframe_id_foreign` FOREIGN KEY (`timeframe_id`) REFERENCES `timeframes` (`timeframe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `class_schedules` */

insert  into `class_schedules`(`class_id`,`day`,`timeframe_id`,`subject_id`,`instructor_id`,`status`,`created_at`,`updated_at`) values (1,'Monday',1,1,4,'Active',NULL,NULL),(2,'Monday',3,2,1,'Active',NULL,NULL),(3,'Tuesday',2,6,6,'Active',NULL,NULL),(4,'Tuesday',3,4,9,'Active',NULL,NULL),(5,'Wednesday',1,7,3,'Active',NULL,NULL),(6,'Wednesday',4,2,1,'Active',NULL,NULL),(7,'Thursday',3,3,2,'Active',NULL,NULL),(8,'Friday',1,1,4,'Active',NULL,NULL);

/*Table structure for table `class_students` */

DROP TABLE IF EXISTS `class_students`;

CREATE TABLE `class_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_students_class_id_index` (`class_id`),
  KEY `class_students_student_id_index` (`student_id`),
  CONSTRAINT `class_students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_schedules` (`class_id`),
  CONSTRAINT `class_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `class_students` */

insert  into `class_students`(`id`,`class_id`,`student_id`,`created_at`,`updated_at`) values (1,1,10000000,NULL,NULL),(2,1,10000001,NULL,NULL),(3,1,10000003,NULL,NULL),(4,1,10000004,NULL,NULL),(5,2,10000001,NULL,NULL),(6,7,10000000,'2017-11-07 10:02:59','2017-11-07 10:02:59'),(7,7,10000001,'2017-11-07 10:02:59','2017-11-07 10:02:59'),(8,7,10000002,'2017-11-07 10:02:59','2017-11-07 10:02:59'),(9,7,10000003,'2017-11-07 10:02:59','2017-11-07 10:02:59'),(10,7,10000004,'2017-11-07 10:02:59','2017-11-07 10:02:59'),(11,8,10000002,'2017-11-07 10:08:56','2017-11-07 10:08:56'),(12,8,10000003,'2017-11-07 10:08:56','2017-11-07 10:08:56');

/*Table structure for table `instructors` */

DROP TABLE IF EXISTS `instructors`;

CREATE TABLE `instructors` (
  `instructor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`instructor_id`),
  UNIQUE KEY `instructors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `instructors` */

insert  into `instructors`(`instructor_id`,`first_name`,`last_name`,`email`,`subjects`,`status`,`created_at`,`updated_at`) values (1,'John','Smith','john.smith@gmail.com','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','Active',NULL,NULL),(2,'Peter','Kerrie','peter@gmail.com','a:1:{i:0;s:1:\"3\";}','Active',NULL,NULL),(3,'Andrew','Issa','andres@gmail.com','a:2:{i:0;s:1:\"5\";i:1;s:1:\"7\";}','Active',NULL,NULL),(4,'Smith','Mariz','smith@gmail.com','a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"6\";}','Active',NULL,NULL),(5,'Taylor','Omanis','taylor@gmail.com','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','Active',NULL,NULL),(6,'Paul','Ferandez','paul@gmail.com','a:2:{i:0;s:1:\"5\";i:1;s:1:\"6\";}','Inactive',NULL,NULL),(7,'Joseph','Omani','joseph@gmail.com','a:2:{i:0;s:1:\"5\";i:1;s:1:\"7\";}','Active',NULL,NULL),(8,'Kenedy','Peters','ken@gmail.com','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','Active',NULL,NULL),(9,'Jean','Sean','jean@gmail.com','a:7:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";}','Active',NULL,NULL),(10,'Elizabeth','Anderson','elizabeth@gmail.com','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','Inactive',NULL,NULL),(11,'Diana','Lorenzo','diana@gmail.com','a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"6\";}','Active',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2017_10_25_235244_create_instructors_table',1),(3,'2017_10_28_043825_create_subjects_table',1),(4,'2017_10_28_063506_create_students_table',1),(5,'2017_10_28_085704_create_timeframes_table',1),(6,'2017_11_03_070647_create_class_schedules_table',1),(7,'2017_11_06_104307_create_class_students_table',1);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10000005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`student_id`,`first_name`,`last_name`,`email`,`phone`,`status`,`created_at`,`updated_at`) values (10000000,'James','Corray','james@gmail.com','0745285789','Active',NULL,NULL),(10000001,'Magiline','Lato','mag@gmail.com','0112895658','Active',NULL,NULL),(10000002,'John','Ember','jo@gmail.com','0772145875','Active',NULL,NULL),(10000003,'Vigneth','Martin','vig@gmail.com','0114525878','Active',NULL,NULL),(10000004,'Santa','Smith','san@gmail.com','0762478587','Active',NULL,NULL);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subjects_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`code`,`title`,`status`,`created_at`,`updated_at`) values (1,'M001','Mathematics I','Active',NULL,NULL),(2,'M002','Mathematics II','Active',NULL,NULL),(3,'S001','Sinhala','Active',NULL,NULL),(4,'S002','Sinhala Literature','Active',NULL,NULL),(5,'ENG1','English I','Active',NULL,NULL),(6,'ENG2','English II','Active',NULL,NULL),(7,'ENGL','English Literature','Active',NULL,NULL);

/*Table structure for table `timeframes` */

DROP TABLE IF EXISTS `timeframes`;

CREATE TABLE `timeframes` (
  `timeframe_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`timeframe_id`),
  UNIQUE KEY `timeframes_from_to_unique` (`from`,`to`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `timeframes` */

insert  into `timeframes`(`timeframe_id`,`from`,`to`,`created_at`,`updated_at`) values (1,'10:00:00','12:00:00',NULL,NULL),(2,'12:00:00','14:00:00',NULL,NULL),(3,'14:00:00','16:00:00',NULL,NULL),(4,'16:00:00','18:00:00',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','shehan.fdo.lk@gmail.com','$2y$10$77UMFvKXtorBq86buuFNhORMg3VrW48feNTaXiIDdzIFjTL.CxUQS','TwJH8yJnMDBrKgxTZDtfgAZUTvNkK7L0y6p19tiG0Kk9HGrrKGLAeFnq0zal','2017-11-07 09:51:54','2017-11-07 09:51:54');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
