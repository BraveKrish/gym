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
    $sql = " select * from package_tbl where id={$id} ";
    $result = mysqli_query($conn,$sql);
    //$num = mysqli_num_rows($result);
    //echo $num;
    while($row = mysqli_fetch_assoc($result)){
        $pid = $row['package_id'];
        $pname = $row['package_name'];
        $amount = $row['amount'];
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
                        <label class="font-weight-bold" >Package ID</label>
                        <input type="text" name="pacid" class="form-control"  placeholder="Package Id" value="<?php echo $pid;?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" >Package Name</label>
                        <input type="text" name="pacname" class="form-control"  placeholder="Package name" value="<?php echo $pname; ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" >Amount</label>
                        <input type="text" name="pacamount" class="form-control" placeholder="Amount" value="<?php echo $amount; ?>">
                    </div>
                    <button type="submit" name="updatePac" class="btn btn-success ">Update</button>
                </form>
               <!-- package form end -->
             </div>
          </div>
        </div>

        <?php
           if(isset($_POST['updatePac'])){
               $p_id = $_POST['pacid'];
               $p_name = $_POST['pacname'];
               $amnt = $_POST['pacamount'];

               $sql1 = " update package_tbl set package_id = '$p_id', package_name = '$p_name', amount = $amnt where id=$id";
               $result1 = mysqli_query($conn,$sql1) or die("query faild");
               
               if($result1){
                $msg = "One Record Updated successfully!";
                echo "<script>window.open('package.php?msg=".$msg."','_SELF');</script>";
               }else{
    
               }
           }
        ?>
   </section> 
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- <script>
 $(document).on('click','.delete_pac_btn',function(){
         if(confirm("Do you really want to delete this?")){
             // id is from function button data-id
          var packageId = $(this).data("id");
          var element = this;
         // alert(trainerId);
         $.ajax({
                url: "package_delete.php",
                type: "POST",
                // sending in the form of object
                data: { id: packageId},
                success: function(data){
                    if(data == 1){                        
                        $(element).closest("tr").fadeOut();
                    }else{
                        alert("not deleted");
                    }
                }
         });
        }
        });
</script> -->
</body>
</html>
