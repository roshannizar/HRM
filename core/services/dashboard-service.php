<?php
    include 'connection.php';

    function getEmployeeCount() {

        $conn = OpenCon();

        $query = "SELECT count(*) Employees";
        $result = $conn->query($query);

        CloseCon($conn);
    }

    function getAttendanceCount() {

        $conn = OpenCon();

        $query = "SELECT count(*) Attendance";
        $result = $conn->query($query);
        
        CloseCon($conn);
    }

    function getPayrollCount() {

        $conn = OpenCon();

        $query = "SELECT count(amount) Payroll WHERE ";
        $result = $conn->query($query);
        
        CloseCon($conn);
    }

    function getAbsentCount() {

        $conn = OpenCon();

        $query = "SELECT count(*) Attendance";
        $result = $conn->query($query);
        
        CloseCon($conn);
    }
?>