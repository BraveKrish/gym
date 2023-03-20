<?php 
   require_once "../admin/config/db_connect.php";
   
   $id=$_GET['sid'];
   $status=$_GET['status'];
//    echo $id.'<br>';
//    echo $status;
   
   $sql=" update enroll set status='$status' where id='$id' ";
   $result=mysqli_query($conn,$sql);
   if($result){
    header("location:request.php");
   }

?>