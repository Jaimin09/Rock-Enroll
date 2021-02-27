<?php

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$connection = mysqli_connect("localhost", "root", "", "rock-enroll");

$query = "SELECT * FROM login WHERE email='$email'";

$res=mysqli_query($connection,$query);

if(mysqli_num_rows($res)>0){
    echo "<h2> Email ID already exist! Please Try a different Email !</h2>";
}

else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    echo "<h3> Invalid Email Address. </h3><br><br>";

else{
$query2 = "INSERT INTO login (`email`, `password`, `username`, `stars`) 
                VALUES ('$email', '$password', '$username', 0);";

if(mysqli_query($connection, $query2)){
    echo "<br><br><h2>Successfully Signed Up !</h2><br><br>";
    header("location: login.html");
}
else
    echo "<br><h2>Sign up Error. Please Try again !</h2><br><br>";
}


?>