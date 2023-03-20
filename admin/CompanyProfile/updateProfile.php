<?php
   require "../config/db_connect.php";
   require_once "function.php";

   if(isset($_GET['id'])){
       $id = $_GET['id'];
      // echo $id; exit;

      $sql = " delete from our_services where id = $id ";
      $queryRun = mysqli_query($conn,$sql);

   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/admin.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="../assets/fa/all.min.css">
    <link rel="stylesheet" href="../assets/fa/fontawesome.min.css">

    <style>

    </style>
</head>

<body>
    <!-- admin dashboard nav start -->
    <section id="menu">
        <div class="logo">
            <img src="../assets/images/download.png" alt="">
            <h2>Gym MS</h2>
        </div>
        <div class="items">
            <!-- <li><i class="fa-solid fa-gauge-high"></i><a href="#">Dashboard</a></li> -->
            <li><i class="fa-solid fa-house"></i><a href="../index.php">Home</a></li>
            <li><i class="fa-solid fa-user-group"></i><a href="../members.php">Members</a></li>
            <li><i class="fa-solid fa-box-archive"></i><a href="../package.php">Packages</a></li>
            <li><i class="fa-solid fa-bolt-lightning"></i><a href="../plans.php">Plans</a></li>
            <li><i class="fa-solid fa-user"></i><a href="../trainers.php">Trainers</a></li>
            <li><i class="fa-solid fa-dumbbell"></i></i><a href="../CompanyProfile/profile.php">Company Profile</a></li>
        </div>
    </section>
    <section id="content">
        <div class="navigation">
            <div class="n1">
                <div class="title">
                    <h2>Welcome to Admin Dashboard<?php #echo $_SESSION['uname'];
                                                    ?> </h2>
                </div>
            </div>

            <div class="profile">
                <button id="logoutbtn"><a href="../logout.php">Logout</a></button>
            </div>
        </div>
        <?php
            $id = $_GET['did'];
            // echo $id; exit;
            $sql = " select * from our_services where id={$id} ";
            $result = mysqli_query($conn,$sql);
            //$num = mysqli_num_rows($result);
            //echo $num;
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['title'];
                $desc = $row['description'];
                $photo = $row['photo'];
            }
   
        ?>
        <div class="row justify-content-center mt-3">
        <div class="col-4">
          <div class="card">
             <div class="card-header font-weight-bold">
             <i class="fa-solid fa-edit"></i>
               Update Services
             </div>
             <div class="card-body">
               <!-- services form -->
               <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="ser_title" class="form-control" placeholder="Enter Name" value="<?php echo $title;?>">
                        </div>
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea name="ser_desc" class="form-control" rows="3"><?php echo $desc;?></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>Choose Photo</b></label>
                            <input type="file" name="file" accept="image/jpg, image/jpeg,
                            image/png" class="form-control-file" value="<?php echo $photo;?>">
                        </div>

                        <!-- Add trainer form -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_services" class="btn btn-primary">Update</button>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
               <!-- package form end -->
             </div>
          </div>
        </div>

        <?php
           if(isset($_POST['update_services'])){
               $title = $_POST['ser_title'];
               $description = $_POST['ser_desc'];
            

               
                $photo = $_FILES['file'];

                $file_name = $photo['name'];
                $file_path = $photo['tmp_name'];
                $file_error = $photo['error'];

                if($file_error == 0){
                    $destination_file = './uploaded_img/'.$file_name;
                    //$destination_file;
                    // moving uploaded file from filepath to destfile
                    move_uploaded_file($file_path,$destination_file);

               $sql1 = " update our_services set title = '$title', description = '$description', photo = '$file_name' where id='$id'";
        
               $result1 = mysqli_query($conn,$sql1) or die("query faild");
               
               if($result1){
                $msg = "One Record Updated successfully!";
                echo "<script>window.open('profile.php?msg=".$msg."','_SELF');</script>";
               }else{
                $msg="Updation failed";
                echo "<script>window.open('updateProfile.php?msg=".$msg."','_SELF');</script>";
               }
           }
        }
        ?>
        
     
    </section>


<!-- ========================== MODEL ================================================ -->
    <!-- add SERVICES modal form  -->
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
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" name="ser_title" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea name="ser_desc" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>Choose Photo</b></label>
                            <input type="file" name="file" accept="image/jpg, image/jpeg,
                            image/png" class="form-control-file">
                        </div>

                        <!-- Add trainer form -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="insert_service" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add SERVICES modal form  -->
<!-- ========================== MODEL ================================================ -->
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
