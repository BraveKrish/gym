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

  // total active members
//   $totalActive = " SELECT COUNT(status) from memberlist where status='Expired'";
//   $runTotalActive = mysqli_query($conn,$totalActive) or die("query faild".mysqli_error($conn));
//   $Active = mysqli_num_rows($runTotalActive);
//   echo $Active;

  $sql = " select * from enquiry_tbl ";
  $res = mysqli_query($conn,$sql);
  $totalEnquiry = mysqli_num_rows($res);
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

       
       <div class="changePassword">
            <div class="button">
                <button type="button" data-toggle="modal" data-target="#changePass">Change Password</button>
            </div>
        </div>
        <h3 class="name">Dashboard</h3>
       <div class="boxes">
           <div class="box">
               <i class="fas fa-users"></i>
               <div>
                   <h3><?php echo $num;?></h3>
                   <a href="members.php"><span>Total Members</span></a>
               </div>
           </div>
           <!-- <div class="box">
           <i class="fa-solid fa-bolt"></i>
               <div>
                   <h3>25</h3>
                   <span>Active Member</span>
               </div>
           </div> -->
           <div class="box">
               <i class="fas fa-users"></i>
               <div>
                   <h3><?php echo $totalEnquiry;?></h3>
                   <a href="trainers.php"><span>Total Enquiry</span></a>
               </div>
           </div>
           <div class="box">
           <i class="fa-solid fa-dumbbell"></i>
               <div>
                   <h3><?php echo $totalTrainer;?></h3>
                   <a href="trainers.php"><span>Trainers</span></a>
               </div>
           </div>
       </div>
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //    $limit = 5;
                                //    $page = $_GET['page'];
                                //    $offset = ($page-1) * $limit;
                                //    $sqlQuery = " select member_tbl.first_name,member_tbl.last_name,member_tbl.start_date,
                                //    member_tbl.total_days,member_tbl.contact,memberlist.status from member_tbl 
                                //    inner join memberlist on member_tbl.id = memberlist.id limit {$offset},{$limit} ";

                                   $sqlQuery = " select member_tbl.first_name,member_tbl.last_name,member_tbl.start_date,
                                   member_tbl.total_days,member_tbl.contact,memberlist.status from member_tbl 
                                   inner join memberlist on member_tbl.id = memberlist.id ";

                                   $runQuery = mysqli_query($conn,$sqlQuery);
                                   $num = mysqli_num_rows($runQuery);
                                   if($num > 0){
                                       $i = 0;
                                   while($show = mysqli_fetch_assoc($runQuery)){
                                       $i++;
                                        $fname = $show['first_name'];
                                        $lname = $show['last_name'];
                                        $start_date = $show['start_date'];
                                        $total_days = $show['total_days'];
                                        $contact = $show['contact'];
                                        $status = $show['status'];
                                 
                                ?>
                                <tr>
                                    <td  style="font-weight: bold;"><?php echo  $i; ?></td>
                                    <td style="font-weight: bold; color: blue;">
                                    <i class="fa-solid fa-user text-dark"></i>&nbsp;Name: <?php echo $fname.' '.$lname ;?><br>
                                    <i class="fa-solid fa-clock text-dark"></i>&nbsp;Start Date: <?php echo $start_date;?> <br>
                                    <i class="fa-solid fa-calendar-check text-dark"></i>&nbsp;Total Days: <?php echo $total_days;?> 
                                    <td>
                                        <?php 
                                           if($show['status'] == 'Active'){
                                               echo "<p
                                                style='
                                                 color:black;
                                                 font-weight:bold;
                                                 background-color:rgb(116,192,252);
                                                 text-align:center;
                                                 align-item:center;
                                                 margin:22px 0;
                                                 width:70px;
                                                 height:30px;
                                                 border-radius:14px;
                                                '>
                                                Active
                                                </p>";
                                           }else{
                                            echo "<p
                                            style='
                                             color:black;
                                             font-weight:bold;
                                             background-color:rgb(255,192,199);
                                             text-align:center;
                                             align-item:center;
                                             margin:22px 0;
                                             width:70px;
                                             height:30px;
                                             border-radius:14px;
                                            '>
                                            Expire
                                            </p>";
                                           }
                                        ?>
                                     
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                               
                                ?>
                            </tbody>
                    </table>
                    <?php
                //      $sql1 = " select member_tbl.first_name,member_tbl.last_name,member_tbl.start_date,
                //      member_tbl.total_days,member_tbl.contact,memberlist.status from member_tbl 
                //      inner join memberlist on member_tbl.id = memberlist.id ";
                //      $runQuery1 = mysqli_query($conn,$sql1);
                //      $num1 = mysqli_num_rows($runQuery);
                //      //echo $num1; exit;

                //      if($num1 > 0){
                //          $totalRecord = $num1;
                //          //$limit = 2;
                //          $total_page = ceil($totalRecord / $limit);
                //          //echo $total_page; exit;

                //          echo '<ul>';
                //          for($inc=1; $inc <= $total_page; $inc++){
                //             echo' <li><a href="index.php?page='.$inc.'">'.$inc.'</a></li>';

                //          }
                //          echo '</ul>';
                    
                //  }
                    ?>
                    <!-- <ul>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul> -->
                   </div>
<!-- =========================== members validity ========================== -->
<!-- change password modal -->
<!-- Modal -->
<div class="modal fade" id="changePass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="changePass.php" method="POST">
            <label>Old Password</label>
            <input type="text" class="form-control" name="oldPass">
            <label>New Password</label>
            <input type="text" class="form-control" name="newPass">
            <label>Confirm Password</label>
            <input type="text" class="form-control" name="conPass">
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="changePass" class="btn btn-primary">Save Password</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- change password modal -->
               </div>
           </div>
       </div>
   </section>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>