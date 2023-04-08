<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllProject($conn) {
        $query = "SELECT * from project";
        return $conn->query($query);
    }

    function getProject($conn, $id) {
        $query = "SELECT * FROM project WHERE id ='$id'";
        return $conn->query($query);
    }

    if(isset($_POST['btnSaveProject'])) {
        if(isset($_POST['prname'])) {
            $projectName = $_POST['prname'];

            $conn = OpenCon();

            $sql = "INSERT INTO project (name) VALUES('$projectName')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Project created successfully!') 
                    window.location= '/hrm/pages/project/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                    window.location= '/hrm/pages/project/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/project/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdateProject'])) {
        if(isset($_POST['prname']) && isset($_POST['prid'])) {

            session_start();
            $prid = $_SESSION['projectUpdateId'];
            $projectName = $_POST['prname'];

            $conn = OpenCon();

            $sql = "UPDATE project set name = '$projectName' WHERE id = '$prid'";

            if($conn->query($sql)) {
                unset($_SESSION['projectUpdateId']);
                echo "<script type='text/javascript'> alert('Project updated successfully!') 
                window.location= '/hrm/pages/project/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while updating!') 
                window.location= '/hrm/pages/project/update.php' </script>";
            }
            CloseCon($conn);
        }
    } else if(isset($_POST['btnUpdatePR'])) {
        $id = $_POST["updateprId"];
        session_start();
        $_SESSION['projectUpdateId'] = $id;
        header('Location: /hrm/pages/project/update.php');
    }  else if(isset($_POST['btnDeleteProject'])) {
        if(isset($_POST['deleteprId'])) {
            $did = $_POST['deleteprId'];

            $conn = OpenCon();

            $sql = "DELETE FROM project WHERE id = '$did'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Project deleted successfully!') 
                window.location= '/hrm/pages/project/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/project/' </script>";
            }
            CloseCon($conn);
        }
    }
?>