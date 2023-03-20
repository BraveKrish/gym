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
    <title>Gym Management | Trainers</title>
    <!-- links -->
    <?php require_once "../admin/config/style-and-meta.php"; ?>
</head>
<body>
    <!-- admin dashboard nav start -->
    <?php require_once "../admin/config/nav_bar.php"; ?>
    <!-- admin dashboard nav end -->
   <!-- content section  -->
   <?php require_once "../admin/config/heading_section.php"; ?>

    <!-- success message -->
          <?php
                if(isset($_GET['msg'])) {
              ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong><?php echo $_GET['msg'];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <?php } ?>
    <!-- success message end -->

    <!-- trainer details section -->
     <div class="row justify-content-center mt-3">

        <div class="col-3">
            <div class="card">
                <div class="card-header font-weight-bold"><i class="fa-solid fa-pen-to-square"></i>  Manage All Trainer</div>
                <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addtrainer">Add New</button>
                </div>
                
            </div>
        </div>

        <div class="col-9">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-user"></i>
               Trainer Details
             </div>
             <div class="card-body">
    <!-- trainer table -->
        <table class="table">
            <thead class="thead text-white bg-primary">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Trainer</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php display_trainer(); ?>
                </tbody>
        </table>
          </div>
        

        <div class="card-footer">
            <?php 
              $sql1 = " select * from trainer_tbl ";
              $trainerPagi = mysqli_query($conn,$sql1);
              $num = mysqli_num_rows($trainerPagi);

              if($num > 0){
                  $totalRecords = $num;
                  //echo $totalRecords;
                  $limit = 2;
                  $totalPages = ceil($totalRecords/$limit);
                  //echo $totalPages;
                  echo '<ul class="pagination">';
                  for($i=1; $i <= $totalPages; $i++){
                       echo '<li class="page-item"><a class="page-link" href="trainers.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  echo '</ul>';
             }
            ?>
          <!-- pagination -->
        </div>
        </div>
        <!-- trainer table end -->
        </div>
    </div>

   </section>
   <!-- ***************************** MODAL ***************************************** -->
<!-- add new trainer modal form  -->
   <div class="modal fade" id="addtrainer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-pen"></i> Manage Trainer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add trainer form -->
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold" >Trainer ID</label>
                            <input type="text" name="trid" class="form-control"  placeholder="Enter ID">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Trainer Name</label>
                            <input type="text" name="trname" class="form-control"  placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Email</label>
                            <input type="text" name="tremail" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Contact</label>
                            <input type="text" name="trcontact" class="form-control" placeholder="Contact">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" >Rate</label>
                            <input type="number" name="rate" class="form-control" placeholder="Rate">
                        </div>
                    
                <!-- Add trainer form -->
                </div>
                    <div class="modal-footer">
                        <button type="submit" name="tr_insert" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
             </form>
            </div>
        </div>
    </div>
<!-- add new trainer modal form  -->

<!-- ***************************** MODAL ***************************************** -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
  // class from plan delete button (function.php)
  $(document).on('click','.delete_tr_btn',function(){
         if(confirm("Do you really want to delete this?")){
             // id is from function button data-id and database tbl id
          var trainerId = $(this).data("id");
          var element = this;
         //alert(planId);
         $.ajax({
                url: "trainer_delete.php",
                type: "POST",
                // sending in the form of object
                data: { id: trainerId},
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