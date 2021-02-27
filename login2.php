<?php

$email = $_POST["email"];
$password = $_POST["password"];

session_start();

$connection = mysqli_connect("localhost", "root", "", "rock-enroll");

if($connection){
$query = "SELECT * FROM login WHERE email='$email' AND password='$password'";

$res=mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0){
    //$user=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $_SESSION['email'] = $email;
    $row=mysqli_fetch_assoc($res);
    $_SESSION['username'] = $row['username'];
    header("location: profile.php");
}

else{
    echo '<script>alert("Invalid username or password.\nGo back to login page and enter valid username and password.")</script>'; 
    //header('location: login2.html');
}
//header('location: login2.html');
}

?>