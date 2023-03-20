<?php
require "config/db_connect.php";
$package_id = $_POST['id'];

$sql = " delete from package_tbl where id = '$package_id' ";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}


?>


