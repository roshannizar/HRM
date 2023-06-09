<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/user-service.php';
    require '../../core/services/user-permission.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <link rel="stylesheet" href="../../assets/css/users.css" />
    <title>User</title>
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
                <?php echo getSideNav("user"); ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Users</label>
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
                            <h4>View Users</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="./create.php" class="btn btn-primary btn-small">Create User</a>
                        </div>
                    </div>
                </div>

                <div class="slight-top-margin">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email Address</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Roles</th>
                                <th>Contact No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getAllUsers($conn);
                                $count = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td id="<?php echo 'name'.$count;?>"><?php echo $row["email"];?></td>
                                <td><?php echo $row["firstname"];?></td>
                                <td><?php echo $row["lastname"];?></td>
                                <td><?php echo getRole($row["role"]);?></td>
                                <td><?php echo $row["contactno"] ?? "N/A";?></td>
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
                                $count++;
                                }
                                CloseCon($conn);
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
    
    <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="../../core/services/user-service.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Do you want delete this user </label>
                    <label name="deleteUserId" id="deleteUserId"></label>
                    <input type="text" name="deleteUserId" id="deleteUserIdText" hidden />
                    <label>?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
                </div>
            </form>
        </div>
    </div> -->
    
    <!-- Delete Modal -->
    <div id="deleteUserModal" class="modal">
        <form method="POST" action="../../core/services/user-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h3 class="modal-title" id="deleteModalLabel">Delete User</h3>
            </div>
            <div class="modal-body">
                <label>Do you want delete this project </label>
                <label id="deleteUserId" name="deleteUserId"></label>
                <input type="text" name="deleteUserId" id="deleteUserIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Update Modal -->
    <div id="updateUserModal" class="modal">
        <form method="POST" action="../../core/services/user-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeUpdateModal()">&times;</span>
                <h3 class="modal-title" id="updateModalLabel">Update User</h3>
            </div>
            <div class="modal-body">
                <label>Do you want update this user </label>
                <label id="updateUserId"></label>
                <input type="text" name="updateUserId" id="updateUserIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeUpdateModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-warning" name="btnUpdateData">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="../../core/services/user-service.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Do you want update this user </label>
                    <label id="updateUserId"></label>
                    <input type="text" name="updateUserId" id="updateUserIdText" hidden />
                    <label>?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" name="btnUpdateData">Update</button>
                </div>
            </form>
        </div>
    </div> -->

    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/user.js"></script>
</body>

</html>