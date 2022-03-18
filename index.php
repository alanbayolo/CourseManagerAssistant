<?php
//call for the config file
include "config.php";
//initialize the session
session_start();
error_reporting(0);

if(isset($_SESSION["username"])){
  header("Location: dashboard.php");
}
//desperate testing

//end of it
if(isset($_POST["submit"])){
  $username=$_POST["username"];
  $password=$_POST["password"];

  $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result= mysqli_query($link, $sql);
  //echo "<script>alert('Por aqui!')</script> $username $password";
  if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: dashboard.php");
  } else{
    echo "<script>alert('Password or email incorrect!')</script>";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CGA</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" type="image/x-icon" href="resources\favicon.ico" />

    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div class="container">
        <div class="top-header">
          <h2>course manager</h2>
          <h3>Groupwork Assistant</h3>
        </div>
        <form action="" method="POST">
          <div class="user">
            <i class="bx bxs-user-circle"></i>
            <input type="text" name="username" placeholder="Enter your username" value="<?php echo $email; ?>" required />
          </div>
          <div class="pass">
            <i class="bx bxs-lock-alt"></i>
            <input type="password" name="password" placeholder="Enter your password" value="<?php echo $_POST['password']; ?>" required />
          </div>
          <div class="btn">
            <button name="submit">Login</button>
          </div>
        </form>
        <div class="resetlnk">
            <p class="last"><a href="#"> Reset Password </a></p>
        </div>
    </div>
</body>
</html>