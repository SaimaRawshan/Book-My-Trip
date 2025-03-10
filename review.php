<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <link rel="stylesheet" href="style.css">   
    <section class="header">
        <a href="index.php" class="logo">Book My Trip</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="package.php">Package</a>
            <a href="add_to_cart.php">Cart</a>
            <a href="review.php">Review</a>
        </nav>
    </section>
</head>
<body>
    <header>
        <h1>Customer Reviews</h1>
    </header>

    <!-- Review Form Section -->
    <section class="add-review">
        <h2>Share Your Experience</h2>
        <form action="add_review.php" method="POST">
            <input type="text" name="User_name" placeholder="Username" required>
            <textarea name="review_text" placeholder="Write your review here..." required></textarea>
            <label for="rating">Rating (1-5):</label>
            <select name="rating" required>
                <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                <option value="4">⭐️⭐️⭐️⭐️</option>
                <option value="3">⭐️⭐️⭐️</option>
                <option value="2">⭐️⭐️</option>
                <option value="1">⭐️</option>
            </select>
            <button type="submit">Submit Review</button>
        </form>
    </section>

    <!-- Reviews-->
    <?php
    // database connection
    include 'DBconnect.php';

    // Fetch all reviews
    $sql = "SELECT r.Comments, r.Rating, u.UserName 
        FROM Review r 
        JOIN User u ON r.User_id = u.UserID 
        ORDER BY r.Review_id DESC";;
    $result = $conn->query($sql);
    ?>

    <section class="reviews">
        <h2>What Our Customers Say</h2>
        <div class="review-container">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="review">';
                    echo '<h3>' . htmlspecialchars($row['UserName']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['Comments']) . '</p>';
                    echo '<p>Rating: ' . str_repeat('⭐️', (int)$row['Rating']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No reviews yet. Be the first to share your experience!</p>';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </footer>
</body>
</html>