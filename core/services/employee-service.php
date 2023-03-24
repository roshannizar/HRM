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
        $query = "SELECT e.id, e.userId, e.firstname, e.middlename, e.lastname, e.hourlyRate, e.baseSalary, 
        d.name as 'departmentName', p.name as 'positionName', pr.name as 'projectName' 
        from employee e 
        LEFT JOIN department d on e.departmentId = d.id 
        LEFT JOIN positions p on e.positionId = p.id 
        LEFT JOIN project pr on e.projectId = pr.id;";
        return $conn->query($query);
    }

    if(isset($_POST["btnSaveEmployee"])) {
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['userId']) 
        && $_POST['department'] != 0  && $_POST['position'] != 0 && $_POST['project'] == 0 && isset($_POST['baseSalary']) 
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

            $conn = OpenCon();

            $sql = "INSERT INTO employee (userId, firstname, lastname, middlename, departmentId, positionId, projectId, baseSalary, hourlyRate)
            VALUES ('$userId', '$fname', '$lname', '$mname', '$departmentId', '$positionId', '$projectId', '$baseSalary', '$hrate')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Employee Created Successfully!') 
                window.location= '/hrm/pages/employee/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                window.location= '/hrm/pages/employee/create.php' </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/employee/create.php' </script>";
        }
    }
?>