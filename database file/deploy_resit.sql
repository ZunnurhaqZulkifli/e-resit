CREATE DATABASE IF NOT EXISTS `deploy_resit`
DEFAULT CHARSET utf8mb4
DEFAULT COLLATE utf8mb4_0900_ai_ci;
SET default_storage_engine = INNODB;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = '+08:00';

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `user_profiles`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `receipts`;
DROP TABLE IF EXISTS `receipt_items`;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB;

CREATE TABLE `user_profiles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `id_number` varchar(255) NULL,
  `dob` varchar (255) NULL,
  `address` TEXT(255) NULL,
  `child_count` varchar(255) NULL,
  `phone` varchar(255) NULL,
  `job_title` varchar(255) NULL,
  `semester` varchar(255) NULL,
  `session` varchar(255) NULL,
  `department` varchar(255) NULL,
  `section` varchar(255) NULL,
  PRIMARY KEY(`id`),
  INDEX `USER_ID`(`user_id` ASC),
  CONSTRAINT `up_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `sessions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `ip_address` VARCHAR(255),
  PRIMARY KEY(`id`),
  INDEX `USER_ID`(`user_id` ASC),
  CONSTRAINT `ss_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `items` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  PRIMARY KEY(`id`)
) ENGINE=InnoDB;

CREATE TABLE `receipts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` INT UNSIGNED NOT NULL,
  `lecturer_id` INT UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `semester`varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NULL,
  `created_at` DATETIME NULL,
  `paid_at` DATETIME NULL,
  PRIMARY KEY(`id`),
  INDEX `STUDENT_ID`(`student_id` ASC),
  CONSTRAINT `rx_stud_id` FOREIGN KEY(`student_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  INDEX `LECTURER_ID`(`lecturer_id` ASC),
  CONSTRAINT `rx_lect_id` FOREIGN KEY(`lecturer_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `receipt_items` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_id` int UNSIGNED NOT NULL,
  `item_id` int UNSIGNED NOT NULL,
  PRIMARY KEY(`id`),
  INDEX `receipt_ID`(`receipt_id` ASC),
  CONSTRAINT `fk_receipt_id` FOREIGN KEY(`receipt_id`) REFERENCES `receipts`(`id`) ON DELETE CASCADE,
  INDEX `ITEM_ID`(`item_id` ASC),
  CONSTRAINT `fx_item_id` FOREIGN KEY(`item_id`) REFERENCES `items`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'a', 'a', 'admin'),
(2, 'juno', 'b', 'b', 'student');

INSERT INTO `user_profiles` (`id`, `user_id`, `id_number`, `dob`, `job_title`, `child_count`, `address`, `phone`, `semester`,`session`,`department`,`section`) VALUES
(1, 1, '999999999999', NULL, NULL, NULL, 'hq', '01444044404', NULL, NULL, NULL, NULL),
(2, 2, '010614010959', NULL, NULL, NULL, 'ukm', '0134065517', '6', '2029/2032', NULL, NULL);

INSERT INTO `items` (`id`, `category`, `name`, `amount`, `status`) VALUES
(1, 'fee', 'Bulanan', '5.00', 'active'),
(2, 'fee', 'Tahunan', '20.00', 'active');

COMMIT;

DELIMITER //

CREATE TRIGGER before_receipt_insert
BEFORE INSERT ON `receipts`
FOR EACH ROW
BEGIN
    
    IF NEW.reference_number IS NULL OR NEW.reference_number = NULL THEN
        
        SET @daily_count = (SELECT COUNT(*) + 1 FROM `receipts` 
            WHERE DATE(created_at) = CURDATE());
        SET NEW.reference_number = CONCAT('REC-', DATE_FORMAT(NOW(), '%Y%m%d'), '-', LPAD(@daily_count, 5, '0'));
    END IF;
    
    IF NEW.created_at IS NULL THEN
        SET NEW.created_at = NOW();
    END IF;
END//

DELIMITER ;