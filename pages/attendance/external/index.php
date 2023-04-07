<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/common.css" />
    <link rel="stylesheet" href="../../../assets/css/external.css" />
    <title>HRM | Attendance External</title>
</head>

<body>
    <div class="col-md-12 bg">
        <div class="col-md-12 child">
            <form method="POST" action="../../../core/services/attendance-service.php">
                <h1>Attendance</h1>
                <h5 id="time"></h5>
                <div class="card">
                    <div class="col-md-12">
                        <label for="enoInput">Enter Employee Number</label>
                        <input type="text" name="eno" class="form-control" required id="enoInput" placeholder="E202X-XXXX">
                    </div>
                    <div class="col-md-12 top-margin">
                        <input type="submit" class="btn btn-success" value="Submit" name="btnSaveAttendance">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../../../assets/js/attendance.js"></script>
</body>
</html>