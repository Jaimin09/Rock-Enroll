<?php
if(isset($_POST["email"])){
    session_start();

    $connection = mysqli_connect("localhost", "root", "", "rock-enroll");

    $email = $_POST["email"];
    $password = $_POST["password"];

    if($connection){

        $query = "SELECT * FROM login WHERE email='$email' AND password='$password'";

        $res=mysqli_query($connection,$query);
        if(mysqli_num_rows($res)>0){
            $user=mysqli_fetch_all($res,MYSQLI_ASSOC);
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            header("location: profile.html");
        }

        else{
            echo '<script>alert("Invalid username or password")</script>'; 
        }

    }
    else{
        echo '<script>alert("Session connection not established")</script>'; 
    }
}
?>
<html>
  <head>
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: white;
      }
      .box {
        background-color: white;
        border-radius: 10px;
        border: 1.5px solid #ccc;
        width: 400px;
        padding: 40px;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        transition: box-shadow 0.3s;
      }

      .box:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, 0.2);
      }

      .input {
        background: none;
        border: 3px solid darkcyan;
        margin: 10px;
        padding: 6px;
        width: 70%;
        border-radius: 24px;
        color: gray;
        text-align: center;
        transition: 0.3s;
      }

      .btn {
        background: none;
        border: 3px solid lightgreen;
        padding: 10px;
        border-radius: 24px;
        width: 40%;
        margin: 20px;
        color: gray;
      }

      .input:focus {
        width: 95%;
        transition: 0.3s;
        border-color: lightgreen;
      }

      .btn:hover {
        background-color: lightgreen;
        color: black;
      }

      h2 {
        color: #ccc;
      }
    </style>
  </head>
  <body>
    <div class="box container">
      <form action="login.php">
        <h2>LOGIN</h2>

        <input
          name="email"
          type="email"
          placeholder="E-mail"
          class="input"
          required
        />
        <input
          name="password"
          type="password"
          placeholder="Password"
          class="input"
          required
        />
        <br />
        <input type="submit" class="btn">Login</input>
      </form>
    </div>
  </body>
</html>
