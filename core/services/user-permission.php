<?php

    if (!isset($_SESSION['userId'])) {
        header('Location: ../../pages/authentication');
        exit();
    }

    function checkPermission() {
        if ($_SESSION['role'] == 0) {
        echo "<h1>Welcome, Admin!</h1>";
        echo "<p>You have access to user management features.</p>";
        } else {
        echo "<h1>Welcome, User!</h1>";
        echo "<p>You can view your personal information and submit requests.</p>";
        }
    }

?>
