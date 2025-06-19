<?php
    include 'connection.php';

    $conn = OpenCon();

    function getUsers($conn) {
        $query = "SELECT email, firstname, lastname from user ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getProjects($conn) {
        $query = "SELECT * from project ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getDepartment($conn) {
        $query = "SELECT * from department ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getPosition($conn) {
        $query = "SELECT * from positions ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getAllEmployees($conn) {
        $query = "SELECT e.id, e.userId, e.employeeno, e.firstname, e.middlename, e.lastname, e.hourlyRate, e.baseSalary, 
        d.name as 'departmentName', p.name as 'positionName', pr.name as 'projectName' 
        from employee e 
        LEFT JOIN department d on e.departmentId = d.id 
        LEFT JOIN positions p on e.positionId = p.id 
        LEFT JOIN project pr on e.projectId = pr.id;";
        return $conn->query($query);
    }

    function getAuthAllEmployees($conn, $id) {
        $query = "SELECT e.id, e.userId, e.employeeno, e.firstname, e.middlename, e.lastname, e.hourlyRate, e.baseSalary,d.name as 'departmentName', p.name as 'positionName', pr.name as 'projectName' 
        from employee e 
        LEFT JOIN department d on e.departmentId = d.id 
        LEFT JOIN positions p on e.positionId = p.id 
        LEFT JOIN project pr on e.projectId = pr.id
        WHERE e.userId ='$id'";
        return $conn->query($query);
    }

    function getEmployee($conn, $id) {
        $query = "SELECT e.id, e.userId, e.employeeno, e.firstname, e.middlename, e.lastname, e.hourlyRate, e.baseSalary, 
        e.departmentId, e.projectId, e.positionId
        from employee e 
        LEFT JOIN department d on e.departmentId = d.id 
        LEFT JOIN positions p on e.positionId = p.id 
        LEFT JOIN project pr on e.projectId = pr.id
        WHERE e.id ='$id'";
        return $conn->query($query);
    }

    if(isset($_POST["btnSaveEmployee"])) {
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['userId']) 
        && $_POST['department'] != 0  && $_POST['position'] != 0 && $_POST['project'] != 0 && isset($_POST['baseSalary']) 
        && isset($_POST['hrate'])) {

            $userId = $_POST['userId'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $mname = $_POST['middlename'];
            $departmentId = $_POST['department'];
            $positionId = $_POST['position'];
            $projectId = $_POST['project'];
            $baseSalary = $_POST['baseSalary'];
            $hrate = $_POST['hrate'];
            $employeeNo = "E".date("Y"). "-".date("m").rand(01,99);

            $conn = OpenCon();

            $sql = "INSERT INTO employee (userId, employeeno, firstname, lastname, middlename, departmentId, positionId, projectId, baseSalary, hourlyRate)
            VALUES ('$userId', '$employeeNo', '$fname', '$lname', '$mname', '$departmentId', '$positionId', '$projectId', '$baseSalary', '$hrate')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Employee Created Successfully!') 
                window.location= '/hrm/pages/employee/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                window.location= '/hrm/pages/employee/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/employee/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdateEmployee'])) {
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['userId']) 
        && $_POST['department'] != 0  && $_POST['position'] != 0 && $_POST['project'] != 0 && isset($_POST['baseSalary']) 
        && isset($_POST['hrate'])) {
            session_start();
            $employeeId = $_SESSION['employeeUpdateId'];
            $userId = $_POST['userId'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $mname = $_POST['middlename'];
            $departmentId = $_POST['department'];
            $positionId = $_POST['position'];
            $projectId = $_POST['project'];
            $baseSalary = $_POST['baseSalary'];
            $hrate = $_POST['hrate'];

            $conn = OpenCon();

            $sql = "UPDATE employee SET userId='$userId', firstname='$fname', lastname='$lname', middlename='$mname', departmentId='$departmentId',
            positionId='$positionId', projectId='$projectId', hourlyRate='$hrate', baseSalary='$baseSalary' WHERE id='$employeeId'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Employee Update Successfully!') 
                    window.location= '/hrm/pages/employee/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while updating!') 
                    window.location= '/hrm/pages/employee/update.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/employee/update.php' </script>";
        }
    } else if(isset($_POST['btnUpdateE'])) {
        $id = $_POST["updateeId"];
        session_start();
        $_SESSION['employeeUpdateId'] = $id;
        header('Location: /hrm/pages/employee/update.php');
    } else if(isset($_POST['btnDeleteEmployee'])) {
        if(isset($_POST['deleteeId'])) {
            $eid = $_POST['deleteeId'];

            $conn = OpenCon();

            $sql = "DELETE FROM employee WHERE id = '$eid'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Employee deleted successfully!') 
                window.location= '/hrm/pages/employee/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/employee/' </script>";
            }
            CloseCon($conn);
        }
    }
?>