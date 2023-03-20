<?php
   $conn = new mysqli('localhost','root','','gym_ms');
   if($conn->connect_error){
       echo "connection faild".mysqli_connect_error();
   }else{
      // echo "connected";
   }
?>