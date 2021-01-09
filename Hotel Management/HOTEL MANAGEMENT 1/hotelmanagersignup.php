<?php

// Connect to the database
$con = mysqli_connect("localhost","root","", "infinity");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}
//echo 'connected';
 
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];                 
        $emailid=$_POST['emailid'];
        $mono=$_POST['mono'];
        $password=$_POST['password'];

        $query = "SELECT * FROM hotel_manager_t WHERE email = '$emailid'";
        $query_run = mysqli_query($con,$query);
       // echo 'query';
        $count = mysqli_fetch_array($query_run);
        //echo 'search';
        if (!$query_run) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        if($count>0){
            mysqli_close($con);
            echo '<script type ="text/javascript">alert("users already exists, please login");location="hotelmanagerlogin.html";</script>';
            //header('Location: loginpage.html');
        }
        else {
         $query = "INSERT INTO hotel_manager_t (`hotel_manager_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`) 
         VALUES ('','$fname','$lname','$emailid','$password','$mono')";
        $query_run = mysqli_query($con,$query);
        if (!$query_run) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        else {
            session_start();
            $_SESSION['use']='admin';
            $_SESSION['email']=$emailid;
            header('Location: admin.php');
        }
    }
        

?>