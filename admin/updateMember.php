<?php
   require_once "../admin/config/db_connect.php";
   require_once "function.php";

     // for dynamic dropdown
  $sql = " select * from trainer_tbl ";
  $tr_query = mysqli_query($conn,$sql);
  $sql = " select * from package_tbl ";
  $pac_query = mysqli_query($conn,$sql);
  $sql = " select * from plan_tbl ";
  $pln_query = mysqli_query($conn,$sql);


   if(isset($_GET['e_id'])) {
    $u_id =$_GET['e_id'];
   // echo $id;

   $sql = " select * from member_tbl where id = '$u_id' ";
   $result = mysqli_query($conn, $sql) or die("query faild");
 
   if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
 
         $tid = $row['id'];
         $member_id = $row['member_id'];
         $fname = $row['first_name'];
         $lname = $row['last_name'];
         $email = $row['email'];
         $contact = $row['contact'];
         $address = $row['address'];
         $trainer = $row['trainer_id'];
         $package = $row['package_id'];
         $plan = $row['plan_id'];
         $gender = $row['gender'];
         $start_date = $row['start_date'];
         $total_days = $row['total_days'];

        // echo $member_id;
   }
  }
}

if(isset($_POST['update_member']))
{

    
    $u_id =$_GET['e_id'];
    $member_id = $_POST['memberid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $trainer = $_POST['trainer'];
    $package = $_POST['package'];
    $plan = $_POST['plan'];
    $gender = $_POST['gender'];
    $start = $_POST['start_date'];
    $totald = $_POST['total_days'];

    $sqlp = " select * from package_tbl where package_name = '$package' ";
 
    $result = mysqli_query($conn,$sqlp);
    $roww=mysqli_fetch_assoc($result);
    $monthly_amt=$roww['amount'];
    $total= $plan * $monthly_amt;
    
    $sql11 = " update member_tbl set member_id = '$member_id',first_name = '$fname',last_name='$lname',
    email='$email',contact='$contact',address='$address',trainer_id='$trainer',package_id='$package',
    plan_id='$plan',gender='$gender',start_date='$start',total_days='$totald', total_amount='$total' where id = $u_id ";

    // echo $sql11; exit;
    $update = mysqli_query($conn,$sql11);
    if(mysqli_query($conn,$sql)){
        $msg = "Member updated successfully" ;
    }else{
        $msg = "Member not updated";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <?php require_once "../admin/config/style-and-meta.php"; ?>

    <style>

    </style>
</head>

<body>
    <!-- admin dashboard nav start -->
    <!-- admin dashboard nav start -->
    <?php require_once "../admin/config/nav_bar.php"; ?>
    <!-- admin dashboard nav end -->
    <!-- content section  -->
    <?php require_once "../admin/config/heading_section.php"; ?>

        </div>
        <?php
           // $id = $_GET['did'];
            // echo $id; exit;
            // $sql = " select * from our_services where id={$id} ";
            // $result = mysqli_query($conn,$sql);
            //$num = mysqli_num_rows($result);
            //echo $num;
            // while($row = mysqli_fetch_assoc($result)){
            //     $title = $row['title'];
            //     $desc = $row['description'];
            //     $photo = $row['photo'];
            // }
   
        ?>
        <?php if(isset($msg)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> <?php echo $msg;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php } ?>
        <div class="row justify-content-center mt-3">
        <div class="col-8">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-edit"></i>
               Update Member
             </div>
             <div class="card-body">
               <!-- services form -->
               
               <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <!-- <h5 class="modal-title text-center text-dark">Add New Members</h5> -->
                        
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label class="font-weight-bold" >Member ID</label>
                                    <input type="text" name="memberid" class="form-control col-4" value="<?php echo $member_id;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >First Name</label>
                                    <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >Last Name</label>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $lname;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >Email</label>
                                    <input type="text"  name="email" class="form-control" value="<?php echo $email;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" >Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter address" value="<?php echo $address;?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" >Contact</label>
                                <input type="text" name="contact" class="form-control" placeholder="Enter address" value="<?php echo $contact;?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold" >Trainer</label>
                                    <select class="form-control" name="trainer">
                                        <option>Choose Trainer</option>
                                        <?php while($tr_row = mysqli_fetch_assoc($tr_query)):;?>
                                
                                        <option value="<?php echo $tr_row['trainer_name'];?>"
                                        <?php
                                            if($trainer== $tr_row['trainer_name']){
                                                echo "selected";
                                            }
                                            ?>
                                        ><?php echo $tr_row['trainer_name'];?></option>
                                  
                                        <?php  endwhile;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold" >Package</label>
                                    <select class="form-control" name="package">
                                        <option>Choose Package</option>
                                        <?php  while($pac_row = mysqli_fetch_assoc($pac_query)):;?>
                                
                                        <option value="<?php echo $pac_row['package_name'];?>"
                                        <?php
                                            if($package== $pac_row['package_name']){
                                                echo "selected";
                                            }
                                            ?>
                                        ><?php echo $pac_row['package_name'];?></option>
                                        
                                        <?php endwhile;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold" >Plan</label>
                                    <select class="form-control" name="plan">
                                        <option>Choose Plan</option>
                                        <?php  while($plan_row = mysqli_fetch_assoc($pln_query)):;?>
                                        <option value="<?php echo $plan_row['plan_name'];?>"
                                        <?php
                                            if($plan== $plan_row['plan_name']){
                                                echo "selected";
                                            }
                                            ?>
                                        ><?php echo $plan_row['plan_name'];?></option>
                                        
                                        <?php endwhile;?>
                                    </select>
                                </div>

                                <!-- radio button -->
                              <fieldset class="form-group row col-8">
                                <legend class="col-form-label col-sm-2 float-sm-left pt-0 p-1 ml-3 font-weight-bold">Gender</legend>
                                <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input ml-3" type="radio" name="gender" value="Male"
                                    <?php
                                            if($gender== "Male"){
                                                echo "checked";
                                            }
                                            ?>
                                    >
                                    <label class="form-check-label ml-5">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ml-3" type="radio" name="gender" value="Female" 
                                    <?php
                                            if($gender== "Female"){
                                                echo "checked";
                                            }
                                            ?>
                                    >
                                    <label class="form-check-label ml-5">
                                    Female
                                    </label>
                                </div>

                              </fieldset>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label class="font-weight-bold">Start Date</label><br>
                                <input type="date" name="start_date" value="<?php echo $start_date;?>">
                            </div>
                            <div class="form-group col-5">
                                <label class="font-weight-bold">Total Days</label><br>
                                <input type="number" name="total_days" value="<?php echo $total_days;?>">
                            </div>
                        </div>
                            <!-- modal body end -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="update_member" class="btn btn-success">Update</button>
                    </div>
                </form>
               <!-- package form end -->
             </div>
          </div>
        </div>

        <?php
           if(isset($_POST['updatePac'])){
               $title = $_POST['ser_title'];
               $description = $_POST['ser_desc'];
               $file = $_POST['file'];

               $sql1 = " update our_services set title = '$title', description = '$description', photo = $photo where id=$id";
               $result1 = mysqli_query($conn,$sql1) or die("query faild");
               
               if($result1){
                $msg = "One Record Updated successfully!";
                echo "<script>window.open('profile.php?msg=".$msg."','_SELF');</script>";
               }else{
    
               }
           }
        ?>
        
     
    </section>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn-delete').on('click',function(e){
                e.preventDefault(); // preventing default action
                var me=$(this);
                var href = me.attr('href');
                // alert(href);

                if(confirm("Are you sure you want delete this record!!"))
                {
                    window.location.assign(href);

                }

            });
        });
    </script>

</body>

</html>
