<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Hotel Details</title>
	<link href = "indexcss.css" rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?PHP
	echo "<div class='sign-in-menu'>";
		//if a customer is logged in
		if(isset($_SESSION['customerid']))
		{
			//display customer's first name and Log Out combo
			$displayname1 = $_SESSION['customerfirstname'];
			echo "<ul><li>
					<a href='customer-home.php'>Welcome $displayname1</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		//if an employee is logged in
		else if(isset($_SESSION['employeeid']))
		{
			//display employee's first name and Log Out combo
			$displayname2 = $_SESSION['employeefirstname'];
			echo "<ul><li>
					<a href='staff-home.php'>Welcome $displayname2</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		else
		{
			//display a generic Welcome Guest and Log In combo
			echo "<ul><li>
					<a href='register.php'>Join Now!</a>
					<a href='log-in-customer.php'>Log In</a>
				</li></ul>";
		}
	echo "</div>";
	?>

	<header>
		<div class="HotelName">
			<h1 ><a href="index.php">Toro Hotel</a></h1> 
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
	<p>
		<font color="yellow">
		<h1> Toro Hotel Details </h1>
		<h3> Toro hotel has been in the heart of Carson since 1961. </h3></font>
	</center>
	</p>
	<center>

	<p>
	<center> <font color = "white"> NOTABLE CUSTOMERS OF TORO HOTEL </center>
	<center>
		<div class="notablecustomers">
		<p>Jack Han</p><font color = "white">
		<img src ="han.jpg" height="175" width="130"/>
		<p>Kobe Bryant</p><font color = "white">
		<img src ="kobeBryant.png" height="175" width="150"/>
		<p>Barack Obama</p><font color = "white">
		<img src ="obama.png" height="175" width="150"/><br>
		<p>Oprah Winfrey</p><font color = "white">
		<img src ="oprah.png" height="175" width="150"/>
		</div>
	</center>
	</p>
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
