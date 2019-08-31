<?php

$servername="localhost";
$username="waligama";
$password="zu8e5u3e7";
$dbname="sanila_waligama";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?> 