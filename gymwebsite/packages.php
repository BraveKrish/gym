<?php
session_start();
  include "/xampp/htdocs/project/new/admin/config/db_connect.php";

//   if(!isset($_SESSION['userdata'])){
//      header("location:index.php");
//   }

//   $userdata = $_SESSION['userdata'];
//   //$usersData = $_SESSION['usersData'];
//    // print_r($userdata);
//    // echo $userdata['last_name'];

//   $id = $userdata['id'];
//   //echo $id;

//   $sql = " select * from memberlist where id = '$id' ";
//   $result = mysqli_query($conn,$sql);
//   $num = mysqli_num_rows($result);

//   while($show = mysqli_fetch_assoc($result))
//    $status=$show['status'];

  $id = $_GET['package'];
  // echo $id;
  $sql = " select * from plan_tbl where id='$id' ";
  $result = mysqli_query($conn,$sql);
  
  //  `id`, `plan_id`, `plan_name`, `duration`, `price`, `description`
  while($show = mysqli_fetch_assoc($result)){
    $tid = $show['id'];
    $plan_id = $show['plan_id'];
    $plan_name = $show['plan_name'];
    $duration = $show['duration'];
    $price = $show['price'];
    $description = $show['description'];

    // echo $plan_name;
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
    <link rel="stylesheet" href="assets/fa/all.min.css">
    <link rel="stylesheet" href="assets/fa/fontawesome.min.css">
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
   #details .sub-details li{
    list-style: none;
    padding-left: 3px;
    margin-left: 5px;
   }
   #details .sub-details{
     padding: 8px 10px;
    }
  #details .sub-details li i{
      padding: 0 3px;
      color: rgb(32, 7, 255);  
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
    <section id="details">
      <!-- style="max-width: 540px;" -->
        <div style="margin-top: 10%;" class="container my-3">
          
            <div style="border:2px solid red; box-shadow:3px 5px 3px 4px black;" class="card mb-3 my-5">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img style="max-width: 350px; overflow:hidden; border-radius:4px;" src="assets/images/slid.jpg"  class="img-fluid" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                  <!-- //  `id`, `plan_id`, `plan_name`, `duration`, `price`, `description` -->
                    <h4 class="card-title"><?php echo $plan_name;?></h4>
                    <p style="font-size: 22px;" class="card-text"><?php echo $description;?></p>
                  </div>
                  <div class="sub-details">
                      <p>Available Package</p>
                      <li><i class="fas fa-check"></i>Weight Lifting</li>
                  <li><i class="fas fa-check"></i>Weight Gain/Loss</li>
                  <?php if($plan_id!='P01') { ?>
                  <li><i class="fas fa-check"></i>Cardio</li>
                  <?php if($plan_id!='P02') { ?>
                    <?php if($plan_id!='P03') { ?>
                  <li><i class="fas fa-check"></i>yoga</li>
                  <li><i class="fas fa-check"></i>Personal Training</li>
                  <?php } ?>
                  <?php } ?>
                  <?php if($plan_id=='P03') { ?>
                  <li><i class="fas fa-check"></i>Massage</li>
                  <?php } ?>
                  <li><i class="fas fa-check"></i>Zumba</li>
                  
                  <?php } ?>
                </div>
                  <div style="margin: 30px 0;">
                      <a href="index.php"><button class="btn btn-success">Inquiry</button></a>
                      <a href="enroll.php?enroll=<?php echo $id;?>"><button class="btn btn-info">Became member</button></a>
                  </div>
                </div>
              </div>
            </div>

            
        </div>
    </section>
    <!-- footer content -->
<section>
  <footer>
     <div class="footer-content">
      <h3>FitXClub</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam.</p>
      <ul class="socials">
        <li><a href="#">Home</a></li>
        <li><a href="loginPage.php">Login</a></li>
      </ul>
     </div>
     <div class="footer-body">
        <p>copyright &copy;2022 <span>Develop by</span> Krishna Parajuli</p>
     </div>
  </footer>
<script src="assets/jquery/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>