<?php
require_once('DBconnect.php');
if(isset($_GET['PackageID'])) {
        $pack_id = $_GET['PackageID'];
        $sql = "DELETE FROM package WHERE PackageID = '$pack_id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn)) {
            echo "Package deleted successfully!";
            header("Location: Admin_Package.php");
        } 
        else {
            echo "Error deleting: " . mysqli_error($conn);
        }
    }
    else {
        echo "No Package provided for deletion.";
    }

?>

