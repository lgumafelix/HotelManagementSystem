<?php
	session_start();
	if(!isset($_SESSION["employeeid"]))
		{
			header("Location: index.php");
		}
		/*global session variables that are kept track on this page.
		$_SESSION['employeeid']
		$_SESSION['employeefirstname']
		$_SESSION['employeelastname']
		$_SESSION['employeepassword']
		$_SESSION['employeeposition']*/
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
      
    <title>Edit Employee</title>
      
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
		mysql_select_db('torohotel');
	
		if(!isset($_POST['fradio']))
		{
			echo "<BR><BR><H1>Please select an employee to edit!</H1><BR><BR>".
				"<a href ='editlistemployee.php'><button type='button'>Try Again</button></a>";
		}
		else
		{
			//pull out employeeID from FORM page
			$empid = $_POST['fradio'];	
			
			//query additional info about that employee using employee ID
			$sql = "SELECT FirstName, LastName, Position, Password
					FROM employee
					WHERE EmployeeID = '$empid'";
			$retval = mysql_query($sql, $conn) or die(mysql_error());
			
			$result = mysql_fetch_array($retval);
			
			//save array result to PHP variables
			$efname = $result['FirstName'];
			$elname = $result['LastName'];
			$epass = $result['Password'];
			$eposition = $result['Position'];
			
			$_SESSION['empIDtoedit'] = $empid;
			
			echo
				"<h1>Edit Employee:</h1><BR><BR>".
	
				"<table BGCOLOR='white' border=5>".
				"<tr>".
					"<th BGCOLOR ='yellow'>Employee ID</th>".
					"<th BGCOLOR ='yellow'>Position</th>".
					"<th BGCOLOR ='yellow'>First Name</th>".
					"<th BGCOLOR ='yellow'>Last</th>".
					"<th BGCOLOR ='yellow'>Password</th>".
				"<tr>".
				
				"<form action='updateemployee.php' method='POST'>".
				"<tr>".
					"<th>".$_SESSION['empIDtoedit']."</th>".
					"<th>$eposition</th>".
					"<th>$efname</th>".
					"<th>$elname</th>".
					"<th>$epass</th>".
				"<tr>".
				"<tr>".
					"<th>".$_SESSION['empIDtoedit']."</th>".
					"<th><SELECT NAME='fposition'>
							<option value='Admin'>Admin</option>
							<option value='Staff'>Staff</option>
							</SELECT></th>".
					"<th><INPUT TYPE='text' NAME='fname' VALUE='' SIZE='20' MAXLENGTH='20' PLACEHOLDER='$efname'/required></th>".
					"<th><INPUT TYPE='text' NAME='lname' VALUE='' SIZE='20' MAXLENGTH='20' PLACEHOLDER='$elname'/required></th>".
					"<th><INPUT TYPE='password' NAME='fpass' VALUE='' SIZE='20' MAXLENGTH='10' PLACEHOLDER='Set up Password*'/required></th>".
				"<tr></table>".

				"<BR><BR><INPUT TYPE='submit' VALUE='Save'><BR><BR>".
				"<a href ='staff-home.php'><button type='button'>Back To  Staff Homepage</button></a>".
			"</form>";
		}
	mysql_close($conn);
	?>

	</center>
	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul id="homeMenu2">
		<li>
		<a class="linked" href="staff-home.php">Home</a>
		<a class="linked" href="about.php" >About Toro Hotel</a>
		<a class="linked" href="careers.php" >Careers</a>
		<a >Call Us (310) 243-TORO</a>
		<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a>
		</li>		
	</ul>
	</footer>
</body>
</html>
