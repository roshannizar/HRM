<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/employee-service.php';
    //require '../../core/services/user-permission.php';
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
    <title>Employee | Create</title>
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
                <label class="navbar-brand">Employee / Create</label>
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
                            <h4>Create Employee</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="./" class="btn btn-primary btn-small">View Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="create-form">
                        <form method="POST" action="../../core/services/employee-service.php">
                            <div class="row extra-row">
                                <div class="col-md-4">
                                    <label for="fnameInput">First Name</label>
                                    <input type="text" name="firstname" class="form-control" required id="fnameInput"
                                        placeholder="John">
                                </div>
                                <div class="col-md-4">
                                    <label for="mnameInput">Middle Name</label>
                                    <input type="text" class="form-control" name="middlename" id="mnameInput"
                                        placeholder="Rack">
                                </div>
                                <div class="col-md-4">
                                    <label for="lnameInput">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" required id="lnameInput"
                                        placeholder="Doe">
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="userSelect">User</label>
                                    <select class="form-control" id="userSelect" name="userId">
                                    <option value="0">-- Please Select --</option>
                                    <?php
                                            $result = getUsers($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="departmentSelect">Department</label>
                                    <select class="form-control" id="departmentSelect" name="department">
                                    <option value="0">-- Please Select --</option>
                                    <?php
                                            $result = getDepartment($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="positionSelect">Position</label>
                                    <select class="form-control" id="positionSelect" name="position">
                                    <option value="0">-- Please Select --</option>
                                    <?php
                                            $result = getPosition($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="projectSelect">Project</label>
                                    <select class="form-control" id="projectSelect" name="project">
                                    <option value="0">-- Please Select --</option>
                                    <?php
                                            $result = getProjects($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                            CloseCon($conn);
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="hrate">Hourly Rate</label>
                                    <input type="number" class="form-control" name="hrate" required id="hrate"
                                        placeholder="500">
                                </div>

                                <div class="col-md-4">
                                    <label for="baseSalary">Base Salary</label>
                                    <input type="number" class="form-control" name="baseSalary" required id="baseSalary"
                                        placeholder="200000">
                                </div>

                                <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-success" value="Save" name="btnSaveEmployee">
                                </div>
                                <div class="col-md-2 top-margin">
                                    <a href="./create.php" class="btn btn-danger">Reset</a>
                                </div>
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