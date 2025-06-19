<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllTasks($conn) {
        $query = "SELECT * from task";
        return $conn->query($query);
    }

    function getTask($conn, $id) {
        $query = "SELECT * FROM task WHERE id ='$id'";
        return $conn->query($query);
    }

    if(isset($_POST['btnSaveTask'])) {
        if(isset($_POST['tname'])) {
            $taskName = $_POST['tname'];

            $conn = OpenCon();

            $sql = "INSERT INTO task (name) VALUES('$taskName')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Task created successfully!') 
                    window.location= '/hrm/pages/task/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                    window.location= '/hrm/pages/task/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/task/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdateTask'])) {
        if(isset($_POST['tname'])) {
            session_start();
            $pid = $_SESSION['taskUpdateId'];
            $taskName = $_POST['tname'];

            $conn = OpenCon();

            $sql = "UPDATE task set name = '$taskName' WHERE id = '$tid'";

            if($conn->query($sql)) {
                unset($_SESSION['taskUpdateId']);
                echo "<script type='text/javascript'> alert('Task updated successfully!') 
                window.location= '/hrm/pages/task/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while updating!') 
                window.location= '/hrm/pages/task/update.php' </script>";
            }
            CloseCon($conn);
        }
    } else if(isset($_POST['btnUpdateT'])) {
        $id = $_POST["updatetId"];
        session_start();
        $_SESSION['taskUpdateId'] = $id;
        header('Location: /hrm/pages/task/update.php');
    }  else if(isset($_POST['btnDeleteTask'])) {
        if(isset($_POST['deletetId'])) {
            $tid = $_POST['deletetId'];

            $conn = OpenCon();

            $sql = "DELETE FROM task WHERE id = '$tid'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Project deleted successfully!') 
                window.location= '/hrm/pages/task/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/task/' </script>";
            }
            CloseCon($conn);
        }
    }
?>