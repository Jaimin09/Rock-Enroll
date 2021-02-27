<?php

$email = $_POST["email"];
$password = $_POST["password"];

session_start();

$connection = mysqli_connect("localhost", "root", "", "rock-enroll");

if($connection){
echo "yaaaaaaaaaaaas";
$query = "SELECT * FROM login WHERE email='$email' AND password='$password'";

$res=mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0){
    $user=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    header("location: profile.html");
}

else{
    echo '<script>alert("Invalid username or password")</script>'; 
}

}

?>