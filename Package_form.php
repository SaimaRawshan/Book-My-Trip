<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css'>
    <link rel="stylesheet" href="style.css">
    <title>Book My Trip</title>
</head>
<body>
<section class="header">
    <a href="admin_dashboard.php" class="logo">Book My Trip</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href='about.php'><About></a>
            <a href='ShowUsers.php'>Users</a>
            <a href="Admin_package.php">Package</a>
            <a href="review.php">Review</a>
            <a href='index.php'>Login</a>
        </nav>
    </section>
    </section>

    <div id='box3'> <h2>Add Package:</h1><br>

        <form method='post'>
            <label>Package ID: </label>
            <input type='number' name="PackageID"><br><br>
            <label>Accommodation: </label>
            <input type='text' name="Accom"><br><br>
            <label>Duration: </label>
            <input type='number' name="Duration"><br><br>
            <label>Destination: </label>
            <input type='text' name="Destination"><br><br>
            <label>Transport: </label>
            <input type='text' name="Transport"><br><br>
            <label>Cost: </label>
            <input type='numner' name="Cost"><br><br>
            <label>Food: </label>
            <input type='text' name="Food"><br><br>
            <label>Type: </label>
            <input type='text' name="Type"><br><br>
            <label>Adventure(separated by comma): </label>
            <input type='text' name="Adventures"><br><br>

            <input type='submit' value=" Ok ">
    

        </form>
    </div>
</body>
</html>

<?php
require_once('DBconnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $PackageID = $_POST['PackageID'];
    $Accommodation = $_POST['Accom'];
    $Duration = $_POST['Duration'];
    $Destination = $_POST['Destination'];
    $Transport = $_POST['Transport'];
    $Cost = $_POST['Cost'];
    $Food = $_POST['Food'];
    $Type = $_POST['Type'];
    $Adventures = $_POST['Adventures'];


    $sql="Insert into package values('$PackageID', '$Accommodation', '$Duration', '$Destination', '$Transport', '$Cost', '$Food', '$Type')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "Package added successfully!<br>";
        $advntr_array = explode(',', $Adventures);

        foreach ($advntr_array as $adventure) {
            $adventure = trim($adventure);
            $adventureSql = "Insert into adventures values ('$PackageID', '$adventure')";
            $result = mysqli_query($conn, $adventureSql);
            }
        
    echo "Package and Adventures added successfully!";
    header("Location: Admin_Package.php");
        
        
    }
    else {
            echo "Error inserting package: ";
            header("Location: Package_form.php");
        }
    
}
    
?>