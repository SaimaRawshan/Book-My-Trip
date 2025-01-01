<?php

require_once('DBconnect.php');

$conn = new mysqli("localhost", "root", "", "book_my_trip");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number_of_people = $_POST['number_of_people'];
    $booking_date = $_POST['booking_date'];
    $package_id = $_POST['package_id'];

    $sql = "INSERT INTO Book_Form (User_ID, Number_of_People, Booking_Date, Package_ID) 
            VALUES (1, $number_of_people, '$booking_date', $package_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>