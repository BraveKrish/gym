<?php
session_start();
  include "/xampp/htdocs/project/new/admin/config/db_connect.php";
  $userdata = $_SESSION['userdata'];
  //print_r($userdata);
  
  if(isset($_POST['changePass'])){
    $id =  $userdata['id'];
    $oldPass = $_POST['oldPass'];
    $newPassword = $_POST['newPassword'];
    $conpass = $_POST['conPassword'];

    if($newPassword == $conpass){
      $sql = " update member_tbl set `password` = '$newPassword' where id = '$id' ";
      //echo $sql; exit;
      $runQuery = mysqli_query($conn,$sql);
      echo '<script>alert("Password has been changed!!");
      window.location = "changePassword.php";
      </script>';
    }else{
      echo '<script>alert("New password and confirm password not matched!!");
      window.location = "changePassword.php";
      </script>';
    }


  }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>GMS</title>
<style>
   .container .mains .details .row{
    padding: 10px;
   }
   .container .mains .profile img{
      padding: 10px;
      margin-left: 20px;
   }
   .container .mains #list ul{
      list-style: none;
   }
   .container .mains #list ul li{
      padding: 10px 25px;
   }
   .container .mains #list a{
      text-decoration: none;
      color: black;
      font-weight: bold;
      font-size: 18px;
   }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
          <a class="navbar-brand" href="index.php">
              <!-- <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"> -->
              Fit<span>Club</span>
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- navigation bar -->
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#service">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contactUs" >Contact</a>
              </li>
              <?php if(isset($_SESSION['email'])){?>
              <li class="nav-item">
                <a class="nav-link" href="myProfile.php" >My Profile</a>
              </li>
              <?php }?>
            </ul>
            
          </div>
        </div>
    </nav>
    
<div class="container">
    <div class="mains">
        <div class="row">
            <div class="col- mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="profile">
                        <!-- <img src="../my.jpg" class="rounded-circle" width="150" alt=""> -->
                        <h3>Krishna Parajuli</h3>
                        </div>
                        <div id="list">
                            <ul>
                                <li><a href="changePassword.php">Change Password</a></li>
                                <li><a href="myProfile.php">My Profile</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-5">
                <div class="card mb-3 content">
                    <h2 class="m-3 pt-3">About You</h2>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="col">
                                <div class="form-group">
                                    <label><b>Old Password</b></label>
                                    <input class="form-control" type="text" name="oldPass">
                                </div>
                                <div class="form-group">
                                    <label><b>New Password</b></label>
                                    <input class="form-control" type="text" name="newPassword">
                                </div>
                                <div class="form-group">
                                    <label><b>Confirm Password</b></label>
                                    <input class="form-control" type="text" name="conPassword">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="changePass" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/jquery/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>