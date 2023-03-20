<?php
 //session_start();
    require "./config/db_connect.php";

///////////memberr insertion ////////////////
   if(isset($_POST['mem_insert'])){
       $memberid = $_POST['memberid'];
        $firsname = $_POST['fname'];
        $lastsname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $trainer = $_POST['trainer'];
        $package = $_POST['package'];
        $plan = $_POST['plan'];
        $gender = $_POST['gender'];
        $start_date = $_POST['start_date'];
        $total_days = $_POST['total_days'];

        $sql = " select * from package_tbl where package_name = '$package' ";
 
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $monthly_amt=$row['amount'];
        $total= $plan * $monthly_amt;

        // echo $total; exit;
        
        // $insert_member = " INSERT into member_tbl(id,member_id,first_name,last_name,email,contact,address,trainer,package,plan,gender,total amt) 
        // values(NULL,'$memberid','$firsname','$lastsname','$email',$contact,'$address','$trainer','$package','$plan','$gender',$total)";
        $insert_member = " INSERT into member_tbl(id,member_id,first_name,last_name,email,password,contact,address,trainer_id,package_id,plan_id,gender,start_date,total_days,total_amount) 
        values(NULL,'$memberid','$firsname','$lastsname','$email','$password','$contact','$address','$trainer','$package','$plan','$gender','$start_date','$total_days','$total')";
       //echo $insert_member; exit;
       $mem_result = mysqli_query($conn,$insert_member) or die("query failed!!!".mysqli_error($conn));

        // print_r($insert_member);

        if($mem_result){
           // $_SESSION['success'] = "One Record Inserted sucessfully!";
           $msg = "One Record Inserted successfully!";
           echo "<script>window.open('members.php?msg=".$msg."','_SELF');</script>";
        }else{
            echo "<script>alert('Not inserted')</script>";
        }
     }
//////////////member insertion end here//////////


/////////// new package insertion /////////////////////////
    if(isset($_POST['pac_insert'])){
        $pac_id = $_POST['pacid'];
        $pac_name = $_POST['pacname'];
        $amount = $_POST['pacamount'];

        $insert_package = " insert into package_tbl(package_id,package_name,amount) values('$pac_id','$pac_name','$amount') ";
        //echo $insert_package; exit;
        $pac_result = mysqli_query($conn,$insert_package) or die("query faild");

        if($pac_result){
            // <script>alert('package inserted')</script>
            $msg = "One Record Inserted successfully!";
            echo "<script>window.open('package.php?msg=".$msg."','_SELF');</script>";
        }else{
            echo "<script>alert('Not inserted')</script>";
        }
    }
/////////// new package insertion end /////////////////////////


//////////////// new plan insertion  ///////////////////////
        if(isset($_POST['plan_insert'])){
            $plan_id = $_POST['plan_id'];
            $plan_name = $_POST['planname'];
            $duration = $_POST['duration'];
            $price = $_POST['price'];
            $description= $_POST['description'];
    
            $insert_plan = " insert into plan_tbl(plan_id,plan_name,duration,price,description) values('$plan_id','$plan_name','$duration','$price','$description') ";
           // echo $insert_plan; exit;
            $plan_result = mysqli_query($conn,$insert_plan) or die("query faild");
    
            if($plan_result){
                $msg = "One Record Inserted successfully!";
                echo "<script>window.open('plans.php?msg=".$msg."','_SELF');</script>";
            }else{
                echo "<script>alert('Not inserted')</script>";
            }
        }
//////////////// new plan insertion end  ///////////////////////


