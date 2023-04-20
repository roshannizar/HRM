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

    function getDateDifference($dateTo, $dateFrom) {
        $date1=date_create($dateTo);
        $date2=date_create($dateFrom);
        $diff=date_diff($date1,$date2);
        return $diff->format("%H:%i:%s");
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
        LEFT JOIN employee e on a.employeeId = e.id 
        order by 1 desc";
        return $conn->query($query);
    }

    if(isset($_POST['btnSaveAttendance'])) {
        if(isset($_POST['eno'])) {

            try 
            {
                $id = $_POST['eno'];
                $conn = OpenCon();

                $sql = "SELECT a.id as aid FROM attendance a
                INNER JOIN employee e on a.employeeId = e.id
                WHERE e.employeeno='$id' AND a.datetimelog >= cast(now() as date)";

                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        $aId = $row['aid'];
                        $sqlUpdate = "UPDATE attendance SET dateupdatedlog=now() WHERE id='$aId'";
                        

                        if($conn->query($sqlUpdate)) {
                            echo "<script type='text/javascript'> alert('Attendance Updated Successfully!') 
                                window.location= '/hrm/pages/attendance/' </script>";
                        } else {
                            echo "<script type='text/javascript'> alert('Error occured while updating!') 
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

                            $sqlInsert = "INSERT INTO attendance (employeeId, logtype, datetimelog) VALUES($eId, $hourFormat, default)";

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