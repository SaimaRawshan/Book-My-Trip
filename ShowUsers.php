<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <a href="Add_new_admin_user.php" class="btn">Add New User</a>
    <section class="Users">
        <div class="UserBox">
            <h2>Users: </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('DBconnect.php');
                    $sql = "SELECT UserName, FName, LName, Email, PhoneNo FROM user WHERE role = 'User'";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['FName']; ?></td>
                                <td><?php echo $row['LName']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['PhoneNo']; ?></td>
                                <td style="background-color:rgba(255, 255, 255, 0.2);">
                                <a style="text-decoration:none;" href="delete_user.php?UserName=<?php echo $row['UserName']; ?>" onclick="return confirm('Confirm deletion?');">
                                <img src="image/delete.png" alt="delete" width="20" height="20"/>
                                </a></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table><br><br>
        </div>
    </section>
    <section class="Admin">
        <div class="AdminBox">
            <h2>Admins: </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('DBconnect.php');
                    $sql = "SELECT UserName, FName, LName, Email, PhoneNo FROM user WHERE role = 'Admin'";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['FName']; ?></td>
                                <td><?php echo $row['LName']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['PhoneNo']; ?></td>
                                <td style="background-color:rgba(255, 255, 255, 0.2);">
                                <a style="text-decoration:none;" href="delete_user.php?UserName=<?php echo $row['UserName']; ?>" onclick="return confirm('Confirm deletion?');">
                                <img src="image/delete.png" alt="delete" width="20" height="20"/>
                                </a></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    
</body>
</html>
