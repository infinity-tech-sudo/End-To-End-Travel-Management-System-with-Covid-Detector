<?php

// Connect to the database
$con = mysqli_connect("localhost","root","", "infinity");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}
$emailid=$_POST['emailid'];
$query = "SELECT * FROM user_details_t WHERE email_id = '$emailid'";
        $query_run = mysqli_query($con,$query);
        $count = mysqli_fetch_array($query_run);
        if (!$query_run) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
 if($count>0){
     $password = $count["password"];
     mysqli_close($con);
    echo '<script type ="text/javascript">alert("your password is '.$password.' \nLogin please..."); location = "loginpage.html";</script>';

 }

?>