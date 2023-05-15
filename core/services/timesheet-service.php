<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllTimesheet($conn) {
        $query = "SELECT ti.id, ti.employeeId, ti.taskId, ti.projectId, ti.description, ti.hours, p.name as projectName, t.name as taskName, e.employeeNo
            from timesheet ti
            LEFT JOIN project p on p.id = ti.projectId
            LEFT JOIN task t on t.id = ti.taskId
            LEFT JOIN employee e on e.id = ti.employeeId";
        return $conn->query($query);
    }

    function getTimesheet($conn, $id) {
        $query = "SELECT ti.id, ti.employeeId, ti.taskId, ti.projectId, ti.description, ti.hours, p.name as projectName, t.name as taskName, e.employeeNo
            from timesheet ti
            LEFT JOIN project p on p.id = ti.projectId
            LEFT JOIN task t on t.id = ti.taskId
            LEFT JOIN employee e on e.id = ti.employeeId
            WHERE ti.id = '$id'";
        return $conn->query($query);
    }

    function getProject($conn) {
        $user = getUserId();
        $query = "SELECT p.id, p.name from project p
            INNER JOIN employee e on e.projectId = p.id
            WHERE e.userId = '$user' ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getTask($conn) {
        $query = "SELECT * from task ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getemployee($conn) {
        $user = getUserId();
        $query = "SELECT * from employee WHERE userId = '$user' ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getUserId() {
        return $_SESSION['userId'];
    }


    if(isset($_POST['btnSaveTimesheet'])) {
        if(isset($_POST['projectId']) && isset($_POST['taskId']) && isset($_POST['description']) && isset($_POST['hours'])) {
            $empId = $_POST['empId'];
            $projectId = $_POST['projectId'];
            $taskId = $_POST['taskId'];
            $description = $_POST['description'];
            $hour = $_POST['hours'];

            $conn = OpenCon();

            $sql = "INSERT INTO timesheet (employeeId, projectId, taskId, description, hours) VALUES('$empId', '$projectId', '$taskId', '$description', '$hour')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Timesheet created successfully!') 
                    window.location= '/hrm/pages/timesheet/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                    window.location= '/hrm/pages/timesheet/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/timesheet/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdateTimesheet'])) {
        if(isset($_POST['projectId']) && isset($_POST['taskId']) && isset($_POST['description']) && isset($_POST['hours'])) {

            session_start();
            $tiid = $_SESSION['timesheetUpdateId'];
            $projectId = $_POST['projectId'];
            $taskId = $_POST['taskId'];
            $description = $_POST['description'];
            $hour = $_POST['hours'];

            $conn = OpenCon();

            $sql = "UPDATE timesheet set projectId = '$projectId', taskId = '$taskId', description = '$description', hours = '$hour' WHERE id = '$tiid'";

            if($conn->query($sql)) {
                unset($_SESSION['timesheetUpdateId']);
                echo "<script type='text/javascript'> alert('Timesheet updated successfully!') 
                window.location= '/hrm/pages/timesheet/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while updating!') 
                window.location= '/hrm/pages/timesheet/update.php' </script>";
            }
            CloseCon($conn);
        }
    } else if(isset($_POST['btnUpdateTi'])) {
        $id = $_POST["updatetiId"];
        session_start();
        $_SESSION['timesheetUpdateId'] = $id;
        header('Location: /hrm/pages/timesheet/update.php');
    }  else if(isset($_POST['btnDeleteTimesheet'])) {
        if(isset($_POST['deletetiId'])) {
            $tiid = $_POST['deletetiId'];

            $conn = OpenCon();

            $sql = "DELETE FROM timesheet WHERE id = '$tiid'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Timesheet deleted successfully!') 
                window.location= '/hrm/pages/timesheet/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/timesheet/' </script>";
            }
            CloseCon($conn);
        }
    }
?>