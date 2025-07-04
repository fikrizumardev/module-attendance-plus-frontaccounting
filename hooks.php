<?php

define('SS_ATTENDANCE_PLUS', 138<<8); 

class hooks_AttendancePlus extends hooks {

    function install_options($app) {
        global $path_to_root;

        // Cek apakah module HR tersedia
        if (!file_exists($path_to_root . "/modules/FrontHrm")) {
            display_error("FrontHRM Module is not installed. HR_Timesheet cannot function.");
            return;
        }

        if ($app->id == 'FrontHrm') {
            $app->add_rapp_function(0, _('Attendance Entry'),
                $path_to_root . '/modules/AttendancePlus/pages/attendance_plus_entry.php',
                'SA_HR_ATTENDANCE_PLUS', MENU_TRANSACTION);
        }
    }

    function install_access() {
        $security_sections[SS_ATTENDANCE_PLUS] = _('HR Attendance Plus');
        $security_areas['SA_HR_ATTENDANCE_PLUS'] = array(SS_ATTENDANCE_PLUS|1, _('Attendance Entry'));
        return array($security_areas, $security_sections);
    }

    function activate_extension($company, $check_only = true)
    {
        global $db_connections;

        if ($check_only)
            return true;

        $sqls = array(
            "CREATE TABLE IF NOT EXISTS 0_hr_attendance_plus (
                id INT(11) NOT NULL AUTO_INCREMENT,
                employee_id INT(11) NOT NULL,
                date DATE NOT NULL,
                time_in TIME DEFAULT NULL,
                time_out TIME DEFAULT NULL,
                worked_hours DECIMAL(5,2) DEFAULT NULL,
                note VARCHAR(255) DEFAULT NULL,
                PRIMARY KEY (id),
                KEY employee_id_idx (employee_id)
            )",

            "CREATE TABLE IF NOT EXISTS 0_hr_attendance_import_logs (
                id INT(11) NOT NULL AUTO_INCREMENT,
                imported_by INT(11),
                import_time DATETIME,
                total_rows INT,
                success_rows INT,
                failed_rows INT,
                log_detail TEXT,
                PRIMARY KEY (id)
            )"
        );

        foreach ($sqls as $sql) {
            db_query($sql, "Cannot create table for Timesheet module");
        }

        return true;
    }

}
