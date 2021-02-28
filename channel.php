<html>

<head>
    <title>
        Add note
    </title>


    <style>
        .navbar {
            height: 15%;
            box-shadow: 0 0 11px rgba(33, 33, 33, .4);
        }

        .nav-item a {
            color: darkcyan;
            font-weight: bold;
        }

        .nav-item {
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 10px;
            border: 3px solid darkcyan;
            margin-left: 1.5%;
        }

        .nav-item:hover {
            background-color: darkcyan;
        }

        .nav-item:hover>a {
            color: white;
        }

        .h1 {
            margin-top: 10%;

        }

        .col-sm-6 img {
            width: 100%;
            height: auto;
            float: right;

        }

        .row {
            margin-top: 11.5%;
            ;
        }

        .form-control {
            margin-top: 5%;
        }

        .list {
            text-align: center;
        }

        a {
            text-decoration: none;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light fixed-top">
        <a class="navbar-brand" href="#"><img src="logo.png" /></a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="profile.php">PROFILE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="channels.php">CHANNELS</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
     <div class="row">
         <div class="col-sm-4">
             <div class="input-group">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" />
    <label class="form-label" for="form1">Search</label>
  </div>
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>
         </div>
         <div class="col-sm-8"> 
             
         
         
            <!-- THIS CODE BELOW IS JAIMIN'S / aBOVE IS OF SHREYASH'S --> 




         <?php 
if (isset($_POST['submit'])){ 

$link = mysqli_connect("localhost", 
			"root", "", "rock-enroll"); 

$_SESSION['channel'] = $_POST["chnnl"];
$chn = $_SESSION['channel'];

// Check connection 
if($link === false){ 
	die("ERROR: Could not connect. "
		. mysqli_connect_error()); 
} 

// Escape user inputs for security 
$un= mysqli_real_escape_string( 
	$link, $_REQUEST['uname']); 
$m = mysqli_real_escape_string( 
	$link, $_REQUEST['msg']); 
date_default_timezone_set('Asia/Kolkata'); 
$ts=date('y-m-d h:ia'); 

// Attempt insert query execution 
$sql = "INSERT INTO chats (uname, msg, dt, channel) 
		VALUES ('$un', '$m', '$ts', '$chn')"; 
if(mysqli_query($link, $sql)){ 
	; 
} else{ 
	echo "ERROR: Message not sent!!!"; 
} 
// Close connection 
mysqli_close($link); 
} 
?> 
<html> 
<head> 
<style> 
*{ 
	box-sizing:border-box; 
} 
body{ 
	background-color:#abd9e9; 
	font-family:Arial; 
} 
#container{ 
	width:500px; 
	height:700px; 
	background:white; 
	margin:0 auto; 
	font-size:0; 
	border-radius:5px; 
	overflow:hidden; 
} 
main{ 
	width:500px; 
	height:700px; 
	display:inline-block; 
	font-size:15px; 
	vertical-align:top; 
} 
main header{ 
	height:100px; 
	padding:30px 20px 30px 40px; 
	background-color:#622569; 
} 
main header > *{ 
	display:inline-block; 
	vertical-align:top; 
} 
main header img:first-child{ 
	width:24px; 
	margin-top:8px; 
} 
main header img:last-child{ 
	width:24px; 
	margin-top:8px; 
} 
main header div{ 
	margin-left:90px; 
	margin-right:90px; 
} 
main header h2{ 
	font-size:25px; 
	margin-top:5px; 
	text-align:center; 
	color:#FFFFFF; 
} 
main .inner_div{ 
	padding-left:0; 
	margin:0; 
	list-style-type:none; 
	position:relative; 
	overflow:auto; 
	height:500px; 
	background-image:url( 
https://media.geeksforgeeks.org/wp-content/cdn-uploads/20200911064223/bg.jpg); 
	background-position:center; 
	background-repeat:no-repeat; 
	background-size:cover; 
	position: relative; 
	border-top:2px solid #fff; 
	border-bottom:2px solid #fff; 
	
} 
main .triangle{ 
	width: 0; 
	height: 0; 
	border-style: solid; 
	border-width: 0 8px 8px 8px; 
	border-color: transparent transparent 
	#58b666 transparent; 
	margin-left:20px; 
	clear:both; 
} 
main .message{ 
	padding:10px; 
	color:#000; 
	margin-left:15px; 
	background-color:#58b666; 
	line-height:20px; 
	max-width:90%; 
	display:inline-block; 
	text-align:left; 
	border-radius:5px; 
	clear:both; 
} 
main .triangle1{ 
	width: 0; 
	height: 0; 
	border-style: solid; 
	border-width: 0 8px 8px 8px; 
	border-color: transparent 
	transparent #6fbced transparent; 
	margin-right:20px; 
	float:right; 
	clear:both; 
} 
main .message1{ 
	padding:10px; 
	color:#000; 
	margin-right:15px; 
	background-color:#6fbced; 
	line-height:20px; 
	max-width:90%; 
	display:inline-block; 
	text-align:left; 
	border-radius:5px; 
	float:right; 
	clear:both; 
} 

main footer{ 
	height:150px; 
	padding:20px 30px 10px 20px; 
	background-color:#622569; 
} 
main footer .input1{ 
	resize:none; 
	border:100%; 
	display:block; 
	width:120%; 
	height:55px; 
	border-radius:3px; 
	padding:20px; 
	font-size:13px; 
	margin-bottom:13px; 
} 
main footer textarea{ 
	resize:none; 
	border:100%; 
	display:block; 
	width:140%; 
	height:55px; 
	border-radius:3px; 
	padding:20px; 
	font-size:13px; 
	margin-bottom:13px; 
	margin-left:20px; 
} 
main footer .input2{ 
	resize:none; 
	border:100%; 
	display:block; 
	width:40%; 
	height:55px; 
	border-radius:3px; 
	padding:20px; 
	font-size:13px; 
	margin-bottom:13px; 
	margin-left:100px; 
	color:white; 
	text-align:center; 
	background-color:black; 
	border: 2px solid white; 
} 
} 
main footer textarea::placeholder{ 
	color:#ddd; 
} 

