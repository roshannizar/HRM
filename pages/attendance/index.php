<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/attendance-service.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <link rel="stylesheet" href="../../assets/css/attendance.css" />
    <title>Attendance</title>
</head>

<body>
    <div class="row max-width">
        <div class="col-md-2 side-content">
            <img src="../../assets/images/hrm.png" width="50px" />
            <label>HRM</label>
            <br />
            <div class="break-line"></div>

            <!-- Router Buttons and Permission -->
            <div class="button-section">
                <?php getSideNav("attendance"); ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Attendance</label>
                <div class="dropdown">
                    <button class="dropbtn" onclick="showDropDown()">
                        Welcome <?php echo getUserName();?> &nbsp
                        <span class="fa fa-user" onclick="showDropDown()"></span> &nbsp Profile
                    </button>
                    <div class="dropdown-content" id="myDropdown">
                        <label><?php echo getUserName();?></label>
                        <label><?php echo getRole($_SESSION["role"]);?></label>
                        <form method="POST" action="../../core/services/logout-service.php">
                            <input type="submit" value="Logout" class="btn-logout" name="logout">
                        </form>
                    </div>
                </div>
            </nav>

            <!-- page -->
            <div class="column maintain-paddings">
                <div class="card main-card">
                    <div class="row more-top-margin">
                        <div class="col-md-7">
                            <h4>View Attendance</h4>
                        </div>
                        <div class="col-md-5">
                            <a href="./external" class="btn btn-primary btn-small">Create Attendance</a>
                        </div>
                    </div>
                </div>

                <div class="slight-top-margin">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Log Type</th>
                                <th>Date Time Log</th>
                                <th>Date Updated</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getAllAttendance($conn);
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row["employeeno"];?></td>
                                <td><?php echo $row["firstname"].' '.$row['lastname'];?></td>
                                <td><?php echo getLogType($row["logtype"]);?></td>
                                <td><?php echo $row["datetimelog"];?></td>
                                <td><?php echo $row["dateupdatedlog"];?></td>
                                <td><?php echo getDateDifference($row["datetimelog"], $row["dateupdatedlog"]); ?></td>
                            </tr>
                            <?php
                                }
                                CloseCon($conn);
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>

    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>