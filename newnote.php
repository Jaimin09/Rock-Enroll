<?php
session_start();
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
          <a class="nav-link" href="profile.php">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="channels.php">CHANNELS</a>
        </li>
      </ul>
    </nav>
    <div class="container">
      <br />
      <br />
      <div class="row">
        <div class="col-sm-6">
          <br />
          <?php
          echo '<form method="POST" action= "addnote.php">';
          echo '<input
            name="title"
            class="form-control"
            type="text"
            required
            placeholder="Title"
          />';
          echo '<input
            name="link"
            class="form-control"
            type="text"
            required
            placeholder="Enter your NOTE link here.."
          />
          <br />
          <br />';

          echo '<h5>Select Channels:</h5>';
          $email=$_SESSION['email'];
            $connection=mysqli_connect("localhost","root","","rock-enroll");
            $sql="select channel.name from channels NATURAL JOIN channel where members='$email'";
            $result=mysqli_query($connection,$sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $name=$row['name'];
                    echo "<div class='form-check'> <input class='form-check-input' type='radio' name='channel' id='flexCheckDefault' value='$name' />";
                    echo "<label class='form-check-label' for='flexCheckDefault'>";
                    echo $name;
                    echo "</label>";
                    echo "</div>"; 
                }
            }
            
          echo '<div class="form-check">
            <input
               name="private"
              class="form-check-input"
              type="checkbox"
              value=""
              id="flexCheckChecked"
              checked
            />';
            echo '<label class="form-check-label" for="flexCheckChecked">
              <b>My Profile</b>
            </label>
          </div>
          <br />';

          echo '<button class="btn btn-primary btn-medium" type="submit">ADD</button>
        </form>';
        ?>
        </div>
        <div class="col-sm-6">
          <img src="note.png" />
        </div>
      </div>
    </div>
  </body>
</html>
