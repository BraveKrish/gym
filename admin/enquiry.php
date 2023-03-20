<?php
session_start();
if(!isset($_SESSION['uname'])){
    header("location:login.php");
}
  require_once "../admin/config/db_connect.php";
  // total members
  $sql = " select * from member_tbl ";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  //echo $num;
  // total trainers
  $sql = " select * from trainer_tbl ";
  $result = mysqli_query($conn,$sql);
  $totalTrainer = mysqli_num_rows($result);

  if(isset($_GET['d_id'])) {
  $dlt_id = $_GET['d_id'];
  
  $dsql = " delete from enquiry_tbl where id='$dlt_id'";
  $dQuery = mysqli_query($conn,$dsql);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management | Dashboard</title>
    <!-- links -->
    <?php require_once "../admin/config/style-and-meta.php"; ?>
</head>
<body>
    <!-- admin dashboard nav start -->
    <?php require_once "../admin/config/nav_bar.php"; ?>
    <!-- admin dashboard nav end -->
<!-- content section  -->
    <?php require_once "../admin/config/heading_section.php"; ?>

       
       <!-- <div class="changePassword">
            <div class="button">
                <button type="button" data-toggle="modal" data-target="#changePass">Change Password</button>
            </div>
        </div> -->
        <h3 class="name">Manage Enquiry</h3>
       <hr style="height:3px;border-width:0;color:gray;background-color:gray">

       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div>
                        <h3 style="color: green; margin: 20px 0; text-align: center;">Membership Validity</h3>
                   </div>

<!-- =========================== members validity ========================== -->
                   <div class="tbl">
                   <table class="table bg-white" border="2">
                            <thead style="background-color: black; color: white;">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $sqlQuery = " select * from enquiry_tbl ";

                                   $runQuery = mysqli_query($conn,$sqlQuery);
                                   $num = mysqli_num_rows($runQuery);
                                   if($num > 0){
                                       $i = 0;
                                   while($show = mysqli_fetch_assoc($runQuery)){
                                       $i++;
                                        $id=$show['id'];
                                        $name = $show['name'];
                                        $phone = $show['phone'];
                                        $gender = $show['gender'];
                                        $address = $show['address'];
                                        $message = $show['message'];
                                        // $status = $show['status'];
                                 
                                ?>
                                <tr>
                                    <td  style="font-weight: bold;"><?php echo  $i; ?></td>
                                    <td  style="font-weight: bold;"><?php echo  $name; ?></td>
                                    <td  style="font-weight: bold;"><?php echo  $phone; ?></td>
                                    <td  style="font-weight: bold;"><?php echo  $gender; ?></td>
                                    <td  style="font-weight: bold;"><?php echo  $address; ?></td>
                                    <td  style="font-weight: bold;"><?php echo  $message; ?></td>
                                    <td>
                                        <a class="dlt" style="padding: 5px 10px ;
                                         background-color:red;
                                         color: white;
                                         cursor:pointer;
                                         text-decoration:none;
                                         margin:10px;
                                         border-radius:3px ;
                                         " href="enquiry.php?d_id=<?php echo $id; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                               
                                ?>
                            </tbody>
                    </table>
                   </div>
<!-- =========================== members validity ========================== -->
             </div>
           </div>
       </div>
   </section>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
        $(document).ready(function(){
            $('.dlt').on('click',function(e){
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