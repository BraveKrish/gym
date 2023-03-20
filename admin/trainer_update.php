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
    //echo $id;
    $sql = " select * from trainer_tbl where id={$id} ";
    $result = mysqli_query($conn,$sql);
    //$num = mysqli_num_rows($result);
    //echo $num;
    while($row = mysqli_fetch_assoc($result)){
        $tr_id = $row['trainer_id'];
        $tr_name = $row['trainer_name'];
        $email = $row['email'];
        $contact = $row['contact'];
        $rate = $row['rate'];
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
                            <label class="font-weight-bold" >Trainer ID</label>
                            <input type="text" name="trid" class="form-control" value="<?php echo $tr_id; ?>"  placeholder="Enter ID">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Trainer Name</label>
                            <input type="text" name="trname" class="form-control" value="<?php echo $tr_name; ?>"  placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Email</label>
                            <input type="text" name="tremail" class="form-control" value="<?php echo $email; ?>" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Contact</label>
                            <input type="text" name="trcontact" class="form-control" value="<?php echo $contact; ?>" placeholder="Contact">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Rate</label>
                            <input type="number" name="rate" class="form-control" value="<?php echo $rate; ?>" placeholder="Rate">
                        </div>
                    
                <!-- Add trainer form -->
                </div>
                    <div class="modal-footer">
                        <button type="submit" name="trupdate" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
             </form>
               <!-- package form end -->
             </div>
          </div>
        </div>

        <?php
           if(isset($_POST['trupdate'])){
               $tid = $_POST['trid'];
               $name = $_POST['trname'];
               $tremail = $_POST['tremail'];
               $trcon = $_POST['trcontact'];
               $rate = $_POST['rate'];

               $sql1 = " update trainer_tbl set trainer_id = '$tid', trainer_name = '$name', email = '$tremail',contact = '$trcon',rate=$rate where id=$id";
               $result1 = mysqli_query($conn,$sql1) or die("query faild");
               
               if($result1){
                $msg = "One Record Updated successfully!";
                echo "<script>window.open('trainers.php?msg=".$msg."','_SELF');</script>";
               }else{
    
               }
           }
        ?>
   </section> 
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>