<?php
require_once('DBconnect.php');

$conn = new mysqli("localhost", "root", "", "book_my_trip");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for adding to cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 1; // Replace with the logged-in user's ID
    $package_id = $_POST['package_id'];
    $quantity = $_POST['quantity'];

    // Insert data into Cart table
    $sql = "INSERT INTO Cart (User_ID, Package_ID, Quantity) 
            VALUES ($user_id, $package_id, $quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "Item added to cart!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>