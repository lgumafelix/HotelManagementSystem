<?php
	session_start();
	/*
		the session variables that are kept track up to this page are information
		from either the customer or employee (whoever is logged in), plus the
		session variables from this file, lines #57-62.
	*/
?>
<HTML>
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
      
    <title>Check Room Availability</title>
      
    <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
	<link href="indexcss.css" rel="stylesheet" type="text/css" />
	
</head>   
<BODY>
	<header>
		<div class="HotelName">
			 <h1><a href="customer-home.php">Toro Hotel</a></h1> 
		</div>
	</header>
	<!--<BODY onload="document.forms[0].submit()"> -->
		<?php
		//connect to database so we can make a query
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = 'password';
		$db_mydb = "torohotel";
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(!$conn)
		{
			echo "Could not connect: " . mysql_error()."<BR>";
		}
		mysql_select_db('torohotel');
		
		//pull out date in/date out from FORM
		$datein = strtotime($_POST['date1']);
		$newdatein = date('Y-m-d',$datein);
		$dateout = strtotime($_POST['date2']);
		$newdateout = date('Y-m-d',$dateout);		
		
		if(isset($_SESSION['customerid']))
		{
			$sql = "SELECT RoomNumber
				FROM room
				WHERE RoomNumber NOT IN
					(SELECT DISTINCT RoomNumber
					FROM reservation
					WHERE RoomType='".$_POST['froomtype']."' 
					AND ((CheckInDate < '".$newdatein."' AND CheckOutDate > '".$newdateout."' )
							OR (CheckInDate >= '".$newdatein."' AND CheckOutDate <= '".$newdateout."') 
					OR (CheckInDate <= '".$newdatein."' AND (CheckOutDate >= '".$newdatein."' AND CheckOutDate <= '".$newdateout."')) 
					OR (CheckInDate >= '".$newdatein."' AND (CheckInDate <= '".$newdateout."' AND CheckOutDate >= '".$newdateout."'))))
				AND RoomType='".$_POST['froomtype']."'";
			$retval = mysql_query($sql, $conn) or die(mysql_error());
			$result = mysql_fetch_array($retval);
			
			$sql2 = "SELECT * 
					FROM customer
					WHERE CustomerID = '".$_SESSION["customerid"]."'";
			$retval2 = mysql_query($sql2, $conn) or die(mysql_error());
			$result2 = mysql_fetch_array($retval2);
			
			//global session variables to keep track of reservation infos
			$_SESSION['checkin'] = $newdatein;
			$_SESSION['checkout'] = $newdateout;
			$_SESSION['roomtype'] = $_POST['froomtype'];
			$_SESSION['roomnumber'] = $result['RoomNumber'];
			$_SESSION['firstname'] = $result2['FirstName'];
			$_SESSION['lastname'] = $result2['LastName'];
		
			if ($result == false)
			{
				//would you like to be added to waitlist page
				echo "
				<center>
				<h1>Waitlist Entry Summary</h1>
				
				<table border=\"5\" style=\"width:50\">
				  <tr>
					<th>First Name:</th>
					<td>".$result2['FirstName']."</td>
				  </tr>
				  <tr>
					<th>Last Name:</th>
					<td>".$result2['LastName']."</td>
				  </tr>
				  <tr>
					<th>Customer ID:</th>
					<td>".$_SESSION['customerid']."</td>
				  </tr>
				  <tr>
					<th>Room Type:</th>
					<td>".$_POST['froomtype']."</td>
				  </tr>
				  <tr>
					<th>Check-In Date:</th>
					<td>".$_POST['date1']."</td>
				  </tr>
				  <tr>
					<th>Check-Out Date:</th>
					<td>".$_POST['date2']."</td>
				  </tr>
				</table>
				There are no rooms available for that time period.  Would you like to be added to the waitlist? </br>
				<button onclick=\"location.href='./addwaitinglistreservation.php'\" align='middle' >Add me to the Waitlist!</button>
				<button onclick=\"location.href='./index.php'\" type='button' align='middle' >Take me to the Home Page</button>
				</center>";
			} 
			else
			{
					//add reservation?
					$rnum = $result['RoomNumber'];
					$sql3 = "SELECT Price FROM room WHERE RoomNumber = '".$rnum."'";
					$retval3 = mysql_query($sql3, $conn) or die(mysql_error());
					$result3 = mysql_fetch_array($retval3);
					
					echo "
					<center>
					<h1>Reservation Summary</h1>
					<table border=\"5\" style=\"width:50%\">
						<tr>
							<th>First Name:</th>
							<td>".$result2['FirstName']."</td>
						</tr>
						<tr>
							<th>Last Name:</th>
							<td>".$result2['LastName']."</td>
						</tr>
						<tr>
							<th>Customer ID:</th>
							<td>".$_SESSION['customerid']."</td>
						</tr>
						<tr>
							<th>Room Type:</th>
							<td>".$_POST['froomtype']."</td>
						</tr>
						<tr>
							<th>Room Number:</th>
							<td>".$result['RoomNumber']."</td>
						</tr>
						<tr>
							<th>Room Price:</th>
							<td>$".$result3['Price']."</td>
						</tr>
						<tr>
							<th>Check-In Date:</th>
							<td>".$_POST['date1']."</td>
						</tr>
						<tr>
							<th>Check-Out Date:</th>
							<td>".$_POST['date2']."</td>
						 </tr>
					</table>
				
				<button onclick=\"location.href='./payment.php'\" type='button' align='middle' >Enter Payment Information to Confirm Reservation</button>
				<button onclick=\"location.href='./index.php'\" type='button' align='middle' >Take me to the Home Page</button>
				</center>";
			}
		}
		else if(isset($_SESSION['employeeid']))
		{
			$sql = "SELECT RoomNumber
				FROM room
				WHERE RoomNumber NOT IN
					(SELECT DISTINCT RoomNumber
					FROM reservation
					WHERE RoomType='".$_POST['froomtype']."' 
					AND ((CheckInDate < '".$newdatein."' AND CheckOutDate > '".$newdateout."' )
							OR (CheckInDate >= '".$newdatein."' AND CheckOutDate <= '".$newdateout."') 
					OR (CheckInDate <= '".$newdatein."' AND (CheckOutDate >= '".$newdatein."' AND CheckOutDate <= '".$newdateout."')) 
					OR (CheckInDate >= '".$newdatein."' AND (CheckInDate <= '".$newdateout."' AND CheckOutDate >= '".$newdateout."'))))
				AND RoomType='".$_POST['froomtype']."'";
			$retval = mysql_query($sql, $conn) or die(mysql_error());
			$result = mysql_fetch_array($retval);
			
			$sql2 = "SELECT * 
					FROM employee
					WHERE EmployeeID = '".$_SESSION["employeeid"]."'";
			$retval2 = mysql_query($sql2, $conn) or die(mysql_error());
			$result2 = mysql_fetch_array($retval2);
			
			//global session variables to keep track of reservation infos
			$_SESSION['checkin'] = $newdatein;
			$_SESSION['checkout'] = $newdateout;
			$_SESSION['roomtype'] = $_POST['froomtype'];
			$_SESSION['roomnumber'] = $result['RoomNumber'];
			$_SESSION['firstname'] = $result2['FirstName'];
			$_SESSION['lastname'] = $result2['LastName'];
		
			if ($result == false)
			{
				//would you like to be added to waitlist page
				echo "
				<center>
				<h1>Waitlist Entry Summary</h1>				
				<table border=\"1\" style=\"width:\">
				  <tr>
					<th>First Name:</th>
					<td>".$result2['FirstName']."</td>
				  </tr>
				  <tr>
					<th>Last Name:</th>
					<td>".$result2['LastName']."</td>
				  </tr>
				  <tr>
					<th>Customer ID:</th>
					<td>".$_SESSION['customerid']."</td>
				  </tr>
				  <tr>
					<th>Room Type:</th>
					<td>".$_POST['froomtype']."</td>
				  </tr>
				  <tr>
					<th>Check-In Date:</th>
					<td>".$_POST['date1']."</td>
				  </tr>
				  <tr>
					<th>Check-Out Date:</th>
					<td>".$_POST['date2']."</td>
				  </tr>
				</table>
				There are no rooms available for that time period.  Would you like to be added to the waitlist?
				<button onclick=\"location.href='./addwaitinglistreservation.php'\" align='middle' >Add me to the Waitlist!</button>
				<button onclick=\"location.href='./index.php'\" type='button' align='middle' >Take me to the Home Page</button>
				</center>";
			} 
			else
			{
					$rnum = $result['RoomNumber'];
				
					echo "
					<center>
					<h1>Reservation Summary</h1>
					<table border=\"1\" style=\"width:100%\">
						<tr>
							<th>First Name:</th>
							<td>".$result2['FirstName']."</td>
						</tr>
						<tr>
							<th>Last Name:</th>
							<td>".$result2['LastName']."</td>
						</tr>
						<tr>
							<th>Employee ID:</th>
							<td>".$_SESSION['employeeid']."</td>
						</tr>
						<tr>
							<th>Room Type:</th>
							<td>".$_POST['froomtype']."</td>
						</tr>
						<tr>
							<th>Room Number:</th>
							<td>".$result['RoomNumber']."</td>
						</tr>
						<tr>
							<th>Check-In Date:</th>
							<td>".$_POST['date1']."</td>
						</tr>
						<tr>
							<th>Check-Out Date:</th>
							<td>".$_POST['date2']."</td>
						 </tr>
					</table>
				<button onclick=\"location.href='./payment.php'\" type='button' align='middle' >Enter Payment Information to Confirm Reservation</button>
				<button onclick=\"location.href='./index.php'\" type='button' align='middle' >Take me to the Home Page</button>
				</center>";
			}
		}
		
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
		
</BODY>
</HTML>