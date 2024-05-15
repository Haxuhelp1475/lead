<?php
$server ='localhost';
$user ='root';
$pass = '';
$datebase = 'sportnews';

$conn = new mysqli($server,$user,$pass,$datebase);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

?>