<?php
session_start();
  include "/xampp/htdocs/project/new/admin/config/db_connect.php";

  if(!isset($_SESSION['userdata'])){
     header("location:index.php");
  }

  $userdata = $_SESSION['userdata'];
  //$usersData = $_SESSION['usersData'];
   // print_r($userdata);
   // echo $userdata['last_name'];

  $id = $userdata['id'];
  //echo $id;

  $sql = " select * from memberlist where id = '$id' ";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);

  while($show = mysqli_fetch_assoc($result))
   $status=$show['status'];
 
  

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
                        <h3 style="color:black;"><?php echo $userdata['first_name'].' '.$userdata['last_name'];?></h3>
                        </div>
                        <div id="list">
                            <ul>
                                <li><a href="changePassword.php">Change Password</a></li>
                                <!-- <li><a href="">Setting</a></li> -->
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-5">
                <div class="card mb-3 content">
                    <h2 class="m-3 pt-3">About Me</h2>
                    <div class="card-body details">
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Name:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['first_name'].' '.$userdata['last_name'];?>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Email:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['email'];?>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Trainer:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['trainer_id'];?>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Package:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['package_id'];?>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Plan:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['plan_id'];?> Months
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Start Date:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['start_date'];?>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Total Days:</h6>
                            </div>
                            <div class="col-9">
                            <?php echo $userdata['total_days'];?> Days
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>My Membership:</h6>
                            </div>
                            <div class="col-9">
                             <?php if($status == "Active") {
                                  echo '<p style="color:blue; font-weight:bold;">'.$status.'</p>'; 
                            }else{
                                  echo '<p style="color:red; font-weight:bold;">'.$status.'</p>';
                            }
                            ?>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 2px solid red;">
                            <div class="col-3">
                                <h6>Paid Amount:</h6>
                            </div>
                            <div class="col-9">
                            <p style="color:black; font-weight:bold;">Rs <span style="color: red; font-weight:bold;"><?php echo $userdata['total_amount'];?></span> </p>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================== about section ======================== -->

<!-- ============================== about section end ======================== -->
<script src="assets/jquery/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>