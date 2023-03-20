<?php
    require "../config/db_connect.php";

    ///////////service insertion ////////////////
   if(isset($_POST['insert_service'])){
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
       
        //echo $image_folder;

        $insert_service = " INSERT into our_services(title,description,photo) 
        values('$title','$description','$file_name') ";
       // echo $insert_service; exit;
        $service_result = mysqli_query($conn,$insert_service) or die("query faild!!!".mysqli_error($conn));

     // print_r($insert_member);

     if($service_result){
        // $_SESSION['success'] = "One Record Inserted sucessfully!";
       $msg = "One Record Inserted successfully!";
       echo "<script>window.open('profile.php?msg=".$msg."','_SELF');</script>";
      //  echo "<script>alert('Inserted')</script>";
     }else{
      $msg = "Insertion failed";
      echo "<script>alert('Not inserted')</script>";
     }
    }
  }
//////////////member insertion end here//////////

function select_services(){
  global $conn;
  $sql = " select * from our_services ";
  $result = mysqli_query($conn,$sql);

  $num = mysqli_num_rows($result);
  //echo $num;

  if($num>0){
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['title'];
        $description = $row['description'];
        $photo = $row['photo']; 


        echo '
        <tr>                                                               
            <td>'.$title.'</td>
            <td>'.$description.'</td>
            <td>
                <img style="height: 60px; width:80px;" src="'.$photo.'" alt="">
            </td>
            <td>
                <button class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn btn-danger"><a  class=" text-white text-decoration-none" href="#"><i class="fa-solid fa-trash"></i></a></button>
            </td>
        </tr>
        ';
    }
  }
}

?>