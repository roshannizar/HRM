<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllPosition($conn) {
        $query = "SELECT * from positions";
        return $conn->query($query);
    }

    function getPosition($conn, $id) {
        $query = "SELECT * FROM positions WHERE id ='$id'";
        return $conn->query($query);
    }

    if(isset($_POST['btnSavePosition'])) {
        if(isset($_POST['pname'])) {
            $positionName = $_POST['pname'];

            $conn = OpenCon();

            $sql = "INSERT INTO positions (name) VALUES('$positionName')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Position created successfully!') 
                    window.location= '/hrm/pages/position/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                    window.location= '/hrm/pages/position/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/position/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdatePosition'])) {
        if(isset($_POST['pname']) && isset($_POST['pid'])) {
            $departmentName = $_POST['pname'];
            $did = $_POST['pid'];

            $conn = OpenCon();

            $sql = "UPDATE positions set name = '$departmentName' WHERE id = '$did'";

            if($conn->query($sql)) {
                unset($_SESSION['positionUpdateId']);
                echo "<script type='text/javascript'> alert('Position updated successfully!') 
                window.location= '/hrm/pages/position/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while updating!') 
                window.location= '/hrm/pages/position/update.php' </script>";
            }
            CloseCon($conn);
        }
    } else if(isset($_POST['btnUpdateP'])) {
        $id = $_POST["updatepId"];
        session_start();
        $_SESSION['positionUpdateId'] = $id;
        header('Location: /hrm/pages/position/update.php');
    }  else if(isset($_POST['btnDeletePosition'])) {
        if(isset($_POST['deletepId'])) {
            $did = $_POST['deletepId'];

            $conn = OpenCon();

            $sql = "DELETE FROM positions WHERE id = '$did'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Department deleted successfully!') 
                window.location= '/hrm/pages/position/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/position/' </script>";
            }
            CloseCon($conn);
        }
    }
?>