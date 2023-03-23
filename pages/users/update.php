<?php
    require '../../core/services/common-service.php';
    require '../../core/services/user-service.php';
    require '../../core/services/user-permission.php';
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
    <title>User | Update</title>
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

                        echo '<a href="../employee" class="controls btn">
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
                        echo '<a href="../users" class="controls btn btn-primary">
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
                <label class="navbar-brand">Users / Update</label>
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
                        <div class="col-md-9">
                            <h4>Create Users</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="./" class="btn btn-primary btn-small">View User</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="create-form">

                        <form method="POST" action="../../core/services/user-service.php">
                            <?php
                                $id = $_SESSION['updateId'];
                                $result = getUser($conn, $id);

                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="row extra-row">
                                <div class="col-md-4">
                                    <label for="fnameInput">First Name</label>
                                    <input type="text" name="firstname" class="form-control" required id="fnameInput"
                                        placeholder="John" value="<?php echo $row["firstname"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="lnameInput">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" required id="lnameInput"
                                        placeholder="Doe" value="<?php echo $row["lastname"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="emailInput">Email Address</label>
                                    <input type="text" class="form-control" disabled required id="emailInput"
                                        placeholder="jhondoe@gmail.com" value="<?php echo $row["email"];?>">
                                </div>
                                <div class="col-md-4 top-margin">
                                    <label for="roleSelect">Role</label>
                                    <select class="form-control" id="roleSelect" name="role">
                                        <option value="0" <?php if($row["role"] == 0) echo 'selected=selected';?>>
                                            Administrator</option>
                                        <option value="1" <?php if($row["role"] == 1) echo 'selected=selected';?>>Staff
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 top-margin">
                                    <label for="contactNoInput">Contact No</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+94</div>
                                        </div>
                                        <input type="text" name="contactno" class="form-control" id="contactNoInput"
                                            placeholder="771234567" value="<?php echo $row["contactno"];?>">
                                    </div>
                                </div>
                                <div class="col-md-12 top-margin">
                                    <label>User Permissions</label>
                                    <div class="row">
                                        <?php
                                            $result_permission = getAllFeatures($conn);
                                            $count = 0;
                                            while($permission = mysqli_fetch_assoc($result_permission)) {
                                        ?>
                                        <div class="col-md-2 form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="<?php echo $permission["code"]?>" value="1"
                                                <?php 
                                                    echo $row[$permission['code']] == 1 ? 'checked' : '';
                                                ?>
                                                id="<?php echo $permission["id"]?>">
                                            <label class="form-check-label">
                                                <?php echo $permission["featurename"]; ?>
                                            </label>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-success" value="Update" name="btnUpdate">
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>