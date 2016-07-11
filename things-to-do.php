<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Things To Do</title>
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
	
	<p>
	<center> <font color = "white"> While you are enjoying your stay at TORO HOTEL, you can visit many places <br> or <br> you can catch the landing or the take off of the Good Year blimp </center>
	<center>
	<div class="placestogo">
	<p>CALIFORNIA STATE UNIVERSITY, DOMINGUEZ HILLS</p><font color = "white">
	<img src ="csudh.png" height="175" width="250"/>
	<p>STUBHUB CENTER</p><font color = "white">
	<img src ="stubhubcenter.png" height="175" width="250"/><br>
	<p>GOOD YEAR BLIMP</p><font color = "white">
	<img src ="goodyearblimp.png" height="175" width="250"/>
	<p>SOUTH BAY PAVILLION MALL</p><font color = "white">
	<img src ="southbaypavillionmall.png" height="175" width="250"/>
	<p>WATTS TOWERS</p><font color = "white">
	<img src ="wattstowers.png" height="175" width="250"/>
	</div>
	</center>
	</p>

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
