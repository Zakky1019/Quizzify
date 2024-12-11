<?php

$connection=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($connection,"quizzify");

 $delete = $_GET['del'];

 $sql= "delete from user where User_Id = '$delete'";
 

 if(mysqli_query($connection,$sql))
 {
     echo '<script>location.replace("index.php")<script>';
     
 }
 
 else 
 {
     echo "something Error: " . $connection-> error;
     
 }

 

?>

 