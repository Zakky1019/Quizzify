<?php

$connection=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($connection,"quizzifynew");

 $delete = $_GET['del'];

 $sql= "delete from dualuser where DUser_Id = '$delete'";

 if(mysqli_query($connection,$sql))
 {
     echo '<script>location.replace("dualuser1.php")<script>';
 }
 
 else 
 {
     echo "something Error: " . $connection-> error;
     
 }

 

?>
