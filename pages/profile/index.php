<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/user-service.php';
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
    <link rel="stylesheet" href="../../assets/css/profile.css" />
    <title>Profile</title>
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
                <label class="navbar-brand">Settings / Profile</label>
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
            <?php 
                $id = $_SESSION['userId'];
                $result = getUser($conn, $id);

                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="row maintain-paddings">
                <div class="col-md-3">
                    <div class="row card-container">
                        <div class="col-md-12 slight-padding-left make-center">
                            <?php
                                if($row["gender"] == 0) {
                                    echo '<img src="../../assets/images/man.png" class="resize">';
                                } else if($row['gender'] == 1) {
                                    echo '<img src="../../assets/images/female.png" class="resize">';
                                } else {
                                    echo '<img src="../../assets/images/no.png" class="resize">';
                                }
                            ?>
                        </div>
                        <div class="col-md-12 slight-padding-right make-center">
                            <p><?php echo getUserName();?></p>
                            <label><?php echo getRole($_SESSION["role"]);?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card-container">
                        <div class="col-md-12 padding-around">
                            <h3>Profile</h3>
                        </div>
                    </div>
                    <div class="card">
                        <form class="profile-form">
                            <div class="row extra-row">
                                <div class="col-md-4">
                                    <label for="fnameInput">First Name</label>
                                    <p class="more-weight"><?php echo $row["firstname"];?></p>
                                    <input type="text" name="firstname" hidden class="form-control" required
                                        id="fnameInput" placeholder="John">
                                </div>
                                <div class="col-md-4">
                                    <label for="lnameInput">Last Name</label>
                                    <p class="more-weight"><?php echo $row["lastname"];?></p>
                                    <input type="text" class="form-control" hidden name="lastname" required
                                        id="lnameInput" placeholder="Doe">
                                </div>
                                <div class="col-md-4">
                                    <label for="emailInput">Email Address</label>
                                    <p class="more-weight"><?php echo $row["email"];?></p>
                                    <input type="email" class="form-control" hidden name="email" required
                                        id="emailInput" placeholder="jhondoe@gmail.com">
                                </div>
                                <div class="col-md-4 top-margin">
                                    <label for="roleSelect">Role</label>
                                    <p class="more-weight"><?php echo getRole($row["role"]);?></p>
                                </div>
                                <div class="col-md-4 top-margin">
                                    <label for="contactNoInput">Contact No</label>
                                    <div class="input-group">
                                        <!-- <div class="input-group-prepend">
                                            <div class="input-group-text">+94</div>
                                        </div> -->
                                        <p class="more-weight">+94 <?php echo $row["contactno"];?></p>
                                        <input type="text" name="contactno" hidden class="form-control"
                                            id="contactNoInput" placeholder="771234567">
                                    </div>
                                </div>
                                <div class="col-md-4 top-margin">
                                    <label for="genderSelect">Gender</label>
                                    <p class="more-weight"><?php echo getGender($row["gender"]);?></p>
                                    <select class="form-control" id="genderSelect" hidden name="gender">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>

                                <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-primary" value="Edit Profile"
                                        name="updateProfile">
                                </div>

                                <!-- <div class="col-md-2 top-margin">
                                    <input type="submit" class="btn btn-success" value="Save" name="saveUser">
                                </div>
                                <div class="col-md-2 top-margin">
                                    <a href="./create.php" class="btn btn-danger">Reset</a>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
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