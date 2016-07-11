<?php
	session_start();
	if(!isset($_SESSION["employeeid"]))
		{
			header("Location: index.php");
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
	
	<center>
		<FORM ID="login" ACTION="createemployee.php" METHOD="POST" TARGET=_self><BR>
			<fieldset><legend><H1>Create new Employee Account</H1></legend><BR><BR>
			Select Employee Position:
			<SELECT NAME="fposition">
				<option value="Admin">Admin</option>
				<option value="Staff">Staff</option>
			</SELECT><BR><BR>
			Employee First Name:
			<INPUT TYPE="text" NAME="firstname" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="First Name*"/required><BR><BR>
			Employee Last Name: 
			<INPUT TYPE="text" NAME="lastname" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="Last Name*"/required><BR><BR>
			Create your password: 
			<INPUT TYPE="password" NAME="fpass" VALUE="" SIZE="20" MAXLENGTH="10" PLACEHOLDER="Set up Password*"/required><BR><BR>
			<INPUT TYPE="submit" VALUE="Register"><BR><BR><BR>
			<A HREF='staff-home.php'><button type='button'>Back to EmployeeHomepagee</button>
			</fieldset>
		</FORM>
	</center>
	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul id="homeMenu2">
		<li>
		<a class="linked" href="staff-home.php">Home</a>
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
