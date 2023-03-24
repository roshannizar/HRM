<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/dashboard-service.php';
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
    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
    <title>Dashboard</title>
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
                <?php echo getSideNav("dashboard"); ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Dashboard</label>
                <?php
                    if(!empty($_SESSION['change'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            Please change your password, since you are a new user!
                        </div>';
                    }
                ?>
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
            <div class="row maintain-paddings">
                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-users user icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Employees</label>
                            <p class="">20</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-clock clock icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Attendance</label>
                            <p class="">12</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-credit-card credit-card icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Total Payroll</label>
                            <p class="">Rs 22K</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-ban ban icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Absent</label>
                            <p class="">10</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                </div>

            </div>

        </div>

    </div>

    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>