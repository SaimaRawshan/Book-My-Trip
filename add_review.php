<?php
require_once('DBconnect.php');
session_start();
$username = $_POST['User_name'];
$comments = $_POST['review_text'];
$rating = $_POST['rating'];

$sql_user = "SELECT UserID FROM user WHERE UserName = '$username'";
$result_user = mysqli_query($conn, $sql_user);

if ($result_user && mysqli_num_rows($result_user) > 0) {
    $row = mysqli_fetch_assoc($result_user);
    $user_id = $row['UserID'];

    $sql_review = "INSERT INTO review (user_id, Comments, Rating) 
                   VALUES ('$user_id', '$comments', '$rating')";
    $result_review = mysqli_query($conn, $sql_review);
    
    if ($result_review) {
        header("Location: review.php");
        exit();
    } else {
        echo "Error adding review: " . mysqli_error($conn);
    }
} else {
    echo "User not found!";
}
?>
