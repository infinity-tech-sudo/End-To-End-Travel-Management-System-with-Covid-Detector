
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
    <title>Infinity.com/hotels booking site</title>
    <style>
    .bg {
        background-image: url(image/Front/bg.jpg);
        background-size: cover;
      }
    input[type=text], select {
        width: 75%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #070925e1;
  font-size: 30px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  font-weight: bold;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: rgb(48, 5, 10);
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
</style>
<script>
function validateForm() {
        var x = document.forms["search"]["srch"].value;
        if (x == "") {
          alert("place name is missing!!please put place name");
          return false;
        }
}
    </script>
    </head>
    <body class ="bg">
        <div style="color:white;padding:20px;">
            <h1>Infinity.com</h1>
            
                <div>
                 <div class="welcome" id = "welcome" >Welcome <b><?php echo $display_name; ?></b>, You have successfully logged in!<br></div>
                    <div align = "right" class = "bookinghist" id ="bookinghist"><a href="bookinghistory.php"><button>Booking History</button></a></div>
                    <div align = "right" class = "logout" id ="logout"><a href="logoutpage.php"><button>logout</button></a></div>
                </div>
            
        </div>
        <div style="color:white;padding:20px;">
            <p><b>Find your ideal place to stay.....</b></p>
            <p> Try searching for your favourite place....</p>
            <form name="search" onsubmit="return" action = "search2.php" method = "POST">
            <input type="text" id="srch" name="srch" placeholder="please enter your place or city name"><br>
            <input type="submit" id ="submit" value="submit">
            </form>

        <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext">1 / 4</div>
      <img src="image/Front/631893-india-gate.jpg" style="width:100%">
      <div class="text">WELCOME TO DELHI</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 4</div>
      <img src="image/Front/west-bengal-kolkata-148318639273-orijgp.jpg" style="width:100%">
      <div class="text">WELCOME TO KOLKATA</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 4</div>
      <img src="image/Front/karnataka-bangalore-149527461747o.jpg" style="width:100%">
      <div class="text">WELCOME TO BANGALORE</div>
    </div> 

    <div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
        <img src="image/Front/GettyImages-1008831236-5c65d6bf4cedfd00014aa310.jpg" style="width:100%">
        <div class="text">WELCOME TO MUMBAI </div>
      </div>
    
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
  </div>
  </div>

  <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    
    </script>
    </body>
    </html>
    <?php>
    ?>