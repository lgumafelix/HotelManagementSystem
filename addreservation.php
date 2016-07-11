<?php
	session_start();
		/*
		the session variables that are kept track up to this page are information
		from either the customer or employee (whoever is logged in), plus the
		session variables from "checkavailability.php" file.
	*/
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
    <TITLE>Add Reservation</TITLE>
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
			 <h1><a href="customer-home.php">Toro Hotel</a></h1> <BR><BR>
		</div>
	</header>
	
		<?php
		$username = "root";
		$password = "password";
		$hostname = "localhost";
		$conn = mysql_connect($hostname, $username, $password) or die ("Could not connect to database");
		$selected = mysql_select_db("torohotel", $conn);

		$query = "INSERT INTO reservation (RoomType, RoomNumber, CustomerID, CheckInDate, CheckOutDate)
				VALUES ('".$_SESSION['roomtype']."','".$_SESSION['roomnumber']."',
						'".$_SESSION['customerid']."','".$_SESSION['checkin']."',
						'".$_SESSION['checkout']."')";
		//echo $query;
		mysql_query($query, $conn);
		echo "<center>Reservation Success! <br><br><button onclick=\"location.href='customer-home.php'\" type='button' align='middle' >Take me to the Customer Home Page</button></center>";
		
		mysql_close();
	?>

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



