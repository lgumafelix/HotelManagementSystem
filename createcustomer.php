<?php
	if(!isset($_POST["fname"]))
		{
		session_start();
		}
	else
		{
		session_start();
		$name = strip_tags($_POST["fname"]);
		$_SESSION["username"] = $name;
		}
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
	<title>Create Log In</title>
	<script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
      
    <!--	<script src="formsubmit.js"></script>	-->
    <!--	<link href="sb.css" rel="stylesheet" type="text/css" />	-->
	<!--	<link href="payment.css" rel="stylesheet" type="text/css" />	-->
</head>
<body>

	<div class="sign-in-menu">
	<ul>
		<li><a href="register.php" >Join Now</a>  <a href="log-in-customer.php" >Log In</a> </li>
	</ul>
	</div>
	
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
	<header>
		<header><h1>Register Now</h1></header>
	</header>
	</center>

	<center>
	<?PHP
    //if (!isset($_POST["fname"])) 
	//{
    // User tried to enter without going through main, send to main
	//	header("Location: index.php");
	//}
	// If we are here, user used form
	// first connect to database
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = 'password';
	$db_mydb = "torohotel";
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(!$conn)
		{
			echo "Could not connect: " . mysql_error()."<BR>";
		}
	//select databse to use
	mysql_select_db('torohotel');
	
	// pull out the information from the form page
		$email = $_POST['femail'];
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$password = $_POST['fpass'];

		$sql = "INSERT into customer (FirstName, LastName, Email, Password)".
				"values ('$fname', '$lname', '$email', '$password')";
		$retval = mysql_query($sql, $conn);
			
		if((($retval))== 0)
		{
			echo "Error<BR>".
				"<A HREF='register.php'>Try Again.";
		}
		else
		{ 
			// successfully created an account
			echo
				//header("Location: ");
				"Account has been created!<BR><BR>".
				"<A HREF='log-in-customer.php'><button type='button'>Click to Log In";
		}
		mysql_close($conn);
	?>
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
