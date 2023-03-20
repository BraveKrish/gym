<?php
session_start();
  include "/xampp/htdocs/project/new/admin/config/db_connect.php";
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
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
          <a class="navbar-brand" href="index.php">
              <!-- <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"> -->
              <img style="border-radius: 3px;" height="40px" src="../download.png" alt="">
              FitX<span>Club</span>
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
            <!-- <div id="navLogBtn">
              <button><a href="loginPage.php">Login</a></button>
            </div> -->
            
          </div>
        </div>
    </nav>

  <!-- ====================================== main section =========================== -->

    <section class="main d-flex align-item-center">
        <div class="text-container">
            <p>Be Strong, Be Fit</p>
            <h2>Best Fitness Club in <span class="text-info">ITAHARI</span> Now</h2>
            <p class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti aspernatur expedita aut.</p>
            <a href="loginPage.php"><button class="btn join">Login</button></a>
          
        </div>
    </section>
  <!-- ====================================== main section end =========================== -->


  <!-- =================== Our services  card section =================== -->
    <section id="service">
      <div class="container">
        <div class="servies">
          <h3 style="padding-top:20px;">OUR <span style="color: rgb(0,166,81);">SERVICES</span> </h3>
        </div>
        <hr style="background-color: rgb(0,166,81); height: 3px;">
        <div class="row">
        
        <?php
             $sql = " select * from our_services ";
             $result = mysqli_query($conn,$sql);
           
             $num = mysqli_num_rows($result);
             //echo $num;
             if($num > 0){
               while($show = mysqli_fetch_assoc($result)){
                    $title = $show['title'];
                    $description = $show['description'];
                    $photo = $show['photo'];

                   // echo $photo;
        ?>
          <div class="col-3">
            <div class="card mb-4">
              <!-- E:\xampp\htdocs\project\new\admin\CompanyProfile\uploaded_img -->
               <img style="height: 200px;" src="<?php echo "../admin/CompanyProfile/uploaded_img/".$photo; ?>" class="card-img-top">
               <div class="card-body">
                 <h4 class="card-title"><?php echo $title;?></h4>
                 <p style="font-size: 18px; height:60px; overflow:hidden;" class="card-text"><?php echo $description;?></p>
                 <div class="card-btn">
                   <!-- <button><a style="transition: 2.5s ease;" href="#contactUs">Ask Question</a></button> -->
                 </div>
               </div>
            </div>
          </div>

          <?php 
            }
          } 
          ?>
          </div>
        </div>
    </section>
<!-- =================== Our services card section =================== -->

<!-- ============================== about section ======================== -->
<section id="about-us">
  <div class="container">
      <div class="row justify-content-center mt-5">
          <div class="about_image col-6">
              <figure>
                  <img class="img-fluid" src="assets/images/best1.jpg" alt="about us">
              </figure>
          </div>
          <div class="padd col-6">
              <h4 class="title">About Us</h4>
              <h2 class="section-title text-uppercase">We Provide you with the best fitness service</h2>
              <p class="section-details">
                  We serve you with a proper workout chart, guide and better facility
                  You can see your membership details in your own pc now
              </p>
              <a href="#contactUs" role="button" class="btn btn-green">Know More..</a>
          </div>
      </div>
  </div>
</section>
<!-- ============================== about section end ======================== -->
<hr>

<!-- ========================= plan section ========================= -->
<section  id="planSection" style="background-color: black;">
  <div class="container">
        <div class="servies">
          <h3 style="padding-top:20px; color:white;">OUR <span style="color: rgb(0,166,81);">PLAN</span> </h3>
        </div>
        <hr style="background-color: rgb(0,166,81); height: 3px;">
        <div style="color:green; text-align:center; line-height:0.5;">
           <p style="font-size: 25px;">Choose a Plan</p>
           <p style="color: red; font-size: 15px;">Here are popular plan that may suits you best</p>
        </div>
      <div class="row">
      <?php
             $sql1 = " select * from plan_tbl ";
             $result1 = mysqli_query($conn,$sql1);
           
             $num1 = mysqli_num_rows($result1);
             //echo $num;
            //  `id`, `plan_id`, `plan_name`, `duration`, `price`, `description`
             if($num1 > 0){
               while($row = mysqli_fetch_assoc($result1)){
                    $id = $row['id'];
                    $plan_id = $row['plan_id'];
                    $plan_name = $row['plan_name'];
                    $duration = $row['duration'];
                    $price = $row['price'];
                    $description = $row['description'];

                  //  echo $plan_name;
        ?>
        <div class="col-4">
            <div class="card  mb-3" style="max-width: 18rem;">
              <div class="card-header bg-success"></div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $plan_name?></h5>
                <div style="color:black; font-weight: 500; line-height:0.5;" class="detail">
                  <p><span style="font-weight: 500; color:rgb(220,53,69);">Price:</span>&nbsp;&nbsp;&nbsp;<?php echo $price?></p>
                  <p><span style="font-weight: 500; color:rgb(220,53,69);">Duration:</span>&nbsp;&nbsp;<?php echo $duration?> Months</p>
                </div>
                <hr>
                <div style="overflow:hidden;" class="sub-details">
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

                <hr>
                <div class="button">
                <a href="packages.php?package=<?php echo $id; ?>"><button style="margin-left:55px;"  class="btn btn-danger">Choose Plan</button></a>
                </div>
              </div>
            </div>
        </div> 
        <?php 
            }
          } 
          ?>
      </div>  
        
        
  </div>
</section>
<!-- ========================= End of plan section ========================= -->

<!-- =================== contact us section ================= -->
<section id="contactUs">
  <div class="container">
    <!-- <div class="row"> -->
    <div class="headContact">
      <h5><span style="color:green;">Contact</span> Us</h5>
    </div>
    <hr style="background-color: rgb(0,166,81); height: 3px;">
    <div class="col-8">
      <div class="contactForm">
        <form action="form_process.php" method="POST">
        <h6>Ask Here If You Have Any Query</h6>
            <div class="row">
              <div class="col">
                <label><b>Name</b></label>
                <input type="text" name="name" class="form-control mt-2" style="height: 50px;">
              </div>
              <div class="col">
                <label><b>Email</b></label>
                <input type="email" name="email" class="form-control mt-2" style="height: 50px;">
              </div> 
            </div>
            <div class="form-row">
              <div class="col-6">
                <label><b>Phone</b></label>
                  <input type="number" name="phone" class="form-control mt-2" style="height: 50px;">
              </div>
            
            <div class="col-6">
            <label style="margin-top:8px; margin-left:10px;"><b>Gender</b></label><br>
              <select class="form-control"  name="gender" style=" height: 50px;">
                <option selected>Choose gender..</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            </div>
            <div class="form-row">
              <div class="col-12 form-group">
                  <label><b>Address</b></label>
                  <textarea name="address" class="form-control" style="height: 70px;"></textarea>
              </div>
              <div class="col-12 form-group">
                <label><b>Message</b></label>
                <textarea name="message" class="form-control" style="height: 180px;"></textarea>
              </div>
            </div>
            <div class="msg_btn mt-4">
               <input style="width: 120px;" type="submit" class="btn btn-success" name="message_submit" value="Send">
            </div>
        </form>
    </div>
    </div>
    <!-- <div class="col-4">
         
    </div> -->
  <!-- </div> -->
  </div>

</section>
<!-- =================== contact us section end ================= -->

<!-- footer section -->
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
<!-- footer section -->
</section>
<script src="assets/jquery/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- name email phone gender address message message_submit -->