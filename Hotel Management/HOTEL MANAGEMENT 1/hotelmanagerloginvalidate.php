<?php
session_start();

$email = $_POST["emailid"];
$pass = $_POST["password"];

// Connect to the database
$con = mysqli_connect("localhost","root","", "infinity");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}

  $query = "SELECT * FROM hotel_manager_t WHERE email = '$email' and password = '$pass'LIMIT 1";
  $query_run = mysqli_query($con,$query);
  $count = mysqli_fetch_array($query_run);
  if (!$query_run) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
  if($count>0){
    $_SESSION['use']='admin';
    $_SESSION['email']=$count["email"];

    header('Location: admin.php');
  }
  else {
    echo '<script type ="text/javascript">alert("your credential is not valid, please try again"); location = "hotelmanagerlogin.html";</script>';
  }
?>