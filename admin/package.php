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
<!-- add new package form -->
    <div class="row mt-3">
        <div class="col-12">
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
            <div class="card">
                <div class="card-header font-weight-bold"><i class="fa-solid fa-pen-to-square"></i> Manage Packages</div>
            </div>
        </div>
        <div class="col-4">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-plus"></i>
               Add New Package
             </div>
             <div class="card-body">
               <!-- package form -->
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold" >Package ID</label>
                        <input type="text" name="pacid" class="form-control"  placeholder="Package Id">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" >Package Name</label>
                        <input type="text" name="pacname" class="form-control"  placeholder="Package name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" >Amount</label>
                        <input type="text" name="pacamount" class="form-control" placeholder="Amount">
                    </div>
                    <button type="submit" name="pac_insert" class="btn btn-primary">Save</button>
                </form>
               <!-- package form end -->
             </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-box-archive"></i>
               All Packages
             </div>
             <div class="card-body">
                 <!-- package table -->
                 <table class="table">
                 <thead class="thead-dark">
                    <tr>
                    <th scope="col">Package ID</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                    </tr>
                 </thead>
                 <tbody>
                     <?php display_package();?>
                 </tbody>
                </table>
                 <!-- package table end -->
             </div>
             <div class="card-footer">
          <!-- pagination -->
            <?php
              $sql1 = " select * from package_tbl ";
              $pac_pagination = mysqli_query($conn,$sql1);
              $num = mysqli_num_rows($pac_pagination);

              if(isset($_GET['page'])){
                  $page = $_GET['page'];
              }else{
                 $page =1;
              }
              if(mysqli_num_rows($pac_pagination)>0){
                  $totalRecord = $num;
                  //echo $totalRecord;
                  $limit = 2;
                  $totalPages = ceil($totalRecord/$limit);
                  //echo $totalPages;
                  echo '<ul class="pagination">';
                  for($i=1; $i <= $totalPages; $i++){
                      if($i == $page){
                          $active = "active";
                      }else{
                          $active = "";
                      }
                  echo '<li class="page-item '.$active.'"><a class="page-link" href="package.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  echo '</ul>';
              }
            ?>
        </div>
          </div>
        </div>
    </div>
   </section> 
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
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
</script>
</body>
</html>