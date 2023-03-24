<?php
    require '../../core/services/common-service.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/department-service.php';
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
    <link rel="stylesheet" href="../../assets/css/department.css" />
    <title>Department</title>
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
                        echo '<a href="../users" class="controls btn">
                            <span class="fa fa-user-plus"></span> &nbsp Users
                        </a>';
                    }

                    if($_SESSION["settings"] == 1) {
                        echo '<a href="../settings" class="controls btn btn-primary">
                            <span class="fa fa-cog"></span> &nbsp Settings
                        </a>';
                    }
                ?>
            </div>
        </div>

        <div class="col-md-10 nav-content">

            <!-- Navbar -->
            <nav class="navbar">
                <label class="navbar-brand">Settings / Department</label>
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
                            <h4>View Departments</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="./create.php" class="btn btn-primary btn-small">Create Department</a>
                        </div>
                    </div>
                </div>

                <div class="slight-top-margin">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getAllDepartments($conn);
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td id="<?php echo $row['id'];?>"><?php echo $row["id"];?></td>
                                <td><?php echo $row["name"];?></td>
                                <td>
                                    <div class="row center">
                                        <form method="POST" action="../../core/services/department-service.php">
                                            <input type="button" class="btn-small btn-r btn-d" name="btnDelete"
                                                onclick="deleteDepartment(<?php echo $row['id'];?>)" value="Delete" />
                                            <input type="button" class="btn-small btn-r btn-u" name="btnUpdate"
                                                id="btnUpdateD" onclick="updateDepartment(<?php echo $row['id'];?>)"
                                                value="Update" />
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

    <div id="updateDepartmentModal" class="modal">
        <form method="POST" action="../../core/services/department-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeUpdateModal()">&times;</span>
                <h3 class="modal-title" id="updateModalLabel">Update Department</h3>
            </div>
            <div class="modal-body">
                <label>Do you want update this department </label>
                <label id="updatedId"></label>
                <input type="text" name="updatedId" id="updatedIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeUpdateModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-warning" name="btnUpdateD">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div id="deleteDepartmentModal" class="modal">
        <form method="POST" action="../../core/services/department-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h3 class="modal-title" id="deleteModalLabel">Delete Department</h3>
            </div>
            <div class="modal-body">
                <label>Do you want delete this department </label>
                <label id="deletedId"></label>
                <input type="text" name="deletedId" id="deletedIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger" name="btnDeleteDepartment">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/department.js"></script>
</body>

</html>