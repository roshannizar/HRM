<?php
    include 'connection.php';

    $conn = OpenCon();

    function getLogType($num) {
        if($num == 1) {
            return "AM";
        } else if($num == 2) {
            return "PM";
        } else {
            return 'N/A';
        }
    }

    function getLogTypeNum($log) {
        if($log == "AM") {
            return 1;
        } else if($log == "PM") {
            return 2;
        } else {
            return 'N/A';
        }
    }

    function getAllAttendance($conn) {
        $query = "SELECT * FROM attendance a
        LEFT JOIN employee e on a.employee_id = e.id 
        order by 1 desc";
        return $conn->query($query);
    }

    if(isset($_POST['btnSaveAttendance'])) {
        if(isset($_POST['eno'])) {

            try 
            {
                $id = $_POST['eno'];
                $conn = OpenCon();

                $sql = "SELECT * FROM attendance a
                INNER JOIN employee e on a.employee_id = e.id
                WHERE e.employeeno='$id' AND a.datetime_log >= cast(now() as date)";

                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        $eId = $row['id'];
                        $dateLog = date_create($row["datetime_log"]);
                        $duration = date_diff($dateLog, new DateTime());
                        $duration = $duration->format('%H:%m:%s');
                        
                        $sqlUpdate = "UPDATE attendance SET date_updated=default, duration='$duration' WHERE id='$eId'";

                        if($conn->query($sqlUpdate)) {
                            echo "<script type='text/javascript'> alert('Attendance Submitted Successfully!') 
                                window.location= '/hrm/pages/attendance/' </script>";
                        } else {
                            echo "<script type='text/javascript'> alert('Error occured while submitting!') 
                                window.location= '/hrm/pages/attendance/external' </script>";
                        }
                        CloseCon($conn);
                    }
                } else {
                    
                    $sqlInsertSelect = "SELECT * FROM employee WHERE employeeno='$id'"; 
                    $resultInsert = $conn->query($sqlInsertSelect);

                    if($resultInsert->num_rows > 0) {
                        while($row = mysqli_fetch_assoc($resultInsert)) {

                            $eId = $row["id"];
                            $date = date("Y/m/d H:i:s");
                            $amorpm = date('A', strtotime($date));
                            $hourFormat = getLogTypeNum($amorpm);

                            $sqlInsert = "INSERT INTO attendance (employee_id, log_type, datetime_log) VALUES($eId, $hourFormat, default)";

                            if($conn->query($sqlInsert)) {
                                echo "<script type='text/javascript'> alert('Attendance Submitted Successfully!') 
                                    window.location= '/hrm/pages/attendance/' </script>";
                            } else {
                                echo "<script type='text/javascript'> alert('Error occured while submitting!') 
                                   window.location= '/hrm/pages/attendance/external' </script>";
                            }
                            CloseCon($conn);
                        }
                    }

                }
            } catch(Exception $e) {
                echo $e;
            }
        } else {
            echo 'Out of range';
        }
    }
?>