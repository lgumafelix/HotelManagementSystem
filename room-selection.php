<?php
	session_start();
	/* 	if($_SESSION['fromfindaroom'] == false){
		//redirect to findaroom
		header("Location: findaroom.php");
	}
	else{
	   //reset the variable
	   $_SESSION['fromfindaroom'] = false;
	}
		//redirect to findaroom if not sent from there
		 */
	/*session_start();
	if($_SESSION['fromfindaroom']!=true){
		header("Location: findaroom.php");
	}*/
?>
<html>
<head>
	<title> Rooms and Suites</title>
	
	<link href = "--room-selection.css" rel="stylesheet" type="text/css" href="styles.css">
	<link href="indexcss.css" rel="stylesheet" type="text/css" />

	<style>
	table, th, td {
		border: 2px solid black;
		border-collapse: collapse;
	}
	</style>

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
			 <h1 ><a href="">Toro Hotel</a></h1> 
		</div>
	</header>

	<center><h1 class="title"> Room selection </h1></center>


	<ul id="main-menu"> <!-- given class name -->
		<li><a href="findaroom.php" target = "">Find a room</a></li>
		<li><a href="room-selection.php" target="">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" target="">Maps and Directions</a></li>
		<li><a href="hotel-details.php" target="">Hotel Details</a></li>
		<li><a href="things-to-do.php" >Things to do</a></li>	


		
	</ul>
	
		



	


	<center>
	<table class="room-select-table" style="width:60%; ">
	
	<tr>
		<td style=""></td>
		<td style="">
			<h4> 
			<center>
				All rooms in TORO HOTEL are equipped with a TV, Refrigerator, Closet, Air conditioning, Table lamp
				and a Study table. The rooms are attached with a fully functional bathroom that is equipped with a Jacuzzi,  
				Shampoo, Body wash and gel, Toothbrush set, Gown, Towel, and Slippers.
			</center>
			</h4>

		</td>
		<td>-</td>
	</tr>  
  <tr>
    <td><center><a href="findaroom.php" >SINGLE ROOM</a></center></td>
    <td><center><a href="findaroom.php" > <img src="singleroom.png" height="175" width="250"/></a></center></td>		
    <td><center><p><a href="findaroom.php" target="">$99</a></p></center></td>
  </tr>
  
  <tr>
    <td><center><a href="findaroom.php" >DOUBLE ROOM</a> </center></td>
    <td><center><a href="findaroom.php" > <img src ="doubleroom.png" height="175" width="250"/></a></center></td>		
    <td><center><p><a href="findaroom.php" >$150</a></p></center></td>
  </tr>

  
  <tr>
    <td><center><a href="findaroom.php" >SUITE</a> </center></td>
    <td><center><a href="findaroom.php" > <img src ="suite.png" height="175" width="250"/></a></center></td>		
    <td><center><p><a href="findaroom.php" >$200</a></p></center></td>
  </tr>

  </table>
  </center>





<footer>
<!--	Only class=linked will have hover effects	-->
	<ul id="homeMenu2">
		<li><a class="linked" href="index.php">Home</a><a class="linked" href="about.php" >About Toro Hotel</a>	<a class="linked" href="log-in-staff.php" >Staff Login</a> <a class="linked" href="careers.php" >Careers</a> <a >Call Us (310) 243-TORO</a>	<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a> </li>		
	</ul>
	</div>
</footer>






</body>
</html>
