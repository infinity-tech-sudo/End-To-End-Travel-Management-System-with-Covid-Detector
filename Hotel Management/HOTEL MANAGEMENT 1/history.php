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
?>
  <head>
    <title>Infinity.com/search hotels/</title>
</head>
<h1 style="background-color:rgb(9, 47, 71);color:white;padding:20px;">Infinity.com</h1> 
<form name="form" method="post" action="cancel.php">
<label><strong><h3> Hey Admin </h3><h4>Your bookings: </h4></strong></label><br />
<table border="0" width="100%">
<tr>
<?php 
$count = 0;
$hotelid = $_SESSION['hotelid'];
$query = mysqli_query($con,"SELECT * FROM booking_details_t where Hotel_id = $hotelid ORDER BY Booking_id DESC");
$his = mysqli_fetch_array($query);
if($his==0){
        echo '<script>alert("No bookings is there!!"); location = "admin.php";</script>';
}
foreach($query as $row){
 $count++;
?>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"> Customer name :
<?php echo $row["User_name"]; ?>
</td>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"> mailid :
<?php echo $row["User_email"]; ?>
</td>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"> contact no :
<?php echo $row["User_phone_no"]; ?>
</td>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">Check_in_date :
<?php echo $row["Check_in_date"];?>
</td>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"> Check_out_date :
<?php echo $row["Check_out_date"];?>
</td>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"> Total Rent :
<?php echo $row["Hotel_rent"];?>
</td>
<?php
if($count == 1) { // three items in a row
        echo '</tr><tr>';
        $count = 0;
    }
} ?>
</tr>
</table>
