<?php
    session_start();

    function getUsername() {
        return $_SESSION["fullname"];
    }

    function getRole($num) {
        if($num == 0) {
            return "Administrator";
        } else if($num == 1) {
            return "Staff";
        }  else {
            return "N/A";
        }
    }

?>