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
?>
<html>
  <head>
    <title>Profile</title>

    <style>
      .navbar {
        height: 15%;
        box-shadow: 0 0 11px rgba(33, 33, 33, 0.4);
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
        margin-left: 2%;
      }

      .nav-item:hover {
        background-color: darkcyan;
      }

      .nav-item:hover > a {
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
        margin-top: 13%;
      }

      .form-control {
        margin-top: 5%;
      }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-sm bg-light fixed-top">
      <a class="navbar-brand" href="#"><img src="logo.png" /></a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#if">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CHANNELS</a>
        </li>
      </ul>
    </nav>
    <div class="container">
      <br />
      <br />
      <div class="row">
        <div class="col-sm-6">
          <br />
          <form method="POST" action= "newnote.php">
          <input
            name="title"
            class="form-control"
            type="text"
            required
            placeholder="Title"
          />
          <input
            name="link"
            class="form-control"
            type="text"
            required
            placeholder="Enter your NOTE link here.."
          />
          <br />
          <br />

          <h5>Select Channels:</h5>
          <?php
            $connection=mysqli_connect("localhost","root","","rock-enroll");
            $sql="select channel.name from channels NATURAL JOIN channel where members='$email'";
            $result=mysqli_query($connection,$sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<div class='form-check'> <input name='channel' class='form-check-input' type='radio' value='' id='flexCheckDefault' />";
                    echo "<label class='form-check-label' for='flexCheckDefault'>";
                    echo $row["name"];
                    echo "</label>";
                    echo "</div>"; 
                }
            }
            ?>
          <div class="form-check">
            <input
               name="private"
              class="form-check-input"
              type="checkbox"
              value=""
              id="flexCheckChecked"
              checked
            />
            <label class="form-check-label" for="flexCheckChecked">
              <b>My Profile</b>
            </label>
          </div>

          <br />

          <button class="btn btn-primary btn-medium" type="submit">ADD</button>
        </form>
        </div>
        <div class="col-sm-6">
          <img src="note.png" />
        </div>
      </div>
    </div>
  </body>
</html>
