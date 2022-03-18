<?php
include "config.php";
$sql = "INSERT INTO posts (id,parent_comment,user,post) VALUES (NULL, '','perro','HOLA')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
}/* else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}*/
// Close connection
mysqli_close($link);
?>