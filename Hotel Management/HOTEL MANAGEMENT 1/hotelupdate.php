<?php
session_start();
// Connect to the database
$con = mysqli_connect("localhost","root","", "infinity");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}
$emailid = $_SESSION['email'];
if (!empty($_POST['Hotels'])){
if (is_array($_POST['Hotels'])) {
//$status = "<strong>You selected :</strong><br />";
foreach($_POST['Hotels'] as $Hotel_id){
$query = mysqli_query
    (
    $con,
    "SELECT * FROM hotel_t WHERE `Hotel_id`='$Hotel_id'"
    );
$row = mysqli_fetch_assoc($query);
$_SESSION['hotelid'] = $row['Hotel_id'];

   } 
  } 
} 
  header('Location: hotelupdate.html');
?>