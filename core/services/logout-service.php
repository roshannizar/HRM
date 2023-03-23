<?php
    if(isset($_POST['logout'])) {
        session_start();
        session_unset();
        session_destroy();
        // unset($_SESSION['userId']);
        // unset($_SESSION['fullname']);
        // unset($_SESSION['role']);
        // unset($_SESSION['change']);

        // unset($_SESSION['dashboard']);

        // unset($_SESSION['employee']);
        // unset($_SESSION['cemployee']);
        // unset($_SESSION['uemployee']);
        // unset($_SESSION['demployee']);

        // unset($_SESSION['attendance']);
        // unset($_SESSION['cattendance']);
        // unset($_SESSION['uattendance']);
        // unset($_SESSION['dattendance']);

        // unset($_SESSION['payroll']);
        // unset($_SESSION['cpayroll']);
        // unset($_SESSION['upayroll']);
        // unset($_SESSION['dpayroll']);

        // unset($_SESSION['user']);
        // unset($_SESSION['cuser']);
        // unset($_SESSION['uuser']);
        // unset($_SESSION['duser']);

        header('Location: ../../pages/authentication');
        exit();
    }
?>