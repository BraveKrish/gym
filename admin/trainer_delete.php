<?php
 require "config/db_connect.php";
 // id is from data: 
 $trainer_id = $_POST['id'];

 $sql = " delete from trainer_tbl where id = '$trainer_id' ";

 if(mysqli_query($conn,$sql)){
     echo 1;
 }else{
     echo 0;
 }


?>