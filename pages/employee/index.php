<?php
    require '../../core/services/common-service.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/employee-service.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <link rel="stylesheet" href="../../assets/css/users.css" />
    <title>Employee</title>
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
                <?php
                    if($_SESSION["dashboard"] == 1) {
                        echo '<a href="../dashboard" class="controls btn">
                            <span class="fa fa-home"></span> &nbsp Dashboard
                        </a>';
                    }

                    if($_SESSION["employee"] == 1) {

                        echo '<a href="../employee" class="controls btn btn-primary">
                            <span class="fa fa-users"></span> &nbsp Employee
                        </a>';
                    }

                    if($_SESSION["attendance"] == 1) {
                        echo '<a href="../attendance" class="controls btn">
                            <span class="fa fa-clock"></span> &nbsp Attendance
                        </a>';
                    }

                    if($_SESSION["payroll"] == 1) {
                        echo '<a href="../payroll" class="controls btn">
                                <span class="fa fa-credit-card"></span> &nbsp Payroll
                        </a>';
                    }

                    if($_SESSION["user"] == 1) {
                        echo '<a href="../users" class="controls btn">
                            <span class="fa fa-user-plus"></span> &nbsp Users
                        </a>';
                    }

                    if($_SESSION["settings"] == 1) {
                        echo '<a href="../settings" class="controls btn">
                            <span class="fa fa-cog"></span> &nbsp Settings
                        </a>';
                    }
                ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Employee</label>
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
                        <div class="col-md-8">
                            <h4>View Employee</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-primary btn-small">Create Employee</a>
                        </div>
                    </div>
                </div>

                <div class="slight-top-margin">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Department</th>
                                <th>Project</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getAllEmployees($conn);
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td id="<?php echo $row["id"];?>"><?php echo $row["id"];?></td>
                                <td><?php echo $row["firstname"];?></td>
                                <td><?php echo $row["lastname"];?></td>
                                <td><?php echo $row["lastname"];?></td>
                                <td><?php echo $row["departmentId"];?></td>
                                <td><?php echo $row["projectId"];?></td>
                                <td><?php echo $row["positionId"];?></td>
                                <td>
                                    <div class="row center">
                                        <form method="POST" action="../../core/services/user-services.php">
                                            <input type="button" data-toggle="modal" data-target="#deleteModal"
                                                class="btn-small btn-r btn-d" name="btnDelete"
                                                onclick="deleteUser(<?php echo 'name'.$count;?>)" value="Delete" />
                                            <input type="button" data-toggle="modal" data-target="#updateModal"
                                                class="btn-small btn-r btn-u" name="btnUpdate"
                                                onclick="updateUser(<?php echo 'name'.$count;?>)" value="Update" />
                                        </form>
                                    </div>
                                </td>
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