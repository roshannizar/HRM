<?php
    session_start();                            //To display alert

    define('LOCALHOST','localhost');             //Constant Defining
    define('DB_USERNAME', 'root');
    define('DB_PWD', '');
    define('DB_NAME','hrm_user');


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PWD) or die(mysqli_error($conn)); //DB Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //selecting DB

?>