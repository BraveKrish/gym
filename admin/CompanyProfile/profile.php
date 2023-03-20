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
            <li><i class="fa-solid fa-user"></i><a href="../enquiry.php">Enquiry</a></li>
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
          if(isset($_GET['msg'])){

            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success: </strong><?php echo $_GET['msg'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div style="margin-left: 40px ;" class="row">
        <div class="col-3 mt-3">
                <div class="card justify-content-start">
                    <div class="card-header font-weight-bold"><i class="fa-solid fa-pen-to-square"></i>Manage Our Services</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addtrainer">Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 mt-3">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <i class="fa-solid fa-user"></i>
                        Our Services
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead text-white bg-dark">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php #select_services();
                                    $sql = " select * from our_services ";
                                    $result = mysqli_query($conn,$sql);
                                  
                                    $num = mysqli_num_rows($result);

                                    
                                    if($num>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            // echo $id;
                                            $title = $row['title'];
                                            $description = $row['description'];
                                            $picture = $row['photo']; 
                                ?>
                                <tr>                                                               
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $description ?></td>
                                    <td>
                                       <?php //echo $pic; ?>
                                        <img style="height: 60px;" src="<?php echo "uploaded_img/".$picture; ?>" alt="">
                                        <!-- <img style="height: 60px; width:80px;" src="uploaded_img/about.jpg" alt="Image"> -->
                                    </td>
                                    <td>
                                        <button class="btn btn-success"><a  class=" text-white text-decoration-none" href="updateProfile.php?did=<?php echo $id;?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                        <button class="btn btn-danger"><a  class=" text-white text-decoration-none btn-delete" href="profile.php?id=<?php echo $id;?>"><i class="fa-solid fa-trash"></i></a></button>
                                    </td>
                                </tr>

                                <?php }
                             }else{
                                 echo "no record found";
                             }
                             ?>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
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
