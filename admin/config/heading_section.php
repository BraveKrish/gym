<?php
//   if(!isset($_SESSION['uname'])){
//     header("location:login.php");
// }
?>
<!-- content section  -->
<section id="content">
       <div class="navigation">
           <div class="n1">
               <div class="title">
                   <h2>Welcome to Admin Dashboard<?php #echo $_SESSION['uname'];?> </h2>
               </div>
           </div>

           <div class="profile">
               <button id="logoutbtn"><a href="logout.php">Logout</a></button>
               <!-- <img src="../my.jpg" alt=""> -->
           </div>
       </div>