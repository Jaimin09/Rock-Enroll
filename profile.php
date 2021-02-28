<?php
    session_start();
?>
<html>
   <head>
       <title>
           Profile
       </title>
       
  
  <style>
      .navbar{
          height: 15%;
          box-shadow: 0 0 11px rgba(33,33,33,.4);
      }
      
      .nav-item{
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
      
      .nav-item:hover > a{
          color: white;
      }

	  .nav-item a{
		  color: darkcyan;
		  font-weight: bold;
	  }

      .h1{
         margin-top: 8.5%;
      }
     
     .todo{
         border: 2px solid #ccc;
         border-radius: 5px;
         height: 55%;
		 overflow:scroll;
     }
	 

     .mynotes{
         text-align: center;
         margin-top: 1.5%;
     }

body{
	font-family:arial,sans-serif;
	font-size:100%;
	margin:1em;
	background:#404040;
	color:#fff;
}
.title{
	font-family: 'Rock Salt', cursive;

}
h2,p{
	font-size:100%;
	font-weight:normal;
}
ul,li{
	list-style:none;
}
ul{
	overflow:hidden;
	padding:3em;
}
ul li div.content{
	text-decoration:none;
	color:#000;
	display:block;
	height:100%;
}
ul li{
	margin:1em;
	float:left;
}
ul li h2{
	font-size:140%;
	font-weight:bold;
	padding-bottom:10px;
}
ul li p{
	font-family:"Reenie Beanie",arial,sans-serif;
	font-size:100%;
}



form {
	width: 90%;
	margin:  auto;
	border-radius: 5px;
	padding: 10px;
	border: 2px solid silver;
	font-size: 10px;
	background-color: #ededed;

}
form p {
	color: red;
	margin: 0px;
	font-size: 10px;
}
.task_input {
	width: 90%;
	height: 30px;
	padding: 2px 20px;
	border: 2px solid darkcyan;
	border-radius: 5px;
	font-family: 'Handlee', cursive;
  font-size: 16px;

}
.add_btn {
	height: 30px;
	background: darkcyan ;
	color: 	white;
	padding: 5px 20px;
	border-style: none;
	border-radius: 7px;
}

table {
	width:80%;
}


/* Style the list items */
td {
	cursor: pointer;
	position: relative;
	padding: 1px 8px 1px 8px;
	list-style-type: none;
	font-size: 12px;
	transition: 0.2s;
	text-align: left;


	/* make the list items unselectable */
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}


/* Set all odd list items to a different color (zebra-stripes) */
 td.task:nth-child(odd) {
	 color: red;
	 border-style: hidden;
	 font-family: 'Handlee', cursive;

}

/* Darker background-color on hover */
td:hover {
	background:silver ;
}

/* When clicked on, add a background color and strike out text */
td.checked {
	background: #888;
	color: #fff;
	text-decoration: line-through;
}


/* Add a "checked" mark when clicked on */
td.checked::before {
	content: '';
	position: absolute;
	border-color: #fff;
	border-style: solid;
	border-width: 0 2px 2px 0;
	top: 10px;
	left: 16px;
	transform: rotate(45deg);
	height: 15px;
	width: 7px;
}

/* Style the close button */
.close {
	position: absolute;
	right: 0;
	top: 0;
	padding: 12px 16px 12px 16px;
}

.close:hover {
	background-color: #f44336;
	color: white;
}
thead{
	text-align: center;
}
td.action{
	color:red;
}
td.task{
	font-family: 'Handlee', cursive;

}

.title b{
	color: gray;
}

.row ul{
	width:100%;

}

 .row ul li{
	width:100%;

}  
   
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
</head>
    <body>
        <?php
      // initialize errors variable
    $errors = "";

    // connect to database
    $db = mysqli_connect("localhost", "root", "", "rock-enroll");

    // insert a quote if submit button is clicked
    if (isset($_POST['submit'])) {
      if (empty($_POST['task'])) {
        $errors = "*You must fill in the task";
        //unset($_POST['submit']);
      }else{
        $task = $_POST['task'];
        $sql = "INSERT INTO todo (task) VALUES ('$task')";
        mysqli_query($db, $sql);
        unset($_POST);
        unset($_REQUEST);
        //$_POST=array();
        header('location: profile.php');
      }
    }
    if (isset($_GET['del_task'])) {
  $id = $_GET['del_task'];

  mysqli_query($db, "DELETE FROM todo WHERE id='$id'");
  header('location: profile.php');
}

?>
       <nav class="navbar navbar-expand-sm bg-light fixed-top">
  <a class="navbar-brand" href="#"><img src="logo.png"/></a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">PROFILE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="channels.php">CHANNELS</a>
    </li>
  </ul>
</nav>
<div class="container h1">
    <?php
    //session_start();
    if(isset($_SESSION['username']));
    echo "<h1>Hello ".$_SESSION["username"]."!!</h1>";
    ?>
</div>
<div class="container todo">
<div class="container x">

  <div class="row justify-content-center">

      <ul>
      <li>

          <div class="content">

            <p class="title"><b>TO DO LIST:</b></p>

            <form method="POST" action="profile.php" class="input_form">
              <?php if (isset($errors)) { ?>
          	<p><?php echo $errors; ?></p>
          <?php } ?>

          		<input type="text" name="task" class="task_input">
          		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>

          	</form>
            <center>
            <table>
            	<thead>
                    <tr>
            			<th>No.</th>
            			<th>Tasks</th>
            			<th style="width: 60px;">Action</th>
            		</tr>
            	</thead>

            	<tbody>
            		<?php
            		// select all tasks if page is visited or refreshed
            		$tasks = mysqli_query($db, "SELECT * FROM todo");

            		$i = 1;
                    while ($row = mysqli_fetch_array($tasks)) { ?>
            			<tr>
            				<td class="number" width="10"> <?php echo $i; ?> </td>
            				<td class="task"> <?php echo $row['task']; ?> </td>
            				<td class="action">
            					<a href="profile.php?del_task=<?php echo $row['id'] ?>" >Remove</a>
            				</td>
            			</tr>
            		<?php $i++; } ?>
            	</tbody>
            </table></center>
            </div>
          </div>
      </li>
    </ul>
</div>
</div>
</div>
<script>
// Add a "checked" symbol when clicking on a list item
$(function(){
  var $curParent, Content;
  $(document).delegate("td.task","click", function(){
    if($(this).closest("s").length) {
      Content = $(this).parent("s").html();
      $curParent = $(this).closest("s");
      $(Content).insertAfter($curParent);
      $(this).closest("s").remove();
    }
    else {
      $(this).wrapAll("<s />");
    }
  });
});


</script>

</div>

<div class="container mynotes">
    <button class="btn btn-lg btn-primary">My Notes</button>
    <a href="newnote.php"><button class="btn btn-lg btn-primary">Add New </button></a>

</div>



        
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>