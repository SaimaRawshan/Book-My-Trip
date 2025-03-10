<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devive-width, initial-scale=1.0">
    <title>Book My Trip</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <section class="header">
        <a href="home.php" class="logo">Book My Trip</a>
    </section>
   <div id='box1'> <h1>LogIn</h1><br>

        <form class='login_form' action='login.php' method='post'>
            <label>username:</label>
            <input type='text' name="username"><br>
            <label>password:</label>
            <input type='password' name="password"><br>
            <label>role:</label>
            <input type='radio' name='role' value="Admin">
            Admin
            <input type='radio' name='role' value="User">
            User<br><br>
            <input type='submit' value="Log in"><br>
            <a href='NewUser.php'> Create New Account</a>

        </form>
    </div>
</body>
</html>
