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
      
    <title>My Reservations</title>
      
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
			 <h1><a href="customer-home.php">Toro Hotel</a><br><br><br></h1> 
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
		
		//pull out today's date
		$todaysDate = date('Y-m-d',time());
		$cid = $_SESSION['customerid'];
		$fname = $_SESSION['customerfirstname'];
		$lname = $_SESSION['customerlastname'];

		$sql = "SELECT R.RSVP, R.RoomNumber, R.RoomType, R.CustomerID, R.CheckInDate, R.CheckOutDate
			FROM reservation AS R
			WHERE CustomerID = '$cid'
			AND CheckInDate >= '$todaysDate'";
		//echo $sql;
		$result = mysql_query($sql, $conn);
		
		if(mysql_num_rows($result) == 0)
		{
			echo "#2 There are no entries listed in your table.<BR>";
		}
		else
		{
			echo "<BR><BR><H1>My Toro Hotel Reservations</H1><BR><BR>".
				
				"<TABLE BGCOLOR='white'  border=5>".
				"<TR>".
					"<TH BGCOLOR ='yellow'>Select to Cancel</TH>".
					"<TH BGCOLOR ='yellow'>RSVP Number</TH>".				
					"<TH BGCOLOR ='yellow'>Room Number</TH>".
					"<TH BGCOLOR ='yellow'>Room Type</TH>".
					"<TH BGCOLOR ='yellow'>Customer ID</TH>".
					"<TH BGCOLOR ='yellow'>First Name</TH>".
					"<TH BGCOLOR ='yellow'>Last Name</TH>".
					"<TH BGCOLOR ='yellow'>Check In Date</TH>".
					"<TH BGCOLOR ='yellow'>Check Out Date</TH>".
				"</TR>".
				
				"<form action='customerdeletersvp.php' method='POST'>";
				
				while ($row = mysql_fetch_array($result))
				{
					echo "<TR>".
						"<TD><input type='radio' name='fradio' value=".$row['RSVP']."/required></TD>".
						"<TD>".$row['RSVP']."</TD>".
						"<TD>".$row['RoomNumber']."</TD>".
						"<TD>".$row['RoomType']."</TD>".
						"<TD>".$row['CustomerID']."</TD>".						
						"<TD>".$fname."</TD>".
						"<TD>".$lname."</TD>".
						"<TD>".$row['CheckInDate']."</TD>".
						"<TD>".$row['CheckOutDate']."</TD>".
						"</TR>";
				}
				echo "</TABLE><BR><BR>".		
				"<INPUT TYPE='submit' VALUE='Cancel This Reservation'><BR><BR><BR>".
				"<a href ='customer-home.php'><button type='button'>Back to Customer Homepage</button></a>";
				"</form>";
		}
	mysql_close($conn);
	?>

	</center>
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
