<?php
session_start();
$connection=mysqli_connect("localhost","root","","rock-enroll");
$email= $_SESSION['email'];
$code=$_POST['code'];
$query = "SELECT * FROM channel WHERE code='$code'";
$res=mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0)
{
    $sql = "INSERT INTO channels VALUES ('$code','$email')";
    if(mysqli_query($connection, $sql))
    {
        header("location:channels.php");
    }
    else
    echo '<script>alert("Cannot join the channel.")</script>';
}
?>