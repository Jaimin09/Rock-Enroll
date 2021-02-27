<?php

$connection = mysqli_connect("localhost", "root", "", "rock-enroll");

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$query = "SELECT * FROM login WHERE email='$email'";

$res=mysqli_query($connection,$query);

if(mysqli_num_rows($res)>0){
    echo "<h2> Email ID already exist! Please Try a different Email !</h2>";
}

else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    echo "<h3> Invalid Email Address. </h3><br><br>";

else{
$query = "INSERT INTO `rock-enroll` (`email`, `password`, `username`,) 
                VALUES ('$email', '$password', '$username', 0);";

if(mysqli_query($connection, $query)){
    echo "<br><br><h2>Successfully Signed Up !</h2><br><br>";
    header("location: login.php");
}
else
    echo "<br><h2>Sign up Error. Please Try again !</h2><br><br>";
}

?>

<html>
    <body>
        <button onclick = "window.location.href='login.php'">Back to Login Up Page</button>
    </body>
</html>