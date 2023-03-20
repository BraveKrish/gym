<?php
 require "config/db_connect.php";
 $member_id = $_POST['id'];

 $sql = " delete from member_tbl where id = '$member_id' ";

 if(mysqli_query($conn,$sql)){
     echo 1;
 }else{
     echo 0;
 }


?>