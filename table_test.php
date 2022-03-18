<?php
include "config.php";
// Initialize the session
error_reporting(0);
session_start();

//defining array
$posts = array();
$sql="SELECT * FROM posts ORDER BY id desc";
$result= mysqli_query($link, $sql);
if(mysqli_query($link, $sql)){
    if($result->num_rows > 0){
        while($row = $result-> fetch_assoc()){
            //storing the rows of the data base while selecting the rows of interest and formatting with the HTML table tags
           array_push($posts,"<tr><td>" . $row['user'] . "</td><td>" . $row['post'] . "</td><td>" . $row['date'] . "</td><tr>");
        }
   } else {
       echo "No Results";
   }
}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CGA</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<!--Style-->
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<!--script-->
    <script>
        function LoadPosts(){
            var PastPosts = <?php echo json_encode($posts); ?>; //sending the php array to javascript with json encoding
            document.getElementById("loadtable").innerHTML = PastPosts.join("");    //joining the array into a single line and substituting the element with id "loadtable"
        }
    </script>
<!--end script-->
</head>
<body onload="LoadPosts()">
    <table class="table" id="">
        <tbody id="loadtable">
        </tbody>
    </table>
</body>
</html>