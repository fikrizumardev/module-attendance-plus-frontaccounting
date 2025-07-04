CREATE TABLE IF NOT EXISTS `0_hr_attendance_plus` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `employee_id` INT(11) NOT NULL,
    `date` DATE NOT NULL,
    `time_in` TIME DEFAULT NULL,
    `time_out` TIME DEFAULT NULL,
    `worked_hours` DECIMAL(5,2) DEFAULT NULL,
    `note` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `employee_id_idx` (`employee_id`)
);

CREATE TABLE IF NOT EXISTS `0_hr_attendance_import_logs` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `imported_by` INT(11),
    `import_time` DATETIME,
    `total_rows` INT,
    `success_rows` INT,
    `failed_rows` INT,
    `log_detail` TEXT,
    PRIMARY KEY (`id`)
);