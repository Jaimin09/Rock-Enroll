<?php
session_start();
$connection=mysqli_connect("localhost","root","","rock-enroll");
$email= $_SESSION['email'];
$code=$_POST['code'];
$name=$_POST['name']
$query = "SELECT * FROM channel WHERE code='$code'";
$res=mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0)
{
    echo '<script>alert("Channel already exists.\nPlease enter a different code.")</script>';
}
else
{
    $query2 = "INSERT INTO channel VALUES('$code','$name')";
    if(!mysqli_query($connection, $query2))
    {
        echo '<script>alert("Unable to create the channel.")</script>';
    }
}
