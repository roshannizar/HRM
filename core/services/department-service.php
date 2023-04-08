<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllDepartments($conn) {
        $query = "SELECT * from Department";
        return $conn->query($query);
    }

    function getDepartment($conn, $id) {
        $query = "SELECT * FROM department WHERE id ='$id'";
        return $conn->query($query);
    }

    if(isset($_POST['btnSaveDepartment'])) {
        if(isset($_POST['dname'])) {
            $departmentName = $_POST['dname'];

            $conn = OpenCon();

            $sql = "INSERT INTO department (name) VALUES('$departmentName')";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Department created successfully!') 
                    window.location= '/hrm/pages/department/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while creating!') 
                    window.location= '/hrm/pages/department/create.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Field is empty!') 
                    window.location= '/hrm/pages/department/create.php' </script>";
        }
    } else if(isset($_POST['btnUpdateDepartment'])) {
        if(isset($_POST['dname']) && isset($_POST['did'])) {
            
            session_start();
            $did = $_SESSION['departmentUpdateId'];
            $departmentName = $_POST['dname'];

            $conn = OpenCon();

            $sql = "UPDATE department set name = '$departmentName' WHERE id = '$did'";

            if($conn->query($sql)) {
                unset($_SESSION['departmentUpdateId']);
                echo "<script type='text/javascript'> alert('Department updated successfully!') 
                window.location= '/hrm/pages/department/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while updating!') 
                window.location= '/hrm/pages/department/update.php' </script>";
            }
            CloseCon($conn);
        }
    } else if(isset($_POST['btnUpdateD'])) {
        $id = $_POST["updatedId"];
        session_start();
        $_SESSION['departmentUpdateId'] = $id;
        header('Location: /hrm/pages/department/update.php');
    }  else if(isset($_POST['btnDeleteDepartment'])) {
        if(isset($_POST['deletedId'])) {
            $did = $_POST['deletedId'];

            $conn = OpenCon();

            $sql = "DELETE FROM department WHERE id = '$did'";

            if($conn->query($sql)) {
                echo "<script type='text/javascript'> alert('Department deleted successfully!') 
                window.location= '/hrm/pages/department/' </script>";
            } else {
            echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                window.location= '/hrm/pages/department/' </script>";
            }
            CloseCon($conn);
        }
    }
?>