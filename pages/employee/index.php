<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/employee-service.php';
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
                <?php echo getSideNav("employee"); ?>
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
                                <td id="<?php echo $row['id'];?>"><?php echo $row["id"];?></td>
                                <td><?php echo $row["firstname"];?></td>
                                <td><?php echo $row["lastname"];?></td>
                                <td><?php echo $row["lastname"];?></td>
                                <td><?php echo $row["d.name"];?></td>
                                <td><?php echo $row["p.project"];?></td>
                                <td><?php echo $row["positionId"];?></td>
                                <td>
                                    <div class="row center">
                                        <form method="POST" action="../../core/services/employee-services.php">
                                            <input type="button" 
                                                class="btn-small btn-r btn-d" name="btnDelete"
                                                onclick="deleteUser(<?php echo $row['id'];?>)" value="Delete" />
                                            <input type="button" class="btn-small btn-r btn-u" name="btnUpdate"
                                                onclick="updateUser(<?php echo $row['id']?>)" value="Update" />
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

    <div id="updateEmployeeModal" class="modal">
        <form method="POST" action="../../core/services/employee-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeUpdateModal()">&times;</span>
                <h3 class="modal-title" id="updateModalLabel">Update Employee</h3>
            </div>
            <div class="modal-body">
                <label>Do you want update this employee </label>
                <label id="updateeId"></label>
                <input type="text" name="updateeId" id="updateeIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeUpdateModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-warning" name="btnUpdateE">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div id="deleteEmployeeModal" class="modal">
        <form method="POST" action="../../core/services/employee-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h3 class="modal-title" id="deleteModalLabel">Delete Employee</h3>
            </div>
            <div class="modal-body">
                <label>Do you want delete this employee </label>
                <label id="deleteeId"></label>
                <input type="text" name="deleteeId" id="deleteeIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger" name="btnDeleteEmployee">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>