<?php
  require_once "../admin/config/db_connect.php";
  require_once "function.php";
  

  $view_ID = $_GET['viewid'];
  //echo $view_ID;
  // for dynamic dropdown
  $sql = " select * from member_tbl where id=$view_ID ";
  $mem_query = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($mem_query)){
      $fname = $row['first_name'];
      $lname = $row['last_name'];
      $email = $row['email'];
      $trainer = $row['trainer_id'];
      $package = $row['package_id'];
      $plan = $row['plan_id'];
      $gender = $row['gender'];
      $start_date = $row['start_date'];
      $total_days = $row['total_days'];

     // echo $trainer;

  }

  $sql1 = " select member_tbl.id,memberlist.id,memberlist.status from 
  member_tbl INNER JOIN memberlist on member_tbl.id = memberlist.id where memberlist.id='$view_ID' ";
  $result = mysqli_query($conn,$sql1);
  while($show = mysqli_fetch_assoc($result)){
      $status = $show['status'];
      //echo $status;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management | Member</title>
    <!-- links -->
    <?php require_once "../admin/config/style-and-meta.php"; ?>
</head>

<body>
    <!-- admin dashboard nav start -->
    <?php require_once "../admin/config/nav_bar.php"; ?>
    <!-- admin dashboard nav end -->
    <!-- content section  -->
    <?php require_once "../admin/config/heading_section.php"; ?>

    <!-- <h3 class="name">Member</h3> -->
<div>
    <!-- success message -->
     <?php  if(isset($_GET['msg'])) {
       ?>
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success:</strong> <?php echo $_GET['msg'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }?>
    <!-- success message end -->
    <div class="card mt-3">
        <div class="card-header font-weight-bold">
          <i class="fas fa-users m-2"></i>
           Member list
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-12 mr-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success"><a style="text-decoration: none; color:white;" href="members.php">Back</a></button>
                </div>
            </div>
            <hr style="height:3px;border-width:0;color:gray;background-color:gray">
            <div class="row">
                <div class="col-8">
                    <div style="line-height: 0.5;" class="details">
                        <h5 style="color: green;padding: 5px 0;font-size: 30px;">Member Details</h5>
                        <p style="font-weight: bold;">Name: <?php echo $fname.' '.$lname; ?>
                        <p style="font-weight: bold;">Email: <?php echo $email;?>
                        <p style="font-weight: bold;">Trainer: <?php echo $trainer;?> </p>
                        <p style="font-weight: bold;">Package: <?php echo $package;?></p>
                        <p style="font-weight: bold;">Plan: <?php echo $plan;?> Months </p>
                        <p style="font-weight: bold;">Gender: <?php echo $gender;?> </p>
                        <p style="font-weight: bold;">Start Date: <?php echo $start_date;?> </p>
                        <p style="font-weight: bold;">Total Days: <?php echo $total_days;?> </p>
                        <p style="font-weight: bold;">Status: 
                              <!-- <a style="" href=""><?php #echo $status;?></a> -->
                            <?php 
                             if($status == 'Active'){
                                 echo "<a style='color:blue;'>Active</a>";
                             }else{
                                 echo "<a style='color:red;'>Expire</a>";
                             }
                            ?>
                       </p>
                    </div>
                </div>
            </div>


</div>
</div>
    </section>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>