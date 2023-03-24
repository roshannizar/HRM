<?php

    function getSideNav($active) {
        if($_SESSION["dashboard"] == 1) {
            if($active == "dashboard") {
                echo '<a href="../dashboard" class="controls btn btn-primary">
                    <span class="fa fa-home"></span> &nbsp Dashboard
                </a>';
            } else {
                echo '<a href="../dashboard" class="controls btn">
                    <span class="fa fa-home"></span> &nbsp Dashboard
                </a>';
            }
        }

        if($_SESSION["employee"] == 1) {
            if($active == "employee") {
                echo '<a href="../employee" class="controls btn btn-primary">
                    <span class="fa fa-users"></span> &nbsp Employee
                </a>';
            } else {
                echo '<a href="../employee" class="controls btn">
                    <span class="fa fa-users"></span> &nbsp Employee
                </a>';
            }
        }

        if($_SESSION["attendance"] == 1) {
            if($active == "attendance") {
                echo '<a href="../attendance" class="controls btn btn-primary">
                    <span class="fa fa-clock"></span> &nbsp Attendance
                </a>';
            } else {
                echo '<a href="../attendance" class="controls btn">
                    <span class="fa fa-clock"></span> &nbsp Attendance
                </a>';
            }
        }

        if($_SESSION["timesheet"] == 1) {
            if($active == "timesheet") {
                echo '<a href="../project" class="controls btn btn-primary">
                    <span class="fa fa-calendar"></span> &nbsp Timesheet
                </a>';
            } else {
                echo '<a href="../project" class="controls btn">
                    <span class="fa fa-calendar"></span> &nbsp Timesheet
                </a>';
            }
        }

        if($_SESSION["payroll"] == 1) {
            if($active == 'payroll') {
                echo '<a href="../payroll" class="controls btn btn-primary">
                        <span class="fa fa-credit-card"></span> &nbsp Payroll
                </a>';
            } else {
                echo '<a href="../payroll" class="controls btn">
                    <span class="fa fa-credit-card"></span> &nbsp Payroll
                </a>';
            }
        }

        if($_SESSION["project"] == 1) {
            if($active == "project") {
                echo '<a href="../project" class="controls btn btn-primary">
                    <span class="fa fa-file"></span> &nbsp Project
                </a>';
            } else {
                echo '<a href="../project" class="controls btn">
                    <span class="fa fa-file"></span> &nbsp Project
                </a>';
            }
        }

        if($_SESSION["user"] == 1) {
            if($active == "user") {
                echo '<a href="../users" class="controls btn btn-primary">
                    <span class="fa fa-user-plus"></span> &nbsp Users
                </a>';
            } else {
                echo '<a href="../users" class="controls btn">
                    <span class="fa fa-user-plus"></span> &nbsp Users
                </a>';
            }
        }

        if($_SESSION["settings"] == 1) {
            if($active == "settings") {
                echo '<a href="../settings" class="controls btn btn-primary">
                    <span class="fa fa-cog"></span> &nbsp Settings
                </a>';
            } else {
                echo '<a href="../settings" class="controls btn">
                    <span class="fa fa-cog"></span> &nbsp Settings
                </a>';
            }
        }
    }
?>