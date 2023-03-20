<?php
  require_once "../admin/config/db_connect.php";
  require_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management | Packages</title>
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
    <!-- success message -->
          <?php
          if(isset($_GET['msg'])){

            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success: </strong><?php echo $_GET['msg'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    <!-- success message end -->
<!-- add new package form -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold"><i class="fa-solid fa-pen-to-square"></i> Manage Plans</div>
            </div>
        </div>
        <div class="col-4">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-plus"></i>
               Add New Plan
             </div>
             <div class="card-body">
                 <!-- package form -->
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold" >Plan ID</label>
                            <input type="text" name="plan_id" class="form-control"  placeholder="Enter plan ID">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Plan Name</label>
                            <input type="text" name="planname" class="form-control" placeholder="Enter plan name">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Duration</label>
                            <input type="text" name="duration" class="form-control"  placeholder="Enter plan duration">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Description</label>
                            <input type="text" name="description" class="form-control" placeholder="description">
                        </div>
                        <button type="submit" name="plan_insert" class="btn btn-primary">Save</button>
                    </form>
                 <!-- package form end -->
             </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-box-archive"></i>
               All Plan
             </div>
             <div class="card-body">
                 <!-- package table -->
                 <table class="table">
                 <thead class="thead-dark">
                    <tr>
                    <th scope="col">Plan ID</th>
                    <th scope="col">Plan(Months)</th>
                    <!-- <th scope="col">Amount</th> -->
                    <th scope="col">Action</th>
                    </tr>
                 </thead>
                 <tbody>
                     <?php display_plan();?>
                 </tbody>
                </table>
                 <!-- package table end -->
             </div>
             <div class="card-footer">
                 <?php
                    $sql1 = " select * from plan_tbl ";
                    $planPagination = mysqli_query($conn,$sql1);
                    $num = mysqli_num_rows($planPagination);
                    
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }

                    if($num){
                        $totalRecords = $num;
                        //echo $totalRecords;
                        $limit = 2;
                        $totalPages = ceil($totalRecords/$limit);
                        // echo $totalPages;
                        echo '<ul class="pagination">';
                        for($i=1; $i<=$totalPages;$i++){
                            if($i == $page){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                          echo '<li class="page-item '.$active.'"><a class="page-link" href="plans.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        echo '</ul>';
                    }
                 ?>
                
          <!-- pagination -->
          </div>
          </div>
        </div>
    </div>  
   </section>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  // class from plan delete button (function.php)
 $(document).on('click','.delete_pln_btn',function(){
         if(confirm("Do you really want to delete this?")){
             // id is from function button data-id and database tbl id
          var planId = $(this).data("id");
          var element = this;
         //alert(planId);
         $.ajax({
                url: "plan_delete.php",
                type: "POST",
                // sending in the form of object
                data: { id: planId},
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
</script>
</body>
</html>