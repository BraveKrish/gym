<?php
   require "/xampp/htdocs/project/new/admin/config/db_connect.php";

   if(isset($_POST['message_submit'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];
       $gender = $_POST['gender'];
       $address = $_POST['address'];
       $message = $_POST['message'];

       //echo $gender;
       $sql = " insert into enquiry_tbl(name,email,phone,gender,address,message) 
       values('$name','$email','$phone','$gender','$address','$message') ";
       $result = mysqli_query($conn,$sql) or die("query faild");
       if($result){
            echo '
             <script>alert("Inserted");</script>
            <script>window.open("index.php","_self")</script>
            ';
       }else{
           echo '
           <script>alert("Not Inserted");</script>
           <script>window.open("index.php","_self")</script>';
       }
   }

//    <!-- plan,package,fname,lname,email,contact,address,gender,start_date -->
   if(isset($_POST['save'])){
      $plan = $_POST['plan'];
      $package = $_POST['package'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $contact = $_POST['contact']; 
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $start_date = $_POST['start_date'];
// `id`, `firstname`, `lastname`, `email`, `contact`, `address`, `gender`, `plan`, `package`, `start_date`
      $sql1 = " insert into enroll(firstname,lastname,email,contact,address,gender,plan,package,start_date)
       values('$fname','$lname','$email','$contact','$address','$gender','$plan','$package','$start_date') ";
    //    echo $sql1; exit;
       $result1 = mysqli_query($conn,$sql1);

       if($result1){
        echo '
        <script>alert("Your request has been submitted");</script>
        <script>window.open("index.php","_self")</script>';
        // $msg = "Your request has been submitted";
        // echo "<script>window.open('enroll.php?msg=".$msg."','_SELF');</script>";
        }else{
       echo '
       <script>alert("Not submitted");</script>
       <script>window.open("enroll.php","_self")</script>';
    }

   }
?>
<!-- name email phone gender address message message_submit -->

<!-- 
    <script>alert("inserted");</script>
    <script>window.open("index.php","_self")</script>
 -->
 <!-- create table enquiry_tbl(
    id int not null,
    name varchar(30) not null,
    email varchar(30) not null,
    phone bigint(15) not null,
    address varchar(30) not null,
    message varchar(30) not null,
    PRIMARY KEY(id) 
); -->
