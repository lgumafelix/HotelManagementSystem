<?php
	session_start();
	/* 	if($_SESSION['fromfindaroom'] == false){
		//redirect to findaroom
		header("Location: findaroom.php");
	}
	else{
	   //reset the variable
	   $_SESSION['fromfindaroom'] = false;
	}
		//redirect to findaroom if not sent from there
		 */
	/*session_start();
	if($_SESSION['fromfindaroom']!=true){
		header("Location: findaroom.php");
	}*/
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
	<title>Create an Account</title>
	<script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
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
		<h1 id="hotel-title"><a href="index.php">Toro Hotel</a></h1>
		</div>
	</header>

	<ul id="main-menu"> <!-- given class name -->
		<li><a href="findaroom.php" target = "">Find a room</a></li>
		<li><a href="room-selection.php" target="">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" target="">Maps and Directions</a></li>
		<li><a href="hotel-details.php" target="">Hotel Details</a></li>
		<li><a href="things-to-do.php" target="">Things to do</a></li>	
	</ul>
	
	<center>

		<form class="registerform" ACTION="createcustomer.php" METHOD="POST" TARGET=_self ><BR>

			<fieldset style="border: none;">

					<H1>Create an Account</H1>
					<br>

			Email Address:
			<INPUT  TYPE="text" NAME="femail" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="Email Address*"/required><BR><BR>
			First Name:
			<INPUT TYPE="text" NAME="firstname" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="First Name*"/required><BR><BR>
			Last Name:
			<INPUT TYPE="text" NAME="lastname" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="Last Name*"/required><BR><BR>
			Create password:
			<INPUT TYPE="password" NAME="fpass" VALUE="" SIZE="20" MAXLENGTH="10" PLACEHOLDER="Set up Password*"><BR><BR>
			<INPUT TYPE="submit" VALUE="Register"><BR><BR>
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
