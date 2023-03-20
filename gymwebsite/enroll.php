<?php
session_start();
  include "/xampp/htdocs/project/new/admin/config/db_connect.php";

  $id = $_GET['enroll'];
//   echo $id; exit;
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
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-7">
        <div  class="form my-5">
        <?php  if(isset($_GET['msg'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> <?php echo $_GET['msg'];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php }?>
            <h4>Become a member</h4>
        <form action="form_process.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label><b>Plan Name</b></label>
                <input type="text" class="form-control" name="plan" value="<?php echo $plan_name; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label><b>Package Type</b></label>
                    <select name="package" class="form-control">
                        <option selected>Choose...</option>
                        <option>Weight Gain</option>
                        <option>Weight Loss</option>
                    </select>
                </div>
                <!-- plan,package,fname,lname,email,contact,address,gender,start_date -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label><b>First Name</b></label>
                <input type="text" class="form-control" name="fname" placeholder="Enter name">
                </div>
                <div class="form-group col-md-6">
                <label><b>Last Name</b></label>
                <input type="text" class="form-control" name="lname">
                </div>
            </div>
            <div class="form-group">
                <label><b>Email</b></label>
                <input type="email" class="form-control" placeholder="Enter address" name="email">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><b>Contact</b></label>
                    <input type="text" class="form-control" name="contact" placeholder="Enter name">
                </div>
                <div class="form-group col-md-6">
                    <label><b>Address</b></label>
                    <input type="text" class="form-control" name="address" placeholder="Enter name">
                </div>
            </div>
            <b>Gender</b> 
            <div class="form-check">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="gender" value="Male">
                <label class="form-check-label">
                Male
                </label>
            </div>
            <div class="form-check">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="gender" value="Female">
                <label class="form-check-label">
                Female
                </label>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                <label><b>Select start date</b></label>
                <input type="date" class="form-control" name="start_date">
                </div>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Book</button>
        </form>
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