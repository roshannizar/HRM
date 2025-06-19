<?php
    include 'connection.php';
  
    if(isset($_POST["btnChangePassword"])) {
        session_start();

        $newPassword = $_POST["npassword"];
        $cNewPassword = $_POST["cnpassword"];
        $email = $_SESSION["userId"];

        if($newPassword == $cNewPassword) {
            $password = password_hash($newPassword, PASSWORD_DEFAULT);

            $conn = OpenCon();
            $sql = "UPDATE user SET password = '$password', changed = 1 WHERE email='rnizar@gmail.com'";

            if($conn->query($sql)) {
                $_SESSION['change'] = false;
                echo "<script type='text/javascript'> alert('Password changed successfully!') 
                    window.location= '/hrm/pages/settings/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while saving to the database!') 
                    window.location= '/hrm/pages/settings/' </script>";    
            }
        } else {
            echo "<script type='text/javascript'> alert('Password did not match!') 
                    window.location= '/hrm/pages/settings/' </script>";
        }
    }
?>