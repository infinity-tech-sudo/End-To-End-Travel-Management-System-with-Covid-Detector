<?php
session_start();

$name = $_POST["hname"];
$hrent = $_POST["hrent"];
$hplace = $_POST["hplace"];
$harea = $_POST["area"];
$quarantine = $_POST["occu1"];
$email = $_SESSION["email"];
//$fileName = basename($_FILES["image"]["name"]); 
        //$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
      //  $image = $_FILES['image']['tmp_name']; 
if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
  echo '<script type ="text/javascript">alert("Please select an image"); location = "hotelupdate.html";</script>';
}
       /* $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        $imagename = addslashes($_FILES['image']['name']);
        $image=base64_encode($image);*/
else {
  $filename = $_FILES["image"]["name"]; 
  $tempname = $_FILES["image"]["tmp_name"];     
      $folder = "image/uploads/".$filename; 
  $con = mysqli_connect("localhost","root","", "infinity");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}
echo $email;
$query = "SELECT * FROM hotel_manager_t WHERE email = '$email'";
$query_run = mysqli_query($con,$query);
  $count = mysqli_fetch_array($query_run);
  if (!$query_run) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
  if($count>0){
    $userid=$count["hotel_manager_id"];
  
$query = "INSERT INTO hotel_t(`Hotel_id`,`Hotel_name`,`Hotel_place`,`Hotel_rent`, `hotel_sub_place`,`available`,`hotel_manager_id`,`Hotel_quarantine`,`Hotel_pictures`)
VALUES ('','$name','$hplace','$hrent','$harea','1','$userid','$quarantine','$filename')";
 $query_run = mysqli_query($con,$query);
 if (!$query_run) {
     printf("Error: %s\n", mysqli_error($con));
     exit();
 }
 move_uploaded_file($tempname, $folder);
 echo '<script type ="text/javascript">alert("Hotel Upload Successful"); location = "admin.php";</script>';
}
}
 ?>