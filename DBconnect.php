<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}else{
    mysqli_select_db($conn, $dbname);
}
?>