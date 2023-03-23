<?php
    include 'connection.php';

    $conn = OpenCon();
    session_start();

    // get the login credentials from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // query the database for the user with the given username and password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM user WHERE email = '$username'";
    $query_userpermission = "SELECT * FROM userpermission WHERE userId = '$username'";

    $result = $conn->query($query);
    // if a matching user is found, create a session and redirect to the dashboard
    if($row = mysqli_fetch_assoc($result)) {
        $db_password = $row['password'];
        if(password_verify($password, $db_password)) {
            $_SESSION['userId'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['fullname'] = $row['firstname'] . " " . $row['lastname'];
            if($row['changed'] == '0') {
                $_SESSION['change'] = true;
            } else {
                $_SESSION['change'] = false;
            }
            
            $result_permission = $conn->query($query_userpermission);
            while($permission = mysqli_fetch_assoc($result_permission)) {
                
                $_SESSION['dashboard'] = $permission['dashboard'];

                $_SESSION['employee'] = $permission['employee'];
                $_SESSION['cemployee'] = $permission['cemployee'];
                $_SESSION['uemployee'] = $permission['uemployee'];
                $_SESSION['demployee'] = $permission['demployee'];

                $_SESSION['attendance'] = $permission['attendance'];
                $_SESSION['cattendance'] = $permission['cattendance'];
                $_SESSION['uattendance'] = $permission['uattendance'];
                $_SESSION['dattendance'] = $permission['dattendance'];

                $_SESSION['payroll'] = $permission['payroll'];
                $_SESSION['cpayroll'] = $permission['cpayroll'];
                $_SESSION['upayroll'] = $permission['upayroll'];
                $_SESSION['dpayroll'] = $permission['dpayroll'];

                $_SESSION['user'] = $permission['user'];
                $_SESSION['cuser'] = $permission['cuser'];
                $_SESSION['uuser'] = $permission['uuser'];
                $_SESSION['duser'] = $permission['duser'];

                $_SESSION['settings'] = $permission['settings'];
            }
            header('Location: /hrm/pages/dashboard');
        } else {
            echo "<script type='text/javascript'> alert('Invalid Credentials..') 
            window.location= '/hrm/pages/authentication' </script>";

            CloseCon($conn);
        }
    } else {
        // if the login is unsuccessful, show an error message
        echo "<script type='text/javascript'> alert('Invalid Credentials..') 
            window.location= '/hrm/pages/authentication' </script>";

        CloseCon($conn);
    }
?>