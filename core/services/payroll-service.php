<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllPayroll($conn) {
        $query = "SELECT * from payroll p
                INNER JOIN employee e on e.id=p.employeeid
                INNER JOIN project pj on p.projectid=pj.id";
        return $conn->query($query);
    }

    
    function getAuthAllPayroll($conn, $id) {
        $query = "SELECT * from payroll p
                INNER JOIN employee e on e.id=p.employeeid
                INNER JOIN project pj on p.projectid=pj.id
                INNER JOIN user u on u.email = e.userId
                WHERE e.userId='$id'";
        return $conn->query($query);
    }

    function getPayroll($conn, $id) {
        $query = "SELECT * FROM payroll p
                INNER JOIN employee e on e.id=p.employeeid
                INNER JOIN project pj on p.projectid=pj.id
                WHERE p.id ='$id'";
        return $conn->query($query);
    }

    function getEmployees($conn) {
        $query = "SELECT * FROM employee";
        return $conn->query($query);
    }

    function getProjects($conn) {
        $query = "SELECT * FROM project";
        return $conn->query($query);
    }

    if(isset($_POST['btnSavePayroll'])) {
        if($_POST['employeeId'] != 0 && $_POST["projectId"] != 0 && isset($_POST["basesalary"]) 
        && isset($_POST["allowance"])) {

            $employeeId = $_POST['employeeId'];
            $projectId = $_POST['projectId'];
            $baseSalary = $_POST['basesalary'];
            $allowance = $_POST['allowance'];

            $conn = OpenCon();

            $sql = "INSERT INTO payroll (employeeid, projectid, basesalary, allowance) VALUES('$employeeId', '$projectId', '$baseSalary', '$allowance')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Payroll created successfully!') 
                    window.location= '/hrm/pages/payroll/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                    window.location= '/hrm/pages/payroll/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/payroll/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdatePayroll'])) {
        if($_POST['employeeId'] != 0 && $_POST["projectId"] != 0 && isset($_POST["basesalary"]) 
        && isset($_POST["allowance"])) {
            
            session_start();
            $payrollId = $_SESSION['payrollUpdateId'];
            $employeeId = $_POST['employeeId'];
            $projectId = $_POST['projectId'];
            $baseSalary = $_POST['basesalary'];
            $allowance = $_POST['allowance'];


            $conn = OpenCon();

            $sql = "UPDATE payroll set employeeid = '$employeeId', projectid='$projectId', basesalary='$baseSalary', allowance='$allowance' WHERE id = '$payrollId'";

            if($conn->query($sql)) {
                unset($_SESSION['payrollUpdateId']);
                echo "<script type='text/javascript'> alert('Payroll updated successfully!') 
                window.location= '/hrm/pages/payroll/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while updating!') 
                window.location= '/hrm/pages/payroll/update.php' </script>";
            }
            CloseCon($conn);
        }
    } else if(isset($_POST['btnUpdateP'])) {
        $id = $_POST["updatepId"];
        session_start();
        $_SESSION['payrollUpdateId'] = $id;
        header('Location: /hrm/pages/payroll/update.php');
    }  else if(isset($_POST['btnDeletePayroll'])) {
        if(isset($_POST['deletepId'])) {
            $pid = $_POST['deletepId'];

            $conn = OpenCon();

            $sql = "DELETE FROM payroll WHERE id = '$pid'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Payroll deleted successfully!') 
                window.location= '/hrm/pages/payroll/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/payroll/' </script>";
            }
            CloseCon($conn);
        }
    }
?>