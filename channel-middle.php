<?php
session_start();

$_SESSION['channel'] = $_POST['chnnl'];
header("location: channel.php");

?>