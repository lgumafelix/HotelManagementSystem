<?php
	session_start();
	if(!isset($_SESSION['employeeid']))
		{
			header("Location: index.php");
		}
		/*global session variables that are kept track on this page.
		$_SESSION['employeeid']
		$_SESSION['employeefirstname']
		$_SESSION['employeelastname']
		$_SESSION['employeepassword']
		$_SESSION['employeeposition']*/
		
	date_default_timezone_set('America/Los_Angeles');
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
      
    <title>Check In Guest</title>
      
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
			 <h1 ><a href="index.php">Toro Hotel</a></h1> 
		</div>
	</header>

	<center>
	<?PHP
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
	//use my own database
	mysql_select_db('torohotel');
	
	if(!isset($_POST['fradio']))
	{
		echo "<BR><BR><H1>Please select a guest to check in!</H1><BR><BR>".
			"<a href ='todayrsvp.php'><button type='button'>Try Again</button></a><BR><BR>".
			"<a href = 'staff-home.php'><button type='button'>Back To Staff Homepage</button></a>";
	}
	else
	{
		//pull out information from the FORM page
		$rsvpnum = $_POST['fradio'];
		$empid = $_SESSION['employeeid'];
		
		// reservation table does exist, update the table
		$sql = "UPDATE reservation
				SET CheckInStatus = '1', 
					EmployeeID = '$empid'
				WHERE RSVP = '$rsvpnum'";
		$retval = mysql_query($sql, $conn);
		
		if(!$retval){
			echo "ERROR: ".mysql_error();
		}
		else{
			echo "<br><br><h1>Guest is now Checked In!</h1><br><br>".
				"<a href = 'staff-home.php'><button type='button'>Back To Staff Homepage</button></a>";;
		}
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