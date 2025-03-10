<?php
require_once('DBconnect.php');

if(isset($_GET['UserName'])) {
    $username = $_GET['UserName'];
    $sql = "DELETE FROM user WHERE UserName = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)) {
        echo "User deleted successfully!";
        header("Location: ShowUsers.php");
    } 
    else {
        echo "Error deleting: " . mysqli_error($conn);
    }
}
else {
    echo "No username provided for deletion.";
}

?>