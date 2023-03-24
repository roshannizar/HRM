<?php
    include 'connection.php';

    $conn = OpenCon();

    function getUsers($conn) {
        $query = "SELECT email, firstname, lastname from user ORDER BY 1 DESC";
        return $conn->query($query);
    }

    function getAllEmployees($conn) {
        $query = "SELECT * 
        from employee e
        LEFT JOIN department d on e.departmentId = d.id
        LEFT JOIN positions p on e.positionId = p.id
        LEFT JOIN project pr on e.projectId = pr.id";
        return $conn->query($query);
    }
?>