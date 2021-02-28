<?php
session_start();
$channel=$_SESSION['channel'];
$search=$_POST['search'];
$connection=mysqli_connect("localhost","root","","rock-enroll");
$query = "SELECT * FROM notes WHERE channel='$channel' and title='$search'";
$res=mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($result))
    echo $row['link'];
}
else
echo "<script>alert('No notes found!')</script>";