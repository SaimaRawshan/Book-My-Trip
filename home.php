<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book My Trip</title>

    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="index.php">Login</a>
        </nav>

    </section>

    <section class="hero">
        <div class="content">
            <h1>Explore the World with Us</h1>
            <p>Plan your perfect trip and make unforgettable memories!</p>
            <div class="container"> <div class="search"> <div class="row"> <div class="col-md-6"> <div class="search-1"> <i class='bx bx-search-alt'></i> <input type="text" placeholder="Destination"> </div> </div> <div></div>
        </div>
    </section>
    
    </div>
 
    <script>
        document.getElementById('menu-btn').addEventListener('click', function () {
            document.querySelector('.navbar').classList.toggle('active');
        });
    </script>
    <main>
        <h2>Welcome to Book My Trip!</h2>
        <p>Explore the best travel packages for your next adventure.</p>
        <a href="package.php" class="button">View Packages</a>
    </main>

</body>
</html>