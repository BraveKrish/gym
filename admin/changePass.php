<?php 
  require_once "../admin/config/db_connect.php";
  $sql1 = " select * from admin_tbl ";
  $query = mysqli_query($conn,$sql1);
  while($show = mysqli_fetch_assoc($query))
  $id = $show['id'];
  // echo $id;

  if(isset($_POST['changePass'])){
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $conPass = $_POST['conPass'];

    if($newPass == $conPass){
        $sql = " update admin_tbl set `password` = '$newPass' where id = $id ";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Password has been changed!!');</script>
        <script>window.open('index.php','_SELF');</script>";
    }else{
        echo "<script>alert('Password and confirm password not match');</script>
        <script>window.open('index.php','_SELF');</script>";
    }
  }

?>