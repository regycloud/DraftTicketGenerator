<?php
    $mysqli = new mysqli("localhost", "root", "", "pgascom");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    };

    $sql = "SELECT * FROM cust";
?>