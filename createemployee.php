<?php
	if(!isset($_SESSION["employeeid"]))
		{
		session_start();
		}
	else
		{
		session_start();
		$employeeEmail = strip_tags($_POST["femail"]);
		$fname = strip_tags($_POST["firstname"]);
		$lname = strip_tags($_POST["lastname"]);
		$password = strip_tags($_POST["fpass"]);
		}
		/*global session variables that are kept track on this page.
		$_SESSION["employeeid"]
		$_SESSION["employeefirstname"]
		$_SESSION["employeelastname"]
		$_SESSION["employeepassword"]
		$_SESSION["employeepposition"]*/
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
      
    <title>Add Employee</title>
      
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
    <link href="indexcss.css" rel="stylesheet" type="text/css" />

</head>
<body class="staff-body">
	<?PHP
	echo "<div class='sign-out-menu'>";
	//session_start();
		if(isset($_SESSION['firstname']))
		{
			//$login = $_SESSION['username'];
			$displayname = $_SESSION['firstname'];
			//echo 'Welcome $displayname!'.
			echo "<li><a href='staff-home.php' >Welcome $displayname</a>  <a href='logout.php'>Log Out</a> </li>";
		}
		else
		{
			//echo 'Hello Guest!';
			echo "<li><a href='' >Welcome Guest!</a>  <a href='log-in-customer.php'>Log In</a> </li>";
		}
	echo "</div>";
	?>
	
	<!--contains staff login icon-->
	<header>
		<div class="HotelName">
			 <h1 ><a href="staff-home.php">Toro Hotel</a></h1> 
		</div>
	</header>
	
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
		
		$fname = $_POST["firstname"];
		$lname = $_POST["lastname"];
		$position = $_POST["fposition"];
		$pwd = $_POST["fpass"];
		
		$sql = "INSERT into employee
				(FirstName, LastName, Position, Password)".
				"VALUES ('$fname', '$lname', '$position', '$pwd')";

		$retval = mysql_query($sql, $conn) or die(mysql_error());
			
			if((mysql_num_rows($retval))== false)
			{
				echo "#2 No Match found<BR>".
					"Invalid employee ID/password!<BR>".
					"<A HREF='addemployee.php'>Try Again.";
			}
			else
			{ 
				// successfully entered a valid username & password
				echo
					header("Location: staff-home.php");
					//"#2 true";
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
		<a class="linked" href="log-in-staff.php" >Staff Login</a>
		<a class="linked" href="careers.php" >Careers</a>
		<a >Call Us (310) 243-TORO</a>
		<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a>
		</li>		
	</ul>
	</footer>
</body>
</html>
