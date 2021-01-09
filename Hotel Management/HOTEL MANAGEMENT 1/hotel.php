<?php
    session_start();
    if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                                             // true then header redirect it to the home page directly 
    {
        $display_name = 'admin';
        $_SESSION['status'] = 1;
        $email = $_SESSION["email"];
    }
    else {
        $_SESSION['status'] = 0;
     }
  ?>  
    
    <head>
    <title>Infinity.com/search hotels/</title>
</head>
<h1 style="background-color:rgb(9, 47, 71);color:white;padding:20px;">Infinity.com</h1> 
<form name="form" method="post">
<h1> Hey <i><b><?php echo $display_name;?></b></i></h1>
<marquee behavior="scroll" direction="right"  style=" top: 8px;
        left: 16px;color:rgb(37, 7, 65);padding:0px; font-size: 20px;"><h4>To Update Your Hotels Select Hotel and click Update options: </h4></marquee><br />
<marquee behavior="scroll" direction="lrft"  style=" top: 8px;
        left: 16px;color:rgb(37, 7, 65);padding:0px; font-size: 20px;"><h4>To check Booking History Select Hotel and click Booking History options: </h4></marquee><br />
        
<table border="0" width="100%">
<tr>
<?php 
$con = mysqli_connect("localhost","root","", "infinity");
 // Make sure we connected successfully
if(! $con)
{
  die('Connection Failed'.mysqli_error());
}
$query = "SELECT * FROM hotel_manager_t WHERE email = '$email'";
$query_run = mysqli_query($con,$query);
$coun = mysqli_fetch_array($query_run);
  if (!$query_run) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
  if($coun>0){
    $_SESSION['managerid'] =$coun["hotel_manager_id"];
    $userid = $_SESSION['managerid'];
  }
$count = 0;
$query = mysqli_query($con,"SELECT * FROM hotel_t where hotel_manager_id = $userid");

foreach($query as $row){
 $count++;
?>
<td style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">
<input type="radio" name="Hotels[]" 
value="<?php echo $row["Hotel_id"]; ?>">
</td>
<td style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">
<?php echo $row["Hotel_name"]; ?>
</td>
<td>
<img src="image/uploads/<?php echo $row['Hotel_pictures']; ?>" class="img-responsive thumbnail" height = "600" width ="600" alt="Image"id="img1"> <!--Id Is Img-->
</td>
<td id = "hotelprice" style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"><?php echo'$'.$row['Hotel_rent'].'/per night';?></td>
<?php
if($row['Hotel_quarantine']==1){
  $quarantine = 'Quarantine centre is available here';
 }
else{
  $quarantine = 'Quarantine centre is not available here';
}
?>
<td id = "quarantine" style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"><?php echo $quarantine; ?><br>
</td>
<td id = "area" style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;"><?php echo $row["hotel_sub_place"]; ?><br>
</td>
<?php
if($count == 1) { // three items in a row
        echo '</tr><tr>';
        $count = 0;
    }
} 
?>
</tr>
</table>
<input style ="width: 40%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            float: left;
            cursor: pointer;"type='submit' name='update' value="UPDATE" formaction="hotelupdate.php">
  <input style ="width: 40%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            float: right;
            cursor: pointer;"type='submit' name='history' value="BOOKING HISTORY" formaction="history.php">          
</form>

