<?php
 require "config/db_connect.php";
 // id is from data: 
 $plan_id = $_POST['id'];

 $sql = " delete from plan_tbl where id = '$plan_id' ";

 if(mysqli_query($conn,$sql)){
     echo 1;
 }else{
     echo 0;
 }


?>