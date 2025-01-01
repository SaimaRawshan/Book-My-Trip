<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book My Trip</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>
<body>

    <section class="header">
        <a href="admin_dashboard.php" class="logo">Book My Trip</a>
    </section>

    <div id='box2'> <h1>Create Account</h1><br>

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
            <input type='password' name="password"><br><br><br>
            <input type='submit' value="CREATE ACCOUNT">
    

        </form>
    </div>

    <?php
    require_once('DBconnect.php');

    if(isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['PhoneNo']) && isset($_POST['UserName']) && isset($_POST['password'])){
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Email = $_POST['Email'];
        $PhoneNo = $_POST['PhoneNo'];
        $Username = $_POST['UserName'];
        $password=$_POST['password'];
        $role= 'User';

        $hash= password_hash($password, PASSWORD_DEFAULT);
        
        $sql = " INSERT INTO user VALUES('$FirstName', '$LastName', '$Email','$PhoneNo','$Username','$hash','$role') ";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn)>0){
            header("Location: index.php");
        }
        else{
            echo "Insertion Failed";
            header("Location: NewUser.php");
        }
    }
    ?>
</body>
</html>