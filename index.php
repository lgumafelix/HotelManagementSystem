<?php
	session_start();
		/*global session variables that are kept track on this page:
		Session variables of Employee
		$_SESSION['employeeid']
		$_SESSION['employeefirstname']
		$_SESSION['employeelastname']
		$_SESSION['employeepassword']
		$_SESSION['employeeposition']
		
		and Session variable of Customer
		$_SESSION['customeremail']
		$_SESSION[customerid']
		$_SESSION['customerfirstname']
		$_SESSION['customerlastname']
		$_SESSION['customerpassword']*/
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	
   <!--
      CSC 481 Software Engineering
      Fall 2015
      CSUDH

      The Toro Hotel Management System
      Author: 
      Date:   2015

      Filename:         html
      Supporting files: modernizr-1.5.js
   -->
	
	<!-- fonts	-->
	<link href='https://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">	
    <title>Toro Hotel</title>
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
    <link href="indexcss.css" rel="stylesheet" type="text/css" />
     
 

	<script type="text/javascript">
	var image1 = new Image()
	image1.src = "ToroHotel.jpg"
	var image2 = new Image()
	image2.src = "doubleroom.png"
	var image3 = new Image()
	image3.src = "suite.png"
	var image4 = new Image()
	image4.src = "singleroom.png"
	var image5 = new Image()
	image5.src = "bed02.jpg"
	var image6 = new Image();
	image6.src = "bathroom.jpg"
	var image7 = new Image();
	image7.src = "pool.jpg"
	var image8 = new Image()
	image8.src = "pool01.jpg"
	var image9 = new Image();
	image9.src = "csudh.png"
	var image10 = new Image();
	image10.src = "stubhubcenter.png"
	var image11 = new Image();
	image11.src = "background-9.jpg"
	var image12 = new Image();
	image12.src = "background-10.jpg"
	var image13 = new Image();
	image13.src = "city1.png"

	</script>


</head>
<body>	
<?PHP
	echo "<div class='sign-in-menu'>";
		//if a customer is logged in
		if(isset($_SESSION['customerid']))
		{
			//display customer's first name and Log Out combo
			$displayname1 = $_SESSION['customerfirstname'];
			echo "<ul><li>
					<a href='customer-home.php'>Welcome $displayname1</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		//if an employee is logged in
		else if(isset($_SESSION['employeeid']))
		{
			//display employee's first name and Log Out combo
			$displayname2 = $_SESSION['employeefirstname'];
			echo "<ul><li>
					<a href='staff-home.php'>Welcome $displayname2</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		else
		{
			//display a generic Welcome Guest and Log In combo
			echo "<ul><li>
					<a href='register.php'>Join Now!</a>
					<a href='log-in-customer.php'>Log In</a>
				</li></ul>";
		}
	echo "</div>";
	?>

	<header>
		<div class="HotelName">
			 <h1 ><a href="index.php">Toro Hotel</a></h1> 
		</div>
	</header>

	<ul id="main-menu"> <!-- given class name -->
		<li><a href="findaroom.php" >Find a room</a></li>
		<li><a href="room-selection.php" target="">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" target="">Maps and Directions</a></li>
		<li><a href="hotel-details.php" target="">Hotel Details</a></li>
		<li><a href="things-to-do.php" target="">Things to do</a></li>	
	</ul>
	
	<div class="SlidePhotos">
<center>
	<img  src="ToroHotel.jpg" width="850" height="400" name="slide" />
	</center>
</div>

<script type="text/javascript">
        var picture=1;
        function slideShow()
        {
            document.images.slide.src = eval("image"+picture+".src");
            if(picture<13)
                picture++;
            else
                picture=1;
            /*setTimeout("slideShow()",3000);*/
	setTimeout("slideShow()",2500);

        }
        slideShow();
</script>




	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul id="homeMenu2">
		<li>
		<a class="linked" href="index.php">Home</a>
		<a class="linked" href="about.php" >About Toro Hotel</a>
		<a class="linked" href="log-in-staff.php" >Staff Login</a>
		<a class="linked" href="careers.php" >Careers</a>
		<a >Call Us (310) 243-TORO</a>
		<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a>
		</li>		
	</ul>
	</footer>
</body>
</html>
