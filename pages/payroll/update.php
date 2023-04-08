<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/payroll-service.php';
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
    <link rel="stylesheet" href="../../assets/css/payroll.css" />
    <title>Payroll | Update</title>
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
                <?php echo getSideNav("payroll"); ?>
            </div>
        </div>
        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Payroll / Update</label>
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
                            <h4>Update Payroll</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="./" class="btn btn-primary btn-small">View Payroll</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="create-form">

                        <form method="POST" action="../../core/services/payroll-service.php">
                            <?php
                                $id = $_SESSION['payrollUpdateId'];
                                $result = getPayroll($conn, $id);

                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="row extra-row">

                                <div class="col-md-4 top-margin">
                                    <label for="employeeSelect">Employee</label>
                                    <select class="form-control" id="employeeSelect" name="employeeId">
                                    <?php
                                            $result_employee = getEmployees($conn);
                                            while($row_employee = mysqli_fetch_assoc($result_employee)) {
                                        ?>
                                        <option <?php if($row["employeeid"] == $row_employee['id']) echo 'selected=selected' ?>
                                         value="<?php echo $row_employee['id'] ?>"><?php echo $row_employee['firstname'].' '.$row_employee['lastname'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="projectSelect">Project</label>
                                    <select class="form-control" id="projectSelect" name="projectId">
                                    <?php
                                            $result_project = getProjects($conn);
                                            while($row_project = mysqli_fetch_assoc($result_project)) {
                                        ?>
                                        <option <?php if($row["projectid"] == $row_project['id']) echo 'selected=selected' ?>
                                         value="<?php echo $row_project['id'] ?>"><?php echo $row_project['name']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="basesalary">Base Salary</label>
                                    <input type="text" class="form-control" name="basesalary" required id="basesalary"
                                        placeholder="100000" value="<?php echo $row["basesalary"];?>">
                                </div>

                                <div class="col-md-4 top-margin">
                                    <label for="allowance">Allowance</label>
                                    <input type="text" class="form-control" name="allowance" required id="allowance"
                                        placeholder="100000" value="<?php echo $row["allowance"];?>">
                                </div>
                                

                                <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-success" value="Update" name="btnUpdatePayroll">
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