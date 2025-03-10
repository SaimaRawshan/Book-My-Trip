<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="header">
        <a href="admin_dashboard.php" class="logo">Book My Trip</a>
    </section>

    <div id='box2'> <h1>Add New User</h1><br>

        <form method='post'>
            <label>First Name:</label>
            <input type='text' name="FirstName"><br><br>
            <label>Last Name:</label>
            <input type='text' name="LastName"><br><br>
            <label>Email:</label>
            <input type='email' name="Email"><br><br>
            <label>Phone No:</label>
            <input type='tel' name="PhoneNo"><br><br>
            <label>UserName:</label>
            <input type='text' name="UserName"><br><br>
            <label>Password:</label>
            <input type='password' name="password"><br><br>
            <input type='radio' name='role' value="Admin">
            Admin
            <input type='radio' name='role' value="User">
            User<br><br>
            <input type='submit' name="submit" value="CREATE ACCOUNT">
    

        </form>
    </div>

<?php
require_once('DBconnect.php');

if(isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['PhoneNo']) && isset($_POST['UserName']) && isset($_POST['password']) && isset($_POST['role'])){
    $FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Email = $_POST['Email'];
	$PhoneNo = $_POST['PhoneNo'];
    $Username = $_POST['UserName'];
	$password=$_POST['password'];
	$role= $_POST['role'];

	$hash= password_hash($password, PASSWORD_DEFAULT);
	
	$sql = " INSERT INTO user (FName, LName, Email, PhoneNo, UserName, Password, Role) VALUES('$FirstName', '$LastName', '$Email','$PhoneNo','$Username','$hash','$role') ";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn)>0){
        $user_id = mysqli_insert_id($conn);
        $sql_cart = "INSERT INTO cart (Cost, Quantity,package_id, user_id) VALUES(0, 0,Null,'$user_id')";
        $result_cart = mysqli_query($conn, $sql_cart);
        if ($result_cart) {
            header("Location: index.php");  
        } 
        else {
            echo "Cart creation failed";
            
        }
		header("Location: admin_dashboard.php");
	}
	else{
		echo "Insertion Failed";
		header("Location: Add_new_admin_user.php");
	}
}
?>

</body>
</html>