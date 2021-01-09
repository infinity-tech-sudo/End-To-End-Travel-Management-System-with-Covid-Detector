<?php
session_start();   // session starts with the help of this function 


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
    <style>
  input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

       div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

    </style>
</head>
    <body>
    <h1 style=" top: 8px;
        left: 16px;color:rgb(128, 25, 25);padding:0px; font-size: 60px;"><b>Infinity...</b></h1>
       <marquee behavior="scroll" direction="left"  style=" top: 8px;
        left: 16px;color:rgb(37, 7, 65);padding:0px; font-size: 40px;">To Add Your New Hotel ...please Fill up the below form.......</marquee>

<div>
  <form name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data" action="hupload.php" method="post">
    <label for="hname">Hotel Name :</label>
    <input type="text" id="hname" name="hname" placeholder="Your Hotel name..">
    <label for="hplace">Town :</label>
    <input type="text" id="hplace" name="hplace" placeholder="Place name..">
    <label for="area">Area:</label>
    <input type="text" id="area" name="area" placeholder="name of the area..">
    <label for="hrent">Hotel rent per day: </label>
    <input type="text" id="hrent" name="hrent" placeholder="Rent per day..">
    <label>Quarentine center</label><br>
        <input type="radio" id="occu1" name="occu1" value="1"/>Yes<br>
        <input type="radio" id="occu1" name="occu1" value="0"/>No<br>
      
    <label>Select Image File:</label>
    <input type="file" name="image">
    <label><br>
      <input type="checkbox" checked="checked" name="terms"> I accept terms & conditions
    </label>
    <input type="submit" name = "submit"  value="upload">
      <div class="container" style="background-color:#f1f1f1">
        <button type="reset" value= "Reset" class="cancelbtn">Cancel</button>
    </div>

  </form>
</div>
 </body>
 <script>
      function validateForm() {
        var x = document.forms["myForm"]["hname"].value;
        if (x == "") {
          alert("Hotel name is missing!!please put your Hotel name");
          return false;
        }
        var x = document.forms["myForm"]["hplace"].value;
        if (x == "") {
          alert("city's name is missing!!please put city's name");
          return false;
        }
        var x = document.forms["myForm"]["area"].value;
        if (x == "") {
          alert("area's name is missing!!please put area's name");
          return false;
        }
        var x = document.forms["myForm"]["hrent"].value;
        if (x == "") {
          alert("rent is missing!!please put rent's amount");
          return false;
        }
        var x = document.forms["myForm"]["occu1"].value;
            if (x == "") {
             alert("please select yes or no for quarantine center");
              return false;
            } 
        } 
      
      </script>
 </html>