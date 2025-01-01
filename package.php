<?php
include 'DBconnect.php';

$sql = 'SELECT p.Accommodation, p.Duration, p.Destination, p.Transport, p.Cost, p.Food, p.P_Type, GROUP_CONCAT(a.Adventure ORDER BY a.Adventure SEPARATOR ", ") AS Adventures
        FROM package p
        LEFT JOIN Adventures a ON p.PackageID = a.PackageID
        GROUP BY p.PackageID';

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="header">
        <a href="home.php" class="logo">Book My Trip</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="package.php">Package</a>
            <a href="cart.php">Cart</a>
            <a href="review.php">Review</a>
        </nav>
    </section>

    <section class="packages">
        <h2>Available Packages</h2>
        <div class="package-list">

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="package">';
                    echo '<h3>' . htmlspecialchars($row["Destination"]) . '</h3>';
                    echo '<p><strong>Accommodation:</strong> ' . htmlspecialchars($row["Accommodation"]) . '</p>';
                    echo '<p><strong>Duration:</strong> ' . htmlspecialchars($row["Duration"]) . ' days</p>';
                    echo '<p><strong>Transport:</strong> ' . htmlspecialchars($row["Transport"]) . '</p>';
                    echo '<p><strong>Food:</strong> ' . htmlspecialchars($row["Food"]) . '</p>';
                    echo '<p><strong>Cost:</strong> $' . htmlspecialchars($row["Cost"]) . '</p>';
                    echo '<p><strong>Type:</strong> ' . htmlspecialchars($row["P_Type"]) . '</p>';
                    echo '<p><strong>Adventures:</strong> ' . htmlspecialchars($row["Adventures"]) . '</p>';
                    // echo '<button class="add-to-cart-button">Add to Cart</button>';
                    echo '<br><a href="cart.php" class="button">Add to cart</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No packages available at the moment.</p>';
            }
            ?>
        </div>
    </section>

</body>
</html>