///////////// new trainer insertion  ///////////////////
    if(isset($_POST['tr_insert'])){
        $tr_id = $_POST['trid'];
        $tr_name = $_POST['trname'];
        $email = $_POST['tremail'];
        $contact = $_POST['trcontact'];
        $rate = $_POST['rate'];

        $insert_trainer = " insert into trainer_tbl(trainer_id,trainer_name,email,contact,rate) 
        values('$tr_id','$tr_name','$email','$contact',$rate) ";
        //echo $insert_trainer; exit;
        $tr_result = mysqli_query($conn,$insert_trainer) or die("query faild".mysqli_error($conn));

        if($tr_result){
            $msg = "One Record Inserted successfully!";
            echo "<script>window.open('trainers.php?msg=".$msg."','_SELF');</script>";
        }else{
            echo "<script>alert('Not inserted')</script>";
        }
    }
///////////// new trainer insertion  end ///////////////////


///////////////////////////////// display member function /////////////////////////////////////////////////
    function display_member(){
        global $conn;
        $limit = 3;
        //$page = $_GET['page'];
        //checking if page url is passing or not
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $offset = ($page-1) * $limit;

       // $sql = " select * from member_tbl ";
        $sql = " select * from member_tbl limit {$offset},{$limit}";
        $result = mysqli_query($conn, $sql) or die("query faild");

        $num = mysqli_num_rows($result);

        if($num > 0){ // i.e 1
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $mem_id = $row['member_id'];
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $email = $row['email'];
                $address = $row['address'];
                $phone = $row['contact'];
                $totalAmount = $row['total_amount'];

                echo '
                <tr>
                <td>'.$mem_id.'</td>
                <td>'.$fname.' '.$lname.'</td>
               <!-- <td>'.$email.'</td> -->
                <td>'.$address.'</td>
                <td>'.$phone.'</td>
                <td><i class="fa-solid fa-rupee-sign"></i>&nbsp;'.$totalAmount.'</td>
              <td>
               <button class="btn btn-info"><a class=" text-white text-decoration-none" href="viewMember.php?viewid='.$id.'"><i class="fa-solid fa-eye-slash"></i></a></button>
             
              </td>
              <td>
               <!-- <button type="button" class="btn btn-success edit-btn" data-eid="$id"><a  class=" text-white text-decoration-none" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a></button> -->
               <!-- <button type="button" class="btn btn-success edit-btn" data-eid="'.$id.'"><i class="fa-solid fa-pen-to-square"></i><a href="#">Edit</a></button> -->
               <button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i><a class="text-white text-decoration-none" href="updateMember.php?e_id='.$id.'">&nbsp;Edit</a></button>
               <!-- <button class="btn btn-danger delete-btn" data-id="$id"><a  class=" text-white text-decoration-none" href=""><i class="fa-solid fa-trash"></i></a></button> -->
               <button class="btn btn-danger delete-btn" data-id="'.$id.'"><i class="fa-solid fa-trash"></i></button>
            
              </td>
            </tr>
                ';
            }
            // data-toggle="modal" data-target="#editmember"
        }else{
           // echo '<script>alert("NO Record Found");</script>';
           echo '<p style="color:red;">NO Record Found</p>';
        }
    }
/////////////////////////////// display member function end here ////////////////////////////////////////////

///////////////////////////////// display package  ///////////////////////////////////////////////
  function display_package(){
    global $conn;
    $limit = 2;
    if(isset($_GET['page'])){
        $page = $_GET['page'];

    }else{
        $page = 1;
    }
    //echo $page;
    $offset = ($page - 1) * $limit;
    //$sql = " select * from package_tbl ";
    $sql = " select * from package_tbl limit {$offset},{$limit} ";
    $result = mysqli_query($conn, $sql) or die("query faild");

    $num = mysqli_num_rows($result);

    if($num > 0){ // i.e 1
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $pac_id = $row['package_id'];
            $pac_name = $row['package_name'];
            $amount = $row['amount'];

            echo '
            <tr>
            <td>'.$pac_id.'</td>
            <td>'.$pac_name.'</td>
            <td>'.$amount.'</td>
            <td>
            <button class="btn btn-success"><a class=" text-white text-decoration-none" href="package_update.php?id='.$id.'"><i class="fa-solid fa-pen-to-square"></i></a></button>
          <!--  <button class="btn btn-danger"><a  class=" text-white text-decoration-none" href="#"><i class="fa-solid fa-trash"></i></a></button> -->
            <button class="btn btn-danger  delete_pac_btn" data-id="'.$id.'"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
            ';
        }
    }else{
        echo '<script>alert("NO Record Found");</script>';
    }
}
///////////////////////////////// display package function end ///////////////////////////////////////////////

