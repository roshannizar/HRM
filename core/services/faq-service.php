<?php
    include 'connection.php';

    $conn = OpenCon();

    function getAllFAQ($conn) {
        $query = "SELECT * from faq";
        return $conn->query($query);
    }
?>