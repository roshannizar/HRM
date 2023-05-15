<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/timesheet-service.php';
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
    <link rel="stylesheet" href="../../assets/css/timesheet.css" />
    <title>Timesheet | Create</title>
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
                <?php echo getSideNav("timesheet"); ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Timesheet / Create</label>
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
                            <h4>Create Timesheet</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="./" class="btn btn-primary btn-small">View Timesheet</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="create-form">
                        <form method="POST" action="../../core/services/timesheet-service.php">
                            <div class="row extra-row">

                            <div class="col-md-4 hide">
                                    <?php
                                            $result = getemployee($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <input type="text" name="empId" class="form-control" id="empId"
                                        value="<?php echo $row['id'] ?>">
                                        <?php
                                            }
                                        ?>
                                </div>

                                <div class="col-md-4">
                                    <label for="projectSelect">Project</label>
                                    <select class="form-control" id="projectSelect" name="projectId">
                                    <option value="0">-- Please Select --</option>
                                    <?php
                                            $result = getProject($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="taskSelect">Task</label>
                                    <select class="form-control" id="taskSelect" name="taskId">
                                    <option value="0">-- Please Select --</option>
                                    <?php
                                            $result = getTask($conn);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="hours">Hours</label>
                                    <input type="number" name="hours" class="form-control" required id="hours"
                                        placeholder="20">
                                </div>

                                <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-success" value="Save" name="btnSaveTimesheet">
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