</style> 
<body onload="show_func()"> 
<div id="container"> 
	<main> 
		<header> 
			<img src="https://s3-us-west-2.amazonaws.com/ 
			s.cdpn.io/1940306/ico_star.png" alt=""> 
			<div> 
				<h2>GROUP CHAT</h2> 
			</div> 
			<img src="https://s3-us-west-2.amazonaws.com/ 
			s.cdpn.io/1940306/ico_star.png" alt=""> 
		</header> 

<script> 
function show_func(){ 

var element = document.getElementById("chathist"); 
	element.scrollTop = element.scrollHeight; 

} 
</script> 

<form id="myform" action="channel.php" method="POST" > 
<div class="inner_div" id="chathist"> 
<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db_name = "rock-enroll"; 
$con = new mysqli($host, $user, $pass, $db_name); 

$query = "SELECT * FROM chats"; 
$run = $con->query($query); 
$i=0; 

while($row = $run->fetch_array()) : 
if($i==0){ 
$i=5; 
$first=$row; 
?> 
<div id="triangle1" class="triangle1"></div> 
<div id="message1" class="message1"> 
<span style="color:white;float:right;"> 
<?php echo $row['msg']; ?></span> <br/> 
<div> 
<span style="color:black;float:left; 
font-size:10px;clear:both;"> 
	<?php echo $row['uname']; ?>, 
		<?php echo $row['dt']; ?> 
</span> 
</div> 
</div> 
<br/><br/> 
<?php 
} 
else
{ 
if($row['uname']!=$first['uname']) 
{ 
?> 
<div id="triangle" class="triangle"></div> 
<div id="message" class="message"> 
<span style="color:white;float:left;"> 
<?php echo $row['msg']; ?> 
</span> <br/> 
<div> 
<span style="color:black;float:right; 
		font-size:10px;clear:both;"> 
<?php echo $row['uname']; ?>, 
		<?php echo $row['dt']; ?> 
</span> 
</div> 
</div> 
<br/><br/> 
<?php 
} 
else
{ 
?> 
<div id="triangle1" class="triangle1"></div> 
<div id="message1" class="message1"> 
<span style="color:white;float:right;"> 
<?php echo $row['msg']; ?> 
</span> <br/> 
<div> 
<span style="color:black;float:left; 
		font-size:10px;clear:both;"> 
<?php echo $row['uname']; ?>, 
	<?php echo $row['dt']; ?> 
</span> 
</div> 
</div> 
<br/><br/> 
<?php 
} 
} 
endwhile; 
?>                                 

</div> 
	<footer> 
		<table> 
		<tr> 
		<th> 
			<input class="input1" type="text"
					id="uname" name="uname"
					placeholder="From"> 
		</th> 
		<th> 
			<textarea id="msg" name="msg"
				rows='3' cols='50'
				placeholder="Type your message"> 
			</textarea></th> 
		<th> 
			<input class="input2" type="submit"
			id="submit" name="submit" value="send"> 
		</th>				 
		</tr> 
		</table>				 
	</footer> 
</form> 
</main>	 



                <!-- JAIMIN'S CHAT CODE ENDS HERE --> 




</div> 

</body> 
</html> 

         </div>
     </div>  
    </div>




</body>

</html>