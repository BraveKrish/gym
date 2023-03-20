<?php
  session_start();
  include "/xampp/htdocs/project/new/admin/config/db_connect.php";

  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $role = $_POST['role'];

    $sql2 = " select * from member_tbl where email = '$email' && password = '$password' ";
    $result2 = mysqli_query($conn,$sql2) or die("query failed");
    $num = mysqli_num_rows($result2);
    //echo $num; exit;
    if($num>0){
        $userdata = mysqli_fetch_array($result2);
        // echo '<pre>' ;
        // print_r($userdata);
        // echo '</pre>' ;
        // exit;
        $users = mysqli_query($conn," select * FROM member_tbl where email = '$email' ");
        $usersData = mysqli_fetch_all($users,MYSQLI_ASSOC);
        // echo '<pre>' ;
        // print_r($usersData);
        // echo '</pre>' ;
        //  exit;

        $_SESSION['email'] = $email;
        $_SESSION['userdata'] = $userdata;
        $_SESSION['usersData'] = $usersData;
        echo '<script>alert(" Login Successful!!");
               window.location = "index.php";
        </script>';
    }else{
       echo '<script>alert(" Login Failed!!");
           window.location = "loginPage.php";
       </script>';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>GMS</title>
<style>
    .loginSection .formBody{
        background-color: white;
        margin-top: 15%;
        border-radius: 5px;
        box-shadow: 2px 4px 5px gray;
        padding: 50px;
    }
    .loginSection .formBody h4{
        text-align: center;
        padding: 10px;
        border-bottom: 4px solid green;
    }
    .loginSection .formBody .loginBtn{
        background-color: rgb(11,158,11);
        color: white;
        padding: 5px 15px;
        border: none;
        border-radius: 4px;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
          <a class="navbar-brand" href="#">
              <!-- <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"> -->
              Fit<span>Club</span>
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- navigation bar -->
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#service">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contactUs" >Contact</a>
              </li> 
          </div>
        </div>
    </nav>

    <section class="loginSection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    
                    <div class="formBody">
                    <div class="head">
                        <h4>Login Here</h4>
                    </div>
                        <form action="" method="POST">
                            <div class="col">
                                <div class="form-group">
                                    <label><b>Email</b></label>
                                    <input class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label><b>Password</b></label>
                                    <input class="form-control" type="text" name="password">
                                </div>
                                <div class="form-group">
                                    <input class="loginBtn" type="submit" name="login" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>