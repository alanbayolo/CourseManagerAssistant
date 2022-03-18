<?php
include "config.php";
// Initialize the session
error_reporting(0);
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    //exit;
}else{
    $username = $_SESSION['username'];
    $sql="SELECT * FROM users WHERE username='$username'";
    $result= mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $email = $_SESSION['email'];
}

if(isset($_POST["submit"])){
    $newemail=$_POST["newemail"];
    $newpassword=$_POST["newpassword"];
  
    $sql="SELECT * FROM users WHERE username='$username'";
    $result= mysqli_query($link, $sql);
    //echo "<script>alert('Por aqui!')</script> $username $password";
    if($result->num_rows > 0){
        if($newemail == "" && $newpassword != ""){
            $sql = "UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`username` = '$username'";
            $result= mysqli_query($link, $sql);
        } elseif($newemail != "" && $newpassword == ""){
            $sql = "UPDATE `users` SET `email` = '$newemail' WHERE `users`.`username` = '$username'";
        $result= mysqli_query($link, $sql);
        } elseif($newemail != "" && $newpassword != ""){
            $sql = "UPDATE `users` SET `email` = '$newemail', `password` = '$newpassword' WHERE `users`.`username` = '$username'";
            $result= mysqli_query($link, $sql);
        }

        if($result){
            $newemail="";
            $newpassword="";
            header("Location: user.php");
        }else{
            echo "<script>alert('Failed to POST')</script>";

        }
    } else{
      echo "<script>alert('Request Failed')</script>";
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

    <link rel='stylesheet' type='text/css' media='screen' href='dshbstyle.css'>
    <script src='main.js'></script>

    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet"> 
//script
    <script>
        function namer(){
            var nombre = "<?php echo $email; ?>";
            document.getElementById("name2ra").innerHTML = nombre;
        }
    </script>
//end script
</head>
<body onload="namer()">
    <div class="sidebar">
        <div class="logo_content">
            <a href="dashboard.php">
                <div class="logo">
                    <div class="logo_img">
                        <img src="resources/logo.svg" style="width: 100%; height: auto;">
                    </div>
                </div>
            </a>
        </div>
        <div class="section_content">
            <div class="section">
                <div class="section_box">
                    <p>COMP 5531</p>
                <p>Winter 22 | Section NN</p>
                </div>
            </div>
        </div>
        <ul class="nav_list">
            <li>
                <a href="#">
                    <i class='bx bx-library'></i>
                    <span class="links_name">Course Material</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-window-open'></i>
                    <span class="links_name">Assignments</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-group'></i>
                    <span class="links_name">Group</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-at'></i>
                    <span class="links_name">Contact</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user-circle'></i>
                    <span class="links_name">User</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="home_content">
        <div class="text">
            <p>current email:&nbsp;</p>
            <span id="name2ra"></span>
        </div>
        <div class="name_usr">
        </div>
        <!-- add line to show current email-->
        <div class="container_user_a">
            <div class="top_a">
                <h2>Change email</h2>
            </div>
            <div class="bottom_a">
                <form action="" method="POST">
                    <div class="email">
                        <input type="email" name="newemail" placeholder="Enter the new email">
                    </div>
                    <div class="btn">
                        <button name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container_user_b">
            <div class="top_b">
                <h2>Change password</h2>
            </div>
            <div class="bottom_b">
                <form action="" method="POST">
                    <div class="change_pass">
                        <input type="text" name="newpassword" placeholder="Enter the new password">
                    </div>
                    <div class="btn">
                        <button name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>