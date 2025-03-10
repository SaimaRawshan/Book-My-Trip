<?php
include 'DBconnect.php';
session_start();


$sql = "SELECT PackageID, Accommodation, Duration, Destination, Transport, Cost, Food, P_type FROM package";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching packages: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Packages</title>
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
        </nav>
    </section>
    <h1>Available Packages</h1>
    <div class="package-list">

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="package">';
            echo '<h3>' . htmlspecialchars($row['Destination']) . '</h3>';
            echo '<p><strong>Accommodation:</strong> ' . htmlspecialchars($row['Accommodation']) . '</p>';
            echo '<p><strong>Duration:</strong> ' . htmlspecialchars($row['Duration']) . ' days</p>';
            echo '<p><strong>Transport:</strong> ' . htmlspecialchars($row['Transport']) . '</p>';
            echo '<p><strong>Cost:</strong> $' . htmlspecialchars($row['Cost']) . '</p>';
            echo '<p><strong>Food:</strong> ' . htmlspecialchars($row['Food']) . '</p>';
            echo '<p><strong>Type:</strong> ' . htmlspecialchars($row['P_type']) . '</p>';
            echo '<form action="add_to_cart.php" method="POST">';


            echo '<input type="hidden" name="package_id" value="' . htmlspecialchars($row['PackageID']) . '">';
            echo '<input type="hidden" name="cost" value="' . htmlspecialchars($row['Cost']) . '">';
            echo '<label for="quantity">Quantity:</label>';
            echo '<input type="number" name="quantity" value="1" min="1">';
            echo '<button type="submit">Add to Cart</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>

    </div>
</body>
</html>


