<?php
	session_start();
	if(!isset($_SESSION["employeeid"]))
		{
			header("Location: index.php");
		}
		/*global session variables that are kept track on this page.
		$_SESSION["employeeid"] = $empid;
		$_SESSION["employeepassword"] = $password;
		$_SESSION["employeefirstname"] = $staffname;
		$_SESSION["employeelastname"] = $stafflastname;*/
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
      
    <title>Cancel Waiting List</title>
      
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
			echo "<BR><BR><H1>Please select an entry to delete!</H1><BR><BR>".
				"<a href ='viewwaitlist.php'><button type='button'>Try Again</button></a><br><br>".
				"<a href ='staff-home.php'><button type='button'>Back to Staff Homepage</button></a>";
		}
		else
		{
			//pull out information from the form page
			$wlnum = $_POST['fradio'];
			
			// employee table does exist, delete entry on the table
			$sql = "DELETE from waitinglist
					WHERE WaitingListNumber = '$wlnum'";
			$retval = mysql_query($sql, $conn);
			
			if(!$retval)
			{
				echo "ERROR: " .mysql_error();
			}
			else
			{
				echo "<h1>Entry has been successfully deleted!</h1><BR><BR>".
				"<a href ='staff-home.php'><button type='button'>Back To Staff Homepage</button></a>";
			}
		}
		echo "<BR><BR>";
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
