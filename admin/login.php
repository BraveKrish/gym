<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management</title>
    <!-- links -->
    <?php require_once "../admin/config/style-and-meta.php"; ?>
    <style>
        body{
            /* background-color: rgba(0, 0, 0,0.5); */
            background-image: linear-gradient(rgba(0, 0, 0,0.5),rgba(0, 0, 0,0.5)), url("../admin/assets/images/best.jpeg");
            /* background-size: cover; */
            height: 100vh;
            /* background-position: center; */
        }
        #form_container{
            margin-top: 110px;
            border-radius: 15px;
            /* border-top-left-radius: 10px;
            border-bottom-right-radius: 10px; */
            border: 3px solid gray;
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }
        /* .btn1:hover{
            background-color: white;
            border: 1px solid black;
            color: black;
        } */

    </style>
</head>
<body>
   
   <div class="container">
       <div class="row justify-content-center">
           <div id="form_container"  class="col-6 bg-white">
           <!-- <h1 class="mx-5 ">Gym MS</h1> -->
           <h3 class="mx-5 mt-2 text-center ">Admin Login</h3>
           <hr>
           <form action="login_validation.php" method="POST">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- <label class="mx-5 font-weight-bold">Select Role</label> -->
                            <select  class="mx-5 my-1  px-5 p-1" name="login_type">
                                <!-- <option>Chose Role</option> -->
                                <option value="admin" selected>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10">
                            <input type="text" name="username" class="form-control mx-5 my-3 p-2" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10">
                            <input type="text" name="password" class="form-control mx-5 my-3 p-2 " placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10">
                            <input type="submit" name="login" class="btn1 mx-5 mt-3 mb-2" value="Login">
                        </div>
                    </div>
                    <!-- <div class="links mx-5 py-2">
                        <a href="#">Forget password</a>
                        <p>Don't have an account? <a href="#">Register here</a></p>
                    </div> -->
                </form>

           </div>
       </div>
   </div>
    
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>