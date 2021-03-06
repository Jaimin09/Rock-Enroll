<?php
session_start();
?>
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

        .list{
            text-align: center;
        }

         a{
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
                <a class="nav-link" href="#">CHANNELS</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <img src="channels.png" />
            </div>
            <div class="col-sm-6 list">
                <ul class="list-group">
                    <?php
                    $email=$_SESSION['email'];
                    $connection=mysqli_connect("localhost","root","","rock-enroll");
                    $sql="select * from channels NATURAL JOIN channel where members='$email'";
                    $result=mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        echo "<form method = 'POST' action = 'channel-middle.php'  >";
                        while($row=mysqli_fetch_assoc($result))
                        {
                            echo '<input type = "radio" name = "chnnl" value = '.$row['code'].'><label>'.$row['name'].'</label></br>';
                        }
                        echo "<button type ='submit'>Join</button></form>";
                    }
                    ?>
                
                </ul>
                <br/>
                <a href="joinchannel.html"><button class="btn btn-lg btn-primary">Join New Channel</button></a>
                <a href="createchannel.html"><button class="btn btn-lg btn-primary">Create New Channel</button></a>
            </div>


        </div>
    </div>
</body>
</html>