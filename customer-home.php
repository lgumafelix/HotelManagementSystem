<?php
	session_start();
	if(!isset($_SESSION["customerid"]))
		{
			header("Location: index.php");
		}
		/*global session variables that are kept track on this page.
		$_SESSION['customeremail']
		$_SESSION['customerid']
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
      
    <title>Toro Hotel Home</title>
      
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
	
</head>
<body class="customer-body">
	<?PHP
	echo "<div class='sign-out-menu'>";
		//if a customer is logged in
		if(isset($_SESSION['customerid']))
		{
			//display customer's first name and Log Out combo
			$displayname = $_SESSION['customerfirstname'];
			echo "<ul><li>
					<a href='customer-home.php'>Welcome $displayname</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		else
		{
			//display a generic Welcome Guest and Log In combo
			echo "<ul><li>
					<a href='index.php'>Welcome Guest!</a>
					<a href='log-in-customer.php'>Log In</a>
				</li></ul>";
		}
	echo "</div>";
	?>
	<!-- maybe have icon for customers?? -->
	<header>
		<div class="HotelName">
			 <h1><a href="customer-home.php">Toro Hotel</a></h1> 
		</div>
	</header>

	<ul id="main-menu"> <!-- given class name -->
		<li><a href="myrsvp.php">My Reservation</a></li>
		<li><a href="findaroom.php" >Find a room</a></li>
		<li><a href="room-selection.php">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" >Maps and Directions</a></li>
		<li><a href="hotel-details.php" >Hotel Details</a></li>
		<li><a href="things-to-do.php" >Things to do</a></li>		
	</ul>
	
	<!-- data for table centered in the page	-->
	<center>

	</center>
	
	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul id="homeMenu2">
		<li>
		<a class="linked" href="customer-home.php">Home</a>
		<a class="linked" href="about.php" >About Toro Hotel</a>
		<a class="linked" href="careers.php" >Careers</a>
		<a >Call Us (310) 243-TORO</a>
		<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a>
		</li>		
	</ul>
	</footer>
</body>
</html>
