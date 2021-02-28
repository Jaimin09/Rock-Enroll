<?php
session_start();
?>
<html>
<head>
    <title>
        My notes
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
        <a class="navbar-brand" href="profile.php"><img src="logo.png" /></a>
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
        <br>
        <br>
        <div class="row">
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-6 list">
                <h3>My saved notes:</h3>
                <br/>
                <ul class="list-group">
                    <?php
                    $email=$_SESSION['email'];
                    $connection=mysqli_connect("localhost","root","","rock-enroll");
                    $sql="select * from notes where email='$email' and private='1'";
                    $result=mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $link=$row['link'];
                            $author=$row['author'];
                            $title=$row['title'];
                            echo "<a href=$link>";
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.$title.'
                            <span class="badge  badge-pill">'.$author.'</span>
                        </li>';
                        echo "</a>";
                        }
                    }
                ?>
                </ul>
                <br />
                <img src="mynotes.png"/>
            </div>
            <div class="col-sm-3">
            
            </div>


        </div>
    </div>
</body>
</html>