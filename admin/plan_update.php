<?php
 // session_start();
  require_once "../admin/config/db_connect.php";
  require_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management | Update Packages</title>
    <!-- links -->
    <?php require_once "../admin/config/style-and-meta.php"; ?>
</head>
<body>
    <!-- admin dashboard nav start -->
    <?php require_once "../admin/config/nav_bar.php"; ?>
    <!-- admin dashboard nav end -->
<!-- content section  -->
    <?php require_once "../admin/config/heading_section.php"; ?>

    
    <!-- <h3 class="name">Dashboard</h3> -->
<!-- add new package form -->
  <?php
    $id = $_GET['id'];
    // echo $id;
    $sql = " select * from plan_tbl where id={$id} ";
    $result = mysqli_query($conn,$sql);
    //$num = mysqli_num_rows($result);
    //echo $num;
    while($row = mysqli_fetch_assoc($result)){
        $plan_id = $row['plan_id'];
        // echo $plan_id;
        $planname = $row['plan_name'];
        // $amount = $row['amount'];
    }
   
  ?>
    <div class="row justify-content-center mt-3">
        <div class="col-4">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-edit"></i>
               Update Package
             </div>
             <div class="card-body">
               <!-- package form -->
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold" >Plan ID</label>
                        <input type="text" name="pln_id" class="form-control"  placeholder="Package Id" value="<?php echo $plan_id; ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" >Plan(Months)</label>
                        <input type="text" name="plan" class="form-control"  placeholder="Package name" value="<?php echo $planname; ?>">
                    </div>
                    <button type="submit" name="planUpdate" class="btn btn-success ">Update</button>
                </form>
               <!-- package form end -->
             </div>
          </div>
        </div>

        <?php
           if(isset($_POST['planUpdate'])){
             $pl_id = $_POST['pln_id'];
               $pl_name = $_POST['plan'];

               $sql1 = " update plan_tbl set plan_id='$pl_id', plan_name = '$pl_name' where id='$id'";
               $result1 = mysqli_query($conn,$sql1) or die("query faild");
               
               if($result1){
                $msg = "One Record Updated successfully!";
                echo "<script>window.open('plans.php?msg=".$msg."','_SELF');</script>";
               }else{
    
               }
           }
        ?>
   </section> 
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>