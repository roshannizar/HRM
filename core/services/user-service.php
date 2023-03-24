<?php
    include 'connection.php';
    $conn = OpenCon();
    
    function getAllUsers($conn) {
        $query = "SELECT * FROM user ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getAllFeatures($conn) {
        $query = "SELECT * FROM features ORDER BY 1 ASC";
        return $conn->query($query);
    }

    function getUser($conn, $id) {
        $query = "SELECT * FROM user u 
        left join userpermission up on u.email= up.userId 
        where u.email = '$id'";
        return $conn->query($query);
    }

    function getGender($gender) {
        if($gender == 0) {
            return 'Male';
        } else if($gender == 1) {
            return 'Female';
        } else {
            return 'N/A';
        }
    }


    if(isset($_POST["saveUser"])) {
        if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) 
            && isset($_POST["role"]) && isset($_POST["contactno"]) && isset($_POST["gender"])) {
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $email = $_POST["email"];
            $role = $_POST["role"];
            $contactNo = $_POST["contactno"];
            $gender = $_POST['gender'];
            $password = password_hash("default", PASSWORD_DEFAULT);
            $changed = 0;

            $dashboard = $_POST["dashboard"];
            $employee = $_POST["employee"];
            $cemployee = $_POST["cemployee"];
            $uemployee = $_POST['uemployee'];
            $demployee = $_POST['demployee'];
            $attendance = $_POST["attendance"];
            $cattendace = $_POST['cattendance'];
            $uattedance = $_POST['uattendance'];
            $dattendance = $_POST['dattendance'];
            $payroll = $_POST['payroll'];
            $cpayroll = $_POST['cpayroll'];
            $upayroll = $_POST['upayroll'];
            $dpayroll = $_POST['dpayroll'];
            $user = $_POST['user'];
            $cuser = $_POST['cuser'];
            $uuser = $_POST['uuser'];
            $duser = $_POST['duser'];
            $settings = $_POST['settings'];
            $project = $_POST['project'];
            $cproject = $_POST['cproject'];
            $uproject = $_POST['uproject'];
            $dproject = $_POST['dproject'];
            $department = $_POST['department'];
            $cdepartment = $_POST['cdepartment'];
            $udepartment = $_POST['udepartment'];
            $ddepartment = $_POST['ddepartment'];
            $position = $_POST['position'];
            $cposition = $_POST['cposition'];
            $uposition = $_POST['uposition'];
            $dposition = $_POST['dposition'];
            $timesheet = $_POST['timesheet'];
            $ctimesheet = $_POST['ctimesheet'];
            $utimesheet = $_POST['utimesheet'];
            $dtimesheet = $_POST['dtimesheet'];

            $conn = OpenCon();

            $sql = "INSERT INTO user (firstname, lastname, email, password, role, contactno, gender, changed) 
            VALUES ('$firstName', '$lastName', '$email', '$password', '$role', '$contactNo', '$gender', '$changed')";

            $sql_userpermission = "INSERT INTO userpermission 
            (userId, dashboard, employee, cemployee, uemployee, demployee, attendance, cattendance, uattendance, 
            dattendance, payroll, cpayroll, upayroll, dpayroll, user, cuser, uuser, duser, settings, project, 
            cproject, uproject, dproject, department, cdepartment, udepartment, ddepartment, position, cposition, 
            uposition, dposition, timesheet, ctimesheet, utimesheet, dtimesheet) 
            VALUES('$email', '$dashboard', '$employee', '$cemployee', '$uemployee', '$demployee', '$attendance', '$cattendace', 
            '$uattedance', '$dattendance', '$payroll', '$cpayroll', '$upayroll', '$dpayroll', '$user', '$cuser', '$uuser', 
            '$duser', '$settings', '$project', '$cproject', '$uproject', '$dproject', '$department', '$cdepartment', '$udepartment',
            '$ddepartment', '$position', '$cposition', '$uposition', '$dposition', '$timesheet', '$ctimesheet', '$utimesheet', '$dtimesheet')";
        
            if ($conn->query($sql) && $conn->query($sql_userpermission)) {
                echo "<script type='text/javascript'> alert('User created Successfully!') 
                    window.location= '/hrm/pages/users/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while saving!') 
                    window.location= '/hrm/pages/users/create.php' </script>";
            }
        } else {
            echo 'Validation Error';
        }
        CloseCon($conn);
    } else if(isset($_POST['btnDelete'])) {
        $id= $_POST["deleteUserId"];

        if($id != null) {

            $conn = OpenCon();
            $sqlDelete = "DELETE FROM userpermission WHERE userId= '$id'";
            $sql = "DELETE FROM user WHERE email='$id'";

            if($conn->query($sqlDelete) && $conn->query($sql)) {
                echo "<script type='text/javascript'> alert('User Deleted Successfully!') 
                    window.location= '/hrm/pages/users/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while deleting!') 
                    window.location= '/hrm/pages/users/' </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Something went wrong!') </script>";
        }
        CloseCon($conn);
    } else if(isset($_POST['btnUpdateData'])) {
        $id = $_POST["updateUserId"];
        session_start();
        $_SESSION['updateId'] = $id;
        header('Location: /hrm/pages/users/update.php');
    } else if(isset($_POST['btnUpdate'])) {
        session_start();
        if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_SESSION["updateId"]) 
        && isset($_POST["role"]) && isset($_POST["contactno"])) {

            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $email = $_SESSION["updateId"];
            $role = $_POST["role"];
            $contactNo = $_POST["contactno"];
            $gender = $_POST['gender'];

            $dashboard = $_POST["dashboard"];
            $employee = $_POST["employee"];
            $cemployee = $_POST["cemployee"];
            $uemployee = $_POST['uemployee'];
            $demployee = $_POST['demployee'];
            $attendance = $_POST["attendance"];
            $cattendace = $_POST['cattendance'];
            $uattedance = $_POST['uattendance'];
            $dattendance = $_POST['dattendance'];
            $payroll = $_POST['payroll'];
            $cpayroll = $_POST['cpayroll'];
            $upayroll = $_POST['upayroll'];
            $dpayroll = $_POST['dpayroll'];
            $user = $_POST['user'];
            $cuser = $_POST['cuser'];
            $uuser = $_POST['uuser'];
            $duser = $_POST['duser'];
            $settings = $_POST['settings'];
            $project = $_POST['project'];
            $cproject = $_POST['cproject'];
            $uproject = $_POST['uproject'];
            $dproject = $_POST['dproject'];
            $department = $_POST['department'];
            $cdepartment = $_POST['cdepartment'];
            $udepartment = $_POST['udepartment'];
            $ddepartment = $_POST['ddepartment'];
            $position = $_POST['position'];
            $cposition = $_POST['cposition'];
            $uposition = $_POST['uposition'];
            $dposition = $_POST['dposition'];
            $timesheet = $_POST['timesheet'];
            $ctimesheet = $_POST['ctimesheet'];
            $utimesheet = $_POST['utimesheet'];
            $dtimesheet = $_POST['dtimesheet'];

            $conn = OpenCon();
            $sql = "UPDATE user SET firstname='$firstName', lastname='$lastName', role='$role', 
            contactno='$contactNo', gender='$gender' WHERE email='$email'";
            
            $sql_permission = "UPDATE userpermission SET dashboard='$dashboard',employee='$employee',
            cemployee='$cemployee',uemployee='$uemployee',demployee='$demployee',attendance='$attendance',
            cattendance='$cattendace',uattendance='$uattedance',dattendance='$dattendance',payroll='$payroll',
            cpayroll='$cpayroll',upayroll='$upayroll',dpayroll='$dpayroll',user='$user',cuser='$cuser',
            uuser='$uuser',duser='$duser',settings='$settings', project='$project', cproject='$cproject', 
            uproject='$uproject', dproject = '$dproject', department='$department', cdepartment='$cdepartment',
            ddepartment='$ddepartment', udepartment='$udepartment', position='$position', cposition='$cposition',
            uposition='$uposition', dposition='$dposition', timesheet='$timesheet', ctimesheet='$ctimesheet',
            utimesheet='$utimesheet', dtimesheet='$dtimesheet' WHERE userId='$email'";
            
            if ($conn->query($sql) && $conn->query($sql_permission)) {
                unset($_SESSION['updateId']);
                echo "<script type='text/javascript'> alert('User updated Successfully!') 
                    window.location= '/hrm/pages/users/' </script>";
            } else {
                echo "<script type='text/javascript'> alert('Error occured while updating!') 
                    window.location= '/hrm/pages/users/update.php' </script>";
            }
            CloseCon($conn);
        } else {
            echo "<script type='text/javascript'> alert('Something went wrong, going back to home!') 
                    window.location= '/hrm/pages/dashboard/' </script>";
        }
    }
?>