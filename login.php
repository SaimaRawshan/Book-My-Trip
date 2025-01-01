<?php

require_once('DBconnect.php');

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role= $_POST['role'];
    $sql = "SELECT * FROM user WHERE username = '$username' AND role='$role'";
    $result=mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_row($result);
        if (password_verify($password, $user[5])) { 
            if ($role=='User'){
                header("Location: home.php");
                exit();
        }
            else {

                header("Location: admin_dashboard.php");
                exit();
        }
        } 
        else {
            echo 'Wrong username or password';
            header("Location: index.php");
        }
    } 
    else {
        echo 'Wrong username or password';
        header("Location: index.php");
    }
}

?>
