<?php
session_start();
$connection=mysqli_connect("localhost","root","","rock-enroll");
$email= $_SESSION['email'];
$author=$_SESSION['username'];
$title=$_POST['title'];
$link=$_POST['link'];
$channel=$_POST['channel'];
$private=false;
if(isset($_POST['private']))
$private=true;
$sql="INSERT INTO notes VALUES('$title','$author','$link',0,'$channel','$private','$email')";
$res=mysqli_query($connection,$sql);
header("location:profile.php");
?>