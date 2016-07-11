<?php
	session_start();
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
	<meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">	
      
    <title>Login</title>
      
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
    <link href="indexcss.css" rel="stylesheet" type="text/css" />
    <!--	<script src="formsubmit.js"></script>	-->
    <!--	<link href="sb.css" rel="stylesheet" type="text/css" />	-->
	<!--	<link href="payment.css" rel="stylesheet" type="text/css" />	-->
</head>
<body >
<?PHP
	echo "<div class='sign-in-menu'>";
		//if an employee is logged in
		if(isset($_SESSION['employeefirstname']))
		{
			$displayname = $_SESSION['employeefirstname'];
			echo "<ul><li>
					<a href='staff-home.php'>Welcome $displayname</a>
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

					
	<header>
		<div class="HotelName">
			<h1 id="hotel-title"><a href="index.php">Toro Hotel</a></h1>
		</div>
	</header>
			
	<ul id="main-menu"> <!-- given class name -->
		<li><a href="find-a-room.php" target = "">Find a room</a></li>
		<li><a href="room-selection.php" target="">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" target="">Maps and Directions</a></li>
		<li><a href="hotel-details.php" target="">Hotel Details</a></li>
		<li><a href="things-to-do.php" target="">Things to do</a></li>	
	</ul>
		
	<center>
		<form class="registerform" ACTION="checkemployee.php" METHOD="POST" TARGET=_self style="width:300px; height:300px; background-color:rgba(255,0,0,0.5);">
			<fieldset style="border:none;">
				<legend>
					<H1>Employee Login</H1>
				</legend>
				<BR><BR>
			Employee ID Number:
			<INPUT TYPE="text" NAME='empid' VALUE="" SIZE="10" MAXLENGTH="10" PLACEHOLDER="Employee ID*"/required><BR><BR>
			Password:
			<INPUT TYPE="password" NAME='fpass' VALUE="" SIZE="10" MAXLENGTH="10" PLACEHOLDER="Password*"/required><BR><BR><BR>
			<INPUT TYPE="submit" VALUE="Employee Log In"><BR><BR>
			</fieldset>
		</form>
	</center>

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

