<?php
include "config.php";
// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    //exit;
}else{
    $username = $_SESSION['username'];
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
            var nombre = "<?php echo $username; ?>";
            document.getElementById("name2r").innerHTML = nombre;
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
                <a href="user.php">
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
            <a>Welcome!</a>
        </div>
        <div class="name_usr">
            <span id="name2r"></span>
        </div>
    </div>
</body>
</html>