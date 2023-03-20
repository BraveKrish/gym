<?php
   session_start();
   require_once "../admin/config/db_connect.php";
   if(isset($_POST['login'])){
       $username = $_POST['username'];
       $password = $_POST['password'];
       $loginType = $_POST['login_type'];
       //echo $loginType;
       if($loginType == 'admin'){
           $sql = " select * from admin_tbl where username = '$username' && password = '$password' ";
           $result = mysqli_query($conn,$sql) or die("query faild");
           
           $num = mysqli_num_rows($result);
           //echo $num;
           if($num > 0){
            $_SESSION['uname'] = $username;
            echo '<script>alert("Login Success")</script>
            <script>window.open("index.php","_SELF")</script>';
           }else{
            echo '<script>alert("Login faild")</script>
            <script>window.open("login.php","_SELF")</script>';
           }
       }else{
        echo '<script>alert("Error: Invalid Login")</script>
        <script>window.open("login.php","_SELF")</script>';
       }
   }
?>