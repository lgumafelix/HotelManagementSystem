<?php
	if(!isset($_POST["empid"]))
		{
			header("Location: index.php");
		}
	else
		{
		//start the session and pull out data from FORM
		session_start();
		$empid = strip_tags($_POST["empid"]);
		$password = strip_tags($_POST["fpass"]);
		
		//connect to database so we can make a query to pull out
		//additional information from the employee
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = 'password';
		$db_mydb = "torohotel";
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db('torohotel');
		
		//query employee's first name
		$sql = "SELECT FirstName, LastName, Position
				FROM employee
				WHERE EmployeeID='$empid' and Password='$password'";
		$retval = mysql_query($sql, $conn) or die(mysql_error());
		$result = mysql_fetch_array($retval);		
		
		//store the query result to PHP variables
		$staffname =  $result['FirstName'];	
		$stafflastname = $result['LastName'];
		$staffposition = $result['Position'];

		/*global session variables to keep track of employee's info
		that will be passed to employee-home.php */
		$_SESSION['employeeid'] = $empid;
		$_SESSION['employeefirstname'] = $staffname;
		$_SESSION['employeelastname'] = $stafflastname;
		$_SESSION['employeeposition'] = $staffposition;
		$_SESSION['employeepassword'] = $password;
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
      
    <title>Log In</title>
      
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
    <link href="indexcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="sign-in-menu">
		<ul>
			<li>
			<a href="register.php">Join Now!</a>
			<a href="log-in-staff.php">Log In</a>
			</li>
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
	
	// pull out the information from the session variables
		$displayid = $_SESSION["employeeid"];
		$displayame = $_SESSION["employeefirstname"];
		$pwd = $_SESSION["employeepassword"];
		
		$sql = "SELECT EmployeeID, Password
				FROM employee
				WHERE EmployeeID ='$displayid' and Password='$pwd'";
		$retval = mysql_query($sql, $conn) or die(mysql_error());
			
		if((mysql_num_rows($retval))== false)
		{
			echo "#No Match found<BR>".
				"Invalid employee ID/password!<BR><BR>".
				"<A HREF='log-in-staff.php'><button type='button'>Try Again</button>.";
		}
		else
		{ 
			// successfully entered a valid username & password
			echo
				header("Location: staff-home.php");
				//"#2 true";
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

