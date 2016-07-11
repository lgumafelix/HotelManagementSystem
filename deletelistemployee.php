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
      
    <title>Delete Employee</title>
      
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
	
		// verify customer table exists
		$sql = "show tables like 'employee'";
		$retval = mysql_query($sql, $conn);
			if(!$retval)
			{
				echo "Could not verify existence of table: " . mysql_error()."<BR>";
			}
			// see if anything was returned by query
			if (mysql_num_rows($retval) != 1)
			{
				echo "Employee Table has not yet been created<BR>";
			}
			
		// employee table does exist, query the table
		$sql = "select * from employee";
		$retval = mysql_query($sql, $conn);
		if(!$retval)
			{
				echo "ERROR: " .mysql_error();
			}
			
			// check if query returned anything
		if (mysql_num_rows($retval) == 0)
			echo "There are no employees listed in your table.<BR><BR>";
		else
		{
			// 1 or more entries were returned, create and output the table
			$sql = "SELECT EmployeeID, FirstName, LastName, Position
					FROM employee";
			$result = mysql_query($sql, $conn);
			
			if(mysql_num_rows($result) == 0)
			{
				echo "There are no entries in the employee table";
			}
			else
			{
				echo "<BR><BR><H1>Select an employee you want to delete</H1><BR><BR>".
				
				"<TABLE BGCOLOR='white' border=5>".
				"<TR>".
					"<TH BGCOLOR ='yellow'>Delete an Entry</TH>".
					"<TH BGCOLOR ='yellow'>Employee ID</TH>".
					"<TH BGCOLOR ='yellow'>First Name</TH>".
					"<TH BGCOLOR ='yellow'>Last Name</TH>".
					"<TH BGCOLOR ='yellow'>Position</TH>".
				"</TR>".
				
				"<form action='deleteemployee.php' method='POST'>";
				while ($row = mysql_fetch_array($result))
				{
					echo "<TR>".
						"<TD><input type='radio' name='fradio' value=".$row['EmployeeID']."></TD>".
						"<TD>".$row['EmployeeID']."</TD>".
						"<TD>".$row['FirstName']."</TD>".
						"<TD>".$row['LastName']."</TD>".
						"<TD>".$row['Position']."</TD>".
						"</TR>";
				}
				echo "</TABLE><BR>".
				"<INPUT TYPE='submit' VALUE='Delete'><BR><BR><BR>".
				"</form>";
			}
		}
	mysql_close($conn);
	?>
	<a href ='staff-home.php'><button type='button'>Back To  Staff Homepage</button></a><BR><BR>

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
