<?php
    require '../../core/services/common-service.php';
    require '../../shared/components/sidenav.php';
    require '../../core/services/user-permission.php';
    require '../../core/services/payroll-service.php';
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
    <link rel="stylesheet" href="../../assets/css/users.css" />
    <title>Payroll</title>
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
                <label class="navbar-brand">Payroll</label>
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
                            <h4>View Payroll</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="./create.php" class="btn btn-primary btn-small">Create Payroll</a>
                        </div>
                    </div>
                </div>

                <div class="slight-top-margin">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Project Name</th>
                                <th>Base Salary</th>
                                <th>Allowance</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getAllPayroll($conn);
                                if($_SESSION['role'] == 1) {
                                    $id = $_SESSION['userId'];
                                    $result = getAuthAllPayroll($conn, $id);
                                }
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td id="<?php echo $row['id'];?>"><?php echo $row["id"];?></td>
                                <td><?php echo $row["firstname"].' '.$row["lastname"];?></td>
                                <td><?php echo $row["name"];?></td>
                                <td><?php echo $row["basesalary"];?></td>
                                <td><?php echo $row["allowance"];?></td>
                                <td><?php echo $row["basesalary"]+$row["allowance"];?></td>
                                <td>
                                    <div class="row center">
                                        <form method="POST" action="../../core/services/payroll-service.php">
                                            <input type="button" class="btn-small btn-r btn-d" name="btnDelete"
                                                onclick="deletePayroll(<?php echo $row['id'];?>)" value="Delete" />
                                            <input type="button" class="btn-small btn-r btn-u" name="btnUpdate"
                                                id="btnUpdateP" onclick="updatePayroll(<?php echo $row['id'];?>)"
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

    <div id="updatePayrollModal" class="modal">
        <form method="POST" action="../../core/services/payroll-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeUpdateModal()">&times;</span>
                <h3 class="modal-title" id="updateModalLabel">Update Payroll</h3>
            </div>
            <div class="modal-body">
                <label>Do you want update this payroll </label>
                <label id="updatepId"></label>
                <input type="text" name="updatepId" id="updatepIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeUpdateModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-warning" name="btnUpdateP">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div id="deletePayrollModal" class="modal">
        <form method="POST" action="../../core/services/payroll-service.php" class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h3 class="modal-title" id="deleteModalLabel">Delete Payroll</h3>
            </div>
            <div class="modal-body">
                <label>Do you want delete this payroll </label>
                <label id="deletepId"></label>
                <input type="text" name="deletepId" id="deletepIdText" hidden />
                <label>?</label>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger" name="btnDeletePayroll">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/payroll.js"></script>
</body>

</html>