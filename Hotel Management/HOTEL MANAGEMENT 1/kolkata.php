<?php
    session_start();
    if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                                             // true then header redirect it to the home page directly 
    {
        $display_name = $_SESSION['use'];
         $_SESSION['status'] = 1;
    }
    else {
        $_SESSION['status'] = 0;
     }
  ?>  
    
<!DOCTYPE html>
<html>
    <head>
    <title>Infinity.com/search hotels/</title>
</head> 
<body>
<h1 style=" top: 8px;
        left: 16px;color:rgb(128, 25, 25);padding:0px; font-size: 60px;"><b>Infinity...</b></h1>
        <div>
        <marquee behavior="scroll" direction="right"  style=" top: 8px;
        left: 16px;color:rgb(37, 7, 65);padding:0px; font-size: 40px;" onmouseover="stop()" onmouseout="start()">To Book any Hotel please <a href="loginpage.html">login!</a></marquee>

        <form name="myForm"  action = "bookingpage.php" method = "POST">
        <table id = "mytable">
         <tr>
            <th style="background-color:white;color:black;padding:20px;font-size:30px;">Hotel's Name..</th>
            <th style="background-color:white;color:black;padding:20px;font-size:30px;">Hotel's view..</th>
            <th style="background-color:white;color:black;padding:20px;font-size:30px;"> Rent per day..</th>
            <th style="background-color:white;color:black;padding:20px;font-size:30px;"> Quarantine centre..</th>
            <th style="background-color:white;color:black;padding:20px;font-size:30px;"> Location..</th>
         </tr>
            
             <?php     
               $con = mysqli_connect("localhost","root","", "infinity");
                // Make sure we connected successfully
            if(! $con)
            {
                 die('Connection Failed'.mysqli_error());
            }
                $query = "SELECT * FROM hotel_t where Hotel_place = 'Kolkata'";  
                $query_run = mysqli_query($con,$query);
                if (!$query_run) {
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                }
                while($count = mysqli_fetch_array($query_run)) {
                    if($count['Hotel_quarantine']==1){
                        $quarantine = 'Quarantine centre is available here';
                    }
                    else{
                        $quarantine = 'Quarantine centre is not available here';
                    }
                    echo '
                    <tr>
                       <td id = "hotelid" style ="display: none;">'.$count['Hotel_id'].'</td>
                        <td id = "hotelname"style ="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">'.$count['Hotel_name'].'</td>
                        <td>
                        <img src="image/uploads/'.$count['Hotel_pictures'].'" class="img-responsive thumbnail" height = "600" width ="600" alt="Image"id="img1"> <!--Id Is Img-->
                        </td>
                        <td id = "hotelprice" style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">'.$count['Hotel_rent'].'<br>
                        </td>
                        <td id = "quarantine" style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">'.$quarantine.'<br>
                        </td>
                        <td id = "area" style="background-color:rgb(9, 47, 71);color:white;padding:20px; font-size: 30px;">'.$count['hotel_sub_place'].'<br>
                        </td>
                        </tr>
                        ';
                
                }
                ?>
                </table>
            </form>
            </div>
          
    </script> 
                </body>
                </html>