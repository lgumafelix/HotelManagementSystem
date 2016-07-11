<?php
	session_start();
	if(!isset($_SESSION["customerid"]))
		{
			header("Location: index.php");
		}
		/*global session variables to keep track of 
		$_SESSION['customeremail'] = $email;
		$_SESSION['customerid'] = $cid;
		$_SESSION['customerfirstname'] = $fname;
		$_SESSION['customerlastname'] = $lname;
		$_SESSION['customerpassword'] = $password;
		*/
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
      
    <title>Cancel Reservation</title>
      
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

<!--contains customer login icon-->
	<header>
		<div class="HotelName">
			 <h1><a href="customer-home.php">Toro Hotel</a><BR><BR></h1> 
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
		echo "<BR><BR><H1>Please select a reservation to cancel!</H1><BR><BR>".
			"<a href ='myrsvp.php'><button type='button'>Try Again</button></a><BR><BR>".
			"<a href ='customer-home.php'><button type='button'>Back To Customer Homepage</button></a>";
	}
	else
	{
		//pull out information from the FORM page
		$rsvpnum = $_POST['fradio'];
		
		// reservation table does exist, update the table
		$sql = "DELETE from reservation
				WHERE RSVP = '$rsvpnum'";
		$retval = mysql_query($sql, $conn);
		
		if(!$retval){
			echo "ERROR: ".mysql_error();
		}
		else{
			echo "<h1><br><br>Reservation has been cancelled!</h1><br><br>".
				"<a href = 'customer-home.php'><button type='button'>Back To Customer Homepage</button></a>";;
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