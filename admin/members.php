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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management | Member</title>
    <!-- links -->
    <?php require_once "../admin/config/style-and-meta.php"; ?>
</head>

<body>
    <!-- admin dashboard nav start -->
    <?php require_once "../admin/config/nav_bar.php"; ?>
    <!-- admin dashboard nav end -->
    <!-- content section  -->
    <?php require_once "../admin/config/heading_section.php"; ?>

    <!-- <h3 class="name">Member</h3> -->
<div>
    <!-- success message -->
     <?php  if(isset($_GET['msg'])) {
       ?>
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success:</strong> <?php echo $_GET['msg'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }?>
    <!-- success message end -->
    <div class="card mt-3">
        <div class="card-header font-weight-bold">
          <i class="fas fa-users m-2"></i>
           Member list
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-12 text-right mr-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmember">Add New</button>
                </div>
            </div>
            <hr style="height:3px;border-width:0;color:gray;background-color:gray">

        <div class="row">
        <div class="col-12">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Member ID</th>
            <th scope="col">Name</th>
            <!-- <th scope="col">Email</th> -->
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Amount</th>
            <th scope="col">View</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php display_member(); ?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- pagination -->
 <div class="card-footer">
    <?php
        $sql1 = " select * from member_tbl ";
        $mem_pagination = mysqli_query($conn,$sql1);
        $limit = 3;

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        if(mysqli_num_rows($mem_pagination) > 0){
            $totalRecords = mysqli_num_rows($mem_pagination);
            //$limit = 3;
            // calculation for total pages 
            $totalPages = ceil($totalRecords/$limit);
            // echo $totalPages;

            echo '<ul class="pagination">';
            // if($page > 1){
            //     echo '<li class="page-item">
            //     <a class="page-link" href="members.php?page='.($page-1).'">Prev</a>
            //     </li>';
            // }
            for($i=1; $i <= $totalPages; $i++){
                if($i == $page)
                {
                    $active = 'active';
                }else{
                    $active = "";
                }
                echo '<li class="page-item '.$active.'"><a class="page-link" href="members.php?page='.$i.'">'.$i.'</a></li>';
            }
            // if($totalPages > $page){
            //     echo '<li class="page-item"><a class="page-link" href="members.php?page='.($page+1).'">Next</a></li>';
            // }
            echo '</ul>';
        }
        ?>
<!-- pagination -->
</div>
<!-- Add member Modal  -->
    </div>
        
        <div class="modal fade" id="addmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;Add New Members</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- modal body form -->
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <!-- <h5 class="modal-title text-center text-dark">Add New Members</h5> -->
                        
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label class="font-weight-bold" >Member ID</label>
                                    <input type="text" name="memberid" class="form-control col-4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >First Name</label>
                                    <input type="text" name="fname" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >Last Name</label>
                                    <input type="text" name="lname" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >Email</label>
                                    <input type="text"  name="email" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" >Password</label>
                                    <input type="text"  name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" >Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" >Contact</label>
                                <input type="text" name="contact" class="form-control" placeholder="Enter address">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold" >Trainer</label>
                                    <select class="form-control" name="trainer">
                                        <option selected>Choose Trainer</option>
                                        <?php while($tr_row = mysqli_fetch_assoc($tr_query)):;?>
                                        <option value="<?php echo $tr_row['trainer_name'];?>"><?php echo $tr_row['trainer_name'];?></option>
                                    
                                        <?php  endwhile;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold" >Package</label>
                                    <select class="form-control" name="package">
                                        <option selected>Choose Package</option>
                                        <?php  while($pac_row = mysqli_fetch_assoc($pac_query)):;?>
                                        <option value="<?php echo $pac_row['package_name'];?>"><?php echo $pac_row['package_name'];?></option>
                                        
                                        <?php endwhile;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold" >Plan</label>
                                    <select class="form-control" name="plan">
                                        <option selected>Choose Plan</option>
                                        <?php  while($plan_row = mysqli_fetch_assoc($pln_query)):;?>
                                        <option value="<?php echo $plan_row['plan_name'];?>"><?php echo $plan_row['plan_name'];?></option>
                                        
                                        <?php endwhile;?>
                                    </select>
                                </div>

                                <!-- radio button -->
                              <fieldset class="form-group row col-6">
                                <legend class="col-form-label col-sm-2 float-sm-left pt-0 p-1 ml-3 font-weight-bold">Gender</legend>
                                <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input ml-3" type="radio" name="gender" value="Male" checked>
                                    <label class="form-check-label ml-5">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ml-3" type="radio" name="gender" value="Female">
                                    <label class="form-check-label ml-5">
                                    Female
                                    </label>
                                </div>

                              </fieldset>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-7">
                                <label class="font-weight-bold">Start Date</label><br>
                                <input type="date" name="start_date">
                            </div>
                            <div class="form-group col-5">
                                <label class="font-weight-bold">Total Days</label>
                                <input type="number" name="total_days">
                            </div>
                        </div>
                            <!-- modal body end -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="mem_insert" class="btn btn-primary">Submit</button>
                        <!-- <input type="submit" name="submit" class="btn btn-primary" value="Save"> -->
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Add member Modal End  -->
    </section>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        // edit function
       // $(document).ready(function(){
        $(document).on('click','.edit-btn',function(){
            $('.edit-btn').on('click', function(){
                $('#editmember').modal('show');

                var memberid = $(this).data('eid');
                //alert(memberid);
                $.ajax({
                    url: "member_updat.php",
                    type: "POST",
                    data: {id: memberid},
                    success: function(data){
                        $("#modal-body form").html(data);
                    }
                });
            });
        });
        // save edited data
        $(document).on('click','#edit-submit',function(){
            // 
            var memId = $("#edit-id").val();
            var member_id = $("#member-id").val();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var address = $("#address").val();
            var trainer = $("#trainer").val();
            var package = $("#package").val();
            var plan = $("#plan").val();
            var gender = $("#gender").val();

            $.ajax({
                url: "member_update.php",
                type: "POST",
                data: {
                    // key and value 
                    id: memId,
                    member: member_id,
                    fname: fname,
                    lname: lname,
                    email: email,
                    contact: contact,
                    address: address,
                    trainer: trainer,
                    package: package,
                    plan: plan,
                    gender: gender                
                },
                success: function(data){
                   // $('#editmember').modal('hide');
                   if(data == 1){
                       alert("data updated sucessfully");
                   }else{
                       alert("updation faild");
                   }
                }
            })
        });
        // delete function
        $(document).on('click','.delete-btn',function(){
         if(confirm("Do you really want to delete this?")){
          var memberid = $(this).data("id");
           var element = this;
         // alert(memberid);
         $.ajax({
                url: "member_delete.php",
                type: "POST",
                // sending in the form of object
                data: { id: memberid},
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