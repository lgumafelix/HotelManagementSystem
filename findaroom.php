<?php
	session_start();
	if(!(isset($_SESSION['employeeid']) || isset($_SESSION['customerid'])))
	{
		header('Location: log-in-customer.php');
	}
		/*global session variables that are kept track on this page:
		Session variables of Employee
		(*)$_SESSION['employeeid']
		$_SESSION['employeefirstname']
		$_SESSION['employeelastname']
		$_SESSION['employeepassword']
		$_SESSION['employeeposition']
		
		and Session variable of Customer
		$_SESSION['customeremail']
		(*)$_SESSION[customerid']
		$_SESSION['customerfirstname']
		$_SESSION['customerlastname']
		$_SESSION['customerpassword']*/
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
      
    <title>Find A Room</title>
	
	<script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
	<!--	<script src="formsubmit.js"></script>	-->
    <!--	<link href="sb.css" rel="stylesheet" type="text/css" />	-->
	<!--	<link href="payment.css" rel="stylesheet" type="text/css" />	-->
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
			$(function() {
				$("#dateIn").datepicker(
				{dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				minDate: 0,
				maxDate: "+3M"
				});
			});
			$(function() {
				$("#dateOut").datepicker(
				{dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				minDate: 0,
				maxDate: "+3M"
				});
			});
	</script>
</head>
<body>	
	<?PHP
	echo "<div class='sign-in-menu'>";
		//if a customer is logged in
		if(isset($_SESSION['employeeid']))
		{
			//display employee's first name and Log Out combo
			$displayname2 = $_SESSION['employeefirstname'];
			echo "<ul><li>
					<a href='staff-home.php'>Welcome $displayname2</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		else if(isset($_SESSION['customerid']))
		{
			//display customer's first name and Log Out combo
			$displayname1 = $_SESSION['customerfirstname'];
			echo "<ul><li>
					<a href='customer-home.php'>Welcome $displayname1</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		//if an employee is logged in	
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
	
	<header>
		<div class="HotelName">
		<h1 id="hotel-title"><a href="index.php">Toro Hotel</a></h1>
		</div>
	</header>

	<ul id="main-menu"> <!-- given class name -->
		<li><a href="findaroom.php" >Find a room</a></li>
		<li><a href="room-selection.php">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" >Maps and Directions</a></li>
		<li><a href="hotel-details.php" >Hotel Details</a></li>
		<li><a href="things-to-do.php" >Things to do</a></li>		
	</ul>

	<!-- added temp note-->
	<center>

	
<?php
/* if(isset($_SESSION['employeeid'])){
echo "<FORM ACTION=\"getcustomerinfo.php\" METHOD=\"POST\" TARGET=_self>";
}
else {
echo "<FORM ACTION=\"checkavailability.php\" METHOD=\"POST\" TARGET=_self>";
} */
?>
	
	<FORM class="registerform" ACTION="checkavailability.php" METHOD="POST" TARGET=_self>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<BR><BR><BR>Check In: <INPUT Type="text" NAME="date1" ID="dateIn"/>
		<BR><BR><BR>
		&nbsp;&nbsp;
		Check Out: <INPUT Type="text" NAME="date2" ID="dateOut"/>
		<BR><BR><BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Room Type:
		<SELECT NAME="froomtype">
				<option value="Single">Single</option>
				<option value="Double">Double</option>
				<option value="Suite">Suite</option> 
		</SELECT><BR><BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Adults:
		<SELECT NAME="fadults">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6+</option>
		</SELECT><BR><BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Children:
		<SELECT NAME="fchild">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6+</option>
		</SELECT><BR><BR><BR>
		<INPUT TYPE="submit" VALUE="Find a Room"><BR><BR><BR>
	</FORM>
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

