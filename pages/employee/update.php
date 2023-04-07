<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/employee-service.php';
    require '../../core/services/user-permission.php';
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
    <link rel="stylesheet" href="../../assets/css/employee.css" />
    <title>Employee | Update</title>
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
                <?php echo getSideNav("employee"); ?>
            </div>
        </div>
        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Employee / Update</label>
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
                            <h4>Update Employee</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="./" class="btn btn-primary btn-small">View Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="create-form">

                        <form method="POST" action="../../core/services/employee-service.php">
                            <?php
                                $id = $_SESSION['employeeUpdateId'];
                                $result = getEmployee($conn, $id);

                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="row extra-row">
                            <div class="col-md-4">
                                    <label for="employeeNoInput">Employee No</label>
                                    <input type="text" class="form-control" disabled required id="employeeNoInput"
                                        placeholder="Employee No" value="<?php echo $row["employeeno"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="fnameInput">First Name</label>
                                    <input type="text" name="firstname" class="form-control" required id="fnameInput"
                                        placeholder="John" value="<?php echo $row["firstname"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="nnameInput">Middle Name</label>
                                    <input type="text" class="form-control" name="middlename" required id="mnameInput"
                                        placeholder="Rack" value="<?php echo $row["middlename"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="lnameInput">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" required id="lnameInput"
                                        placeholder="Doe" value="<?php echo $row["lastname"];?>">
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="userSelect">User</label>
                                    <select class="form-control" id="userSelect" name="userId">
                                    <?php
                                            $result_user = getUsers($conn);
                                            while($row_user = mysqli_fetch_assoc($result_user)) {
                                        ?>
                                        <option <?php if($row["userId"] == $row_user['email']) echo 'selected=selected' ?>
                                         value="<?php echo $row_user['email'] ?>"><?php echo $row_user['email'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="departmentSelect">Department</label>
                                    <select class="form-control" id="departmentSelect" name="department">
                                    <?php
                                            $result_department = getDepartment($conn);
                                            while($row_department = mysqli_fetch_assoc($result_department)) {
                                        ?>
                                        <option <?php if($row["departmentId"] == $row_department['id']) echo 'selected=selected' ?>
                                         value="<?php echo $row_department['id'] ?>"><?php echo $row_department['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="positionSelect">Poistion</label>
                                    <select class="form-control" id="positionSelect" name="position">
                                    <?php
                                            $result_position = getPosition($conn);
                                            while($row_position = mysqli_fetch_assoc($result_position)) {
                                        ?>
                                        <option <?php if($row["positionId"] == $row_position['id'])  echo 'selected=selected' ?>
                                         value="<?php echo $row_position['id'] ?>"><?php echo $row_position['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="projectSelect">Project</label>
                                    <select class="form-control" id="projectSelect" name="project">
                                    <?php
                                            $result_project = getProjects($conn);
                                            while($row_project = mysqli_fetch_assoc($result_project)) {
                                        ?>
                                        <option <?php if($row["projectId"] == $row_project['id'])  echo 'selected=selected' ?>
                                         value="<?php echo $row_project['id'] ?>"><?php echo $row_project['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="hrateInput">Hourly Rate</label>
                                    <input type="number" class="form-control" name="hrate" required id="hrateInput"
                                        placeholder="500" value="<?php echo $row["hourlyRate"];?>">
                                </div>

                                <div class="col-md-4">
                                    <label for="baseSalaryInput">Base Salary</label>
                                    <input type="number" class="form-control" name="baseSalary" required id="baseSalaryInput"
                                        placeholder="500" value="<?php echo $row["baseSalary"];?>">
                                </div>

                                <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-success" value="Update" name="btnUpdateEmployee">
                                </div>
                                <div class="col-md-2 top-margin">
                                    <a href="./update.php" class="btn btn-danger">Reset</a>
                                </div>
                                <?php
                                    }
                                    CloseCon($conn);
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>