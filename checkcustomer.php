<?php
	if(!isset($_POST["femail"]))
		{
			header("Location: index.php");
		}
	else
		{
		//start the session and pull out data from FORM
		session_start();
		$email = strip_tags($_POST["femail"]);
		$password = strip_tags($_POST["fpass"]);
		
		//connect to database so we can make a query to pull out
		//additional information from the customer
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = 'password';

		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db('torohotel');
		
		//query customer's first name, last name and customer ID
		$sql = "SELECT FirstName, LastName, CustomerID
				FROM customer
				WHERE Email='$email' and Password='$password'";
		$retval = mysql_query($sql, $conn) or die(mysql_error());
		$result = mysql_fetch_array($retval);
		
		//store the query result to PHP variables
		$fname =  $result['FirstName'];	
		$lname = $result['LastName'];
		$cid = $result['CustomerID'];
		
		/*global session variables to keep track of customer's info
		that will be passed to customer-home.php */
		$_SESSION['customeremail'] = $email;
		$_SESSION['customerid'] = $cid;
		$_SESSION['customerfirstname'] = $fname;
		$_SESSION['customerlastname'] = $lname;
		$_SESSION['customerpassword'] = $password;
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
      
    <title>Log In Error</title>
	
	<script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="sign-in-menu">
		<ul>
			<li>
			<a href="register.php">Join Now</a>
			<a href="log-in-customer.php" >Log In</a>
			</li>
		</ul>
	</div>
	
	<header>
		<div class="HotelName">
			<h1 id="hotel-title"><a href="index.php">Toro Hotel</a></h1>
		</div>
	</header>

	<ul id="main-menu"> <!-- given class name -->
		<li><a href="findaroom.php">Find a room</a></li>
		<li><a href="room-selection.php">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" >Maps and Directions</a></li>
		<li><a href="hotel-details.php" >Hotel Details</a></li>
		<li><a href="things-to-do.php" >Things to do</a></li>		
	</ul>

	<!-- added temp note-->
	<center>		
		<?PHP
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = 'password';
		$db_mydb = "torohotel";
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
			if(!$conn)
			{
				echo "Could not connect: " . mysql_error()."<BR>";
			}
		//select my own databse
		mysql_select_db('torohotel');
		
		// pull out the information from the form page
			$email = $_POST['femail'];
			$password = $_POST['fpass'];
		
			//query to check for customer's email and password
			$sql = "SELECT Email, Password
					FROM customer
					WHERE Email='$email' and Password='$password'";
			$retval = mysql_query($sql, $conn) or die(mysql_error());
			
			if((mysql_num_rows($retval))== false)
			{
				echo "#2 No Match found<BR>".
					"Invalid email/password!<BR>".
					"<A HREF='log-in-customer.php'>Try Again.";
			}
			else
			{ 
				// successfully entered a valid username & password
				echo
					header("Location: customer-home.php");
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
		<a class="linked" href="careers.php" >Careers</a>
		<a >Call Us (310) 243-TORO</a>
		<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a>
		</li>		
	</ul>
	</footer>
</body>
</html>

