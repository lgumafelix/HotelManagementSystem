<?php
	session_start();
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
      
      <title>Toro Hotel HMS</title>
      
      <script src="modernizr-1.5.js"></script> <!-- used to make compatible with modern websites -->
      
      <link href="indexcss.css" rel="stylesheet" type="text/css" />
     
     <!--table from bootstrap-->  
  <link href="bootstrap.min.css" rel="stylesheet" >  
  			<!--table from bootstrap-->
  			

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
		<h1 id="hotel-title"><a href="index.php">Toro Hotel</a></h1>
		</div>
	</header>
	
	
	
	
	
	<ul id="main-menu"> <!-- given class name -->
		<li><a href="findaroom.php" >Find a room</a></li>
		<li><a href="room-selection.php" target="">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" target="">Maps and Directions</a></li>
		<li><a href="hotel-details.php" target="">Hotel Details</a></li>
		<li><a href="things-to-do.php" target="">Things to do</a></li>	
	</ul>
	
	
	
	
		
	
	<!--table for careers (bootstrap)-->
		<div class="container" style="width:700px;height:500px;background-color:rgba(0,0,0,0.70);color:blue;margin: 1px 1px 1px 280px;" >
			<center>
				<h2 id="career-title" >Career Opportunities</h2>
			</center>
		  <p>Join the Toro Team Now! (Locations may very)</p>            
		  <table class="table table-hover">
			<thead>
			  <tr>
				<th>Position</th>
				<th>Location</th>
				<th>Contact</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>.NET Engineer</td>
				<td>San Deigo,CA</td>
				<td>310-243-TORO</td>
			  </tr>
			  <tr>
				<td>Architect - Business Analyst</td>
				<td>New York,NY</td>
				<td>carlos@torohotel.com</td>
			  </tr>
			  <tr>
				<td>Linux System Engineer</td>
				<td>Venezuela</td>
				<td></td>
			  </tr>
			  <tr>
				<td>Senior Tools Programmer</td>
				<td>Los Angeles,CA</td>
				<td>carlos@torohotel.com</td>
			  </tr>
			  <tr>
				<td>Chef</td>
				<td>India</td>
				<td></td>
			  </tr>
			  <tr>
				<td>Senior Network Programmer</td>
				<td>Mexico</td>
				<td></td>
			  </tr>
			</tbody>
		  </table>
		</div>
		<!-- career table -->
		
		
		
	


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


