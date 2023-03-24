<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/settings-service.php';
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
    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
    <link rel="stylesheet" href="../../assets/css/settings.css" />
    <title>Settings</title>
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
                <?php echo getSideNav("settings"); ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Settings</label>
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
                            <span class="fa fa-user profile icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Profile</label>
                            <br />
                            <br />
                            <a href="/hrm/pages/profile" class="btn btn-primary btn-smaller">GO</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-key key icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Change Password</label>
                            <a href="#" class="btn btn-primary btn-smaller" data-toggle="modal" data-target="#passwordModal">GO</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-tasks tasks icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Positions</label>
                            <br />
                            <br />
                            <a href="/hrm/pages/position" class="btn btn-primary btn-smaller">GO</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-6 slight-padding-left">
                            <span class="fa fa-building building icon-badge" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 slight-padding-right">
                            <label>Departments</label>
                            <br />
                            <br />
                            <a href="/hrm/pages/department" class="btn btn-primary btn-smaller">GO</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Password Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="../../core/services/settings-service.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="npassword">New Password</label>
                        <input type="password" class="form-control" name="npassword" required id="npassword"
                            placeholder="New Password">
                    </div>
                    <div class="col-md-12 top-margin">
                        <label for="cnpassword">Confirm New Password</label>
                        <input type="password" class="form-control" name="cnpassword" required id="cnpassword"
                            placeholder="Confirm New Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="btnChangePassword">Change</button>
                </div>
            </form>
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