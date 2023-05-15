<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <link rel="stylesheet" href="../../assets/css/signin.css" />
    <title>HRM | Signin</title>
</head>

<body>
    <div class="row max-width">
        <div class="col-md-8 blue center">
            <h6>HRM</h6>
        </div>
        <div class="col-md-4">
            <div class="col-md-12 center">
                <img src="../../assets/images/hrm.png" />
            </div>
            <form method="POST" action="../../core/services/login-service.php">
                <div class="form-group">
                    <label for="emailAddress">User Name</label>
                    <input type="email" class="form-control" id="username" name="username" required
                        aria-describedby="emailHelp" placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Password">
                </div>
                <div class="form-check">
                    <div class="row">
                        <div class="col-md-12 right">
                            <!-- <label class="forgot">Forgot Password?</label> -->
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>
    </div>
</body>

</html>