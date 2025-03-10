<?php
include 'DBconnect.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql_clear_cart = "DELETE FROM cart WHERE user_id = '$user_id'";

    if ($conn->query($sql_clear_cart) === TRUE) {

        echo '<p>Your cart has been cleared!</p>';
    } else {
        echo 'Error clearing cart: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="header">
        <a href="home.php" class="logo">Book My Trip</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="package.php">Package</a>
            <a href="add_to_cart.php">Cart</a>
            <a href="review.php">Review</a>
            <a href="index.php">Login</a>
        </nav>
    </section>
<section class="hero">
    <div class="content"><h1>Thank You For Your Purchase!!</h1>

    </div></section>

</body>
</html>
