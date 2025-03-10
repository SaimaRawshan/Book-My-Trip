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
    <?php

    include 'DBconnect.php';
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];  

        $package_id = $_POST['package_id'];  
        $cost = $_POST['cost'];  
        $quantity = $_POST['quantity']; 
        $total_cost = $cost * $quantity;  
        $total=0;

        $sql_check_cart = "SELECT * FROM cart WHERE user_id = '$user_id' AND package_id = '$package_id'";
        $result_check_cart = $conn->query($sql_check_cart);

        if ($result_check_cart->num_rows > 0) {
            $sql_update_cart = "UPDATE cart 
                                SET Cost = '$cost', TotalCost = '$total_cost', Quantity = '$quantity' 
                                WHERE user_id = '$user_id' AND package_id = '$package_id'";
            if ($conn->query($sql_update_cart)) {
                echo " ";
            } else {
                echo "Error updating cart: " . $conn->error;
            }
        } else {

            $sql_insert_cart = "INSERT INTO cart (Cost, TotalCost, Quantity, package_id, user_id) 
                                VALUES ('$cost', '$total_cost', '$quantity', '$package_id', '$user_id')";
            if ($conn->query($sql_insert_cart)) {
                echo " ";
            } else {
                echo "Error adding item to cart: " . $conn->error;
            }
        }

        $sql_fetch_cart = "SELECT c.package_id, c.Cost, c.Quantity, c.TotalCost, p.Destination, p.Accommodation 
                        FROM cart c 
                        JOIN package p ON c.package_id = p.PackageID 
                        WHERE c.user_id = '$user_id'";
        $result_fetch_cart = $conn->query($sql_fetch_cart);

        if ($result_fetch_cart->num_rows > 0) {
            echo '<h2>Your Cart:</h2>';
            echo '<section class="Users">
        <div class="CartBox"><table class="table">
                    <tr>
                        <th>Package ID</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>';
            while ($row = $result_fetch_cart->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row['package_id'] . '</td>
                        <td>' . $row['Cost'] . '</td>
                        <td>' . $row['Quantity'] . '</td>
                        <td>' . $row['TotalCost'] . '</td>
                    </tr>';
                $total+=$row['TotalCost'];
            }
            echo '</table></div></section>';

            echo '<h3>Total Bill: $' . $total . '</h3>';
            echo '<div class="button-container">
                    <a href="package.php" class="btn2">Back</a> 
                    <a href="confirm_purchase.php" class="btn">Confirm Purchase</a>
                </div>';
        } 
        
        
        else {
            echo "Your cart is empty.";
        }
    } else {
        echo "User not logged in!";
    }
    ?>

</body>
</html>


