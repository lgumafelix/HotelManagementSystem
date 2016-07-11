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
	
	<!-- fonts	-->
	<link href='https://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1252">	
    <TITLE>Get Customer Information</TITLE>
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
	
</head>
<body class="staff-body">
	<?PHP
	echo "<div class='sign-out-menu'>";
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
					<a href='log-in-staff.php'>Log In</a>
				</li></ul>";
		}
	echo "</div>";
	?>
	
	<!--contains staff login icon-->
	<header>
		<div class="HotelName">
			 <h1 ><a href="staff-home.php">Toro Hotel</a></h1> 
		</div>
	</header>

	<ul id="main-menu"> <!-- given class name -->
		<li><a href='getcustomerinfo.php'>Make a Reservation</a></li>
		<li><a href='viewrsvp.php'>List Reservation</a></li>
		<li><a href='cancelrsvp.php'>Cancel Reservation</a></li>
		<li><a href='todayrsvp.php'>Check In Guest</a></li>	
		<li><a href='todayrsvp2.php'>Check Out Guest</a></li>
		<li><a href='displaywaitlist.php'>Display Waiting List</a></li>
		<li><a href='viewwaitlist.php'>Cancel a Waiting List</a></li>
		<li><a href='addemployee.php'>Add Employee</a></li>
		<li><a href='editlistemployee.php'>Edit Employee</a></li>
		<li><a href='deletelistemployee.php'>Delete Employee</a></li>
		<li><a href='listemployee.php'>List Employees</a></li>
	</ul>


	<center>
	<FORM ACTION="handlecustomerinfo.php" METHOD="POST" TARGET=_self>
		
		<H3>Enter Customer Email:</H3><INPUT Type="text" NAME="cemail" ID="cemail"/>
		<BR><BR><BR>
		
		<INPUT TYPE="submit" VALUE="Confirm Customer email"><BR><BR><BR>
	</FORM>
	</center>
	
	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul class="staff-footer">
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



