<?php
	session_start();
?>
<html>
<head>
	<link href = "indexcss.css" rel="stylesheet" type="text/css" href="styles.css">
	<title>Maps and Direction</title>
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
		<h1><font color="yellow"> Maps and Directions  </h1>
		<h2> <font color="yellow">1000 E Victoria St, Carson, CA 90747 </h2>
		<h2> <font color="yellow">1(310) 243-3696 </h2>

		<p id = "map">
		<img src="map.png" height="175" width="200"/>

		<!-- saddr is the start adress and daddr is for the destination adress-->
		<form action="http://maps.google.com/maps" method="get" target="_blank">
		   <h2><label for="saddr"><font color="yellow">Get Directions, Enter your location</label></h2>
		   <input type="text" name="saddr"/>
		   <input type="hidden" name="daddr" value="1000 E Victoria St, Carson, CA 90747"/>
		   <input type="submit" value="Get directions"/>
		</form>
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