///////////////////////////////// display plan functionb /////////////////////////////////////////
  function display_plan(){
    global $conn;
    $limit = 2;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $sql = " select * from plan_tbl limit {$offset},{$limit} ";
    $result = mysqli_query($conn, $sql) or die("query faild");

    $num = mysqli_num_rows($result);

    if($num > 0){ // i.e 1
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $plan_id = $row['plan_id'];
            $plan_name = $row['plan_name'];
            $duration = $row['duration'];
            $price = $row['price'];
            $desc = $row['description'];

            // <i class="fa-solid fa-user"></i>
            echo '
            <tr>
            <td>'.$plan_id.'</td>
            <td>
                Name:&nbsp;&nbsp;'.$plan_name.'<br>
                Duration:&nbsp;&nbsp;'.$duration.' Month <br>
                Price&nbsp;&nbsp;'.$price.' <br>
                Desc&nbsp;&nbsp;&nbsp;'.$desc.'
            </td>
            <!-- <td></td> -->
            <td>
            <button class="btn btn-success"><a  class=" text-white text-decoration-none" href="plan_update.php?id='.$id.'"><i class="fa-solid fa-pen-to-square"></i></a></button>
           <!-- <button class="btn btn-danger"  data-toggle="modal" data-target="#addmember"><a  class=" text-white text-decoration-none" href="#"><i class="fa-solid fa-trash"></i></a></button> -->
            <button class="btn btn-danger delete_pln_btn" data-id="'.$id.'"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
            ';
        }
    }else{
        echo '<script>alert("NO Record Found");</script>';
    }
 }
///////////////////////////////// display plan function end //////////////////////////////////////

///////////////////////////////// display trainer function ///////////////////////////////////
  function display_trainer(){
    global $conn;
    $limit = 2;
    //$page = $_GET['page'];
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    //echo $page;
    $sql = " select * from trainer_tbl limit {$offset},{$limit} ";
    $result = mysqli_query($conn, $sql) or die("query faild");

    $num = mysqli_num_rows($result);

    if($num > 0){ // i.e 1
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $tr_id = $row['trainer_id'];
            $tr_name = $row['trainer_name'];
            $tr_email = $row['email'];
            $tr_contact = $row['contact'];
            $rate = $row['rate'];

            echo '
            <tr>
            <th scope="row">'.$tr_id.'</th>
            <td>
                <i class="fa-solid fa-user"></i>&nbsp;&nbsp;'.$tr_name.'<br>
                <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;'.$tr_email.' <br>
                <i class="fa-solid fa-phone"></i>&nbsp;&nbsp;'.$tr_contact.' <br>
                <i class="fa-solid fa-indian-rupee-sign"></i>&nbsp;&nbsp;&nbsp;'.$rate.'
            </td>
            <td>
            <button class="btn btn-success"><a  class=" text-white text-decoration-none" href="trainer_update.php?id='.$id.'"><i class="fa-solid fa-pen-to-square"></i></a></button>
           <!-- <button class="btn btn-danger"  data-toggle="modal" data-target="#addmember"><a  class=" text-white text-decoration-none" href="#"><i class="fa-solid fa-trash"></i></a></button> -->
            <button class="btn btn-danger delete_tr_btn" data-id="'.$id.'"><i class="fa-solid fa-trash"></i></button>
            </td>
            </tr>
            ';
        }
    }else{
        echo '<script>alert("NO Record Found");</script>';
    }
  }
///////////////////////////////// display trainer function end ///////////////////////////////////
?>


		