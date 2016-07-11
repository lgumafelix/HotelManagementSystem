<?php
	session_start();
	if(!isset($_SESSION['employeeid']))
		{
			header('Location: index.php');
		}
		/*global session variables that are kept track on this page.
		$_SESSION["employeeid"]
		$_SESSION["employeefirstname"]
		$_SESSION["employeelastname"]
		$_SESSION["employeepassword"]
		$_SESSION["employeepposition"]*/

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
<body class="staff-body">
	<?PHP
	echo "<div class='sign-in-menu'>";
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

		$todaysDate = date('Y-m-d', time());
		
		$sql = "SELECT reservation.RSVP, customer.CustomerID, customer.FirstName, customer.LastName,
						reservation.CheckInDate, reservation.CheckOutDate
				FROM reservation
				INNER JOIN customer
				ON customer.CustomerID = reservation.CustomerID
			WHERE (CheckInStatus = '0' AND CheckInDate >= '$todaysDate')";
			
		$result = mysql_query($sql, $conn);
			
		if(!$result)
		{
			echo "<br><br><h1>There are no entries that match this query</h1><br><br>".
			"<a href ='staff-home.php'><button type='button'>Back To  Staff Homepage</button></a><BR><BR>";
		}
		else
		{
			echo
			"<BR><BR><H1>Select a reservation you want to cancel</H1><BR><BR>";
			echo "<TABLE BGCOLOR='white' border=4>".
			"<TR>".
				"<TH BGCOLOR ='yellow'>Select Cancelation</TH>".
				"<TH BGCOLOR ='yellow'>RSVP Number</TH>".
				"<TH BGCOLOR ='yellow'>Customer ID</TH>".
				"<TH BGCOLOR ='yellow'>First Name</TH>".
				"<TH BGCOLOR ='yellow'>Last Name</TH>".
				"<TH BGCOLOR ='yellow'>Check In Date</TH>".
				"<TH BGCOLOR ='yellow'>Check Out Date</TH>".
			"</TR>".
			
			"<form action='deletersvp.php' method='POST'>";
			while ($row = mysql_fetch_array($result))
			{
				echo
				"<TR>".
					"<TD><input type='radio' name='fradio' value=".$row['RSVP']."/required></TD>".
					"<TD>".$row['RSVP']."</TD>".
					"<TD>".$row['CustomerID']."</TD>".						
					"<TD>".$row['FirstName']."</TD>".
					"<TD>".$row['LastName']."</TD>".
					"<TD>".$row['CheckInDate']."</TD>".
					"<TD>".$row['CheckOutDate']."</TD>".
				"</TR>";
			}
			echo	"</table><BR>".
				"<INPUT TYPE='submit' VALUE='Cancel'><BR><BR>".
				"<a href ='staff-home.php'><button type='button'>Back to Staff Homepage</button></a>".
				"</form>";
		}
	mysql_close($conn);
	?>
	</center>

	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul class="staff-footer">
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
