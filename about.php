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
      
            
      
      
      <!--	Bootstrap Example	-->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <style>
		  .container{
			  background-color: rgba(250,0,0,0.13);
			  width: 800px;			  
			  height: 500px;
			  margin: 1px 1px 1px 280px; /*top right bottom left*/			  
		  }
	  .carousel-inner > .item > img,
	  .carousel-inner > .item > a > img {
		  width: 80%;
		  margin: auto;
	  }
	  </style>  
	  <!-- Bootstrap--End	-->
	  
	  
	  
  
  
  
  

  
  
  
      
      
      
      
      
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
			<h1 id="hotel-title"> <a href="index.php">Toro Hotel</a></h1>
			
			<font style="color:rgba(0,250,0,0.72);font-size:200%;">About The Toro Hotel</font>

		</div>

	</header>
	






<ul id="main-menu"> <!-- given class name -->

		<li><a href="#team" >Meet The Team!</a></li>
		<li><a href="#docs">Documentation</a></li>
		<li><a href="findaroom.php" >Find a room</a></li>
		<li><a href="room-selection.php" target="">Rooms and Suites</a></li>
		<li><a href="mapsanddirections.php" target="">Maps and Directions</a></li>
		<li><a href="hotel-details.php" target="">Hotel Details</a></li>
		<li><a href="things-to-do.php" target="">Things to do</a></li>	
		<li><a href="index.php">Toro Hotel Home</a></li>

	</ul>

	
	
	
	
	
		
	
	
	


<!--	Bootstrap: Carousel Example	-->
<div class="container" style="">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		
      <div class="item active">		  
        <img src="city1.png" alt="ny" width="600px" height="345">
      </div>    
      <div class="item">
        <img src="csudh.png" alt="na" width="300px" height="50">
      </div>
      <div class="item">
		<img src="background-10.jpg" alt="na" width="300px" height="50">
      </div>
      
      <div class="item">
		<img src="bathroom.jpg" alt="na" width="300px" height="50">
      </div>
      <div class="item">
		<img src="stubhubcenter.png" alt="na" width="300px" height="50">
      </div>
      
      
      <div class="item">
		<img src="background-9.jpg" alt="na" width="300px" height="50">
      </div>
      
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!--	Bootstrap: Carousel Example: END	-->






	<!--The Toro Team!!-->
<
<center>
	<div id="team" class="softwareenginers">
		
	<p><font color = "white">JESUS DE LUNA (BACK END)</p>
	<img src ="jessee.jpg" height="175" width="250"/>
	
	<p>LUCKY GUMAFELIX (PROJECT MANAGER)</p><font color = "white">
	<img src ="LuckyG.jpg" height="175" width="200"/><br>
	<p>RAMNEET KAUR (FRONT END)</p><font color = "white">
	<img src ="Ramneet-Kaur.jpg" height="175" width="200"/>
	<p>CARLOS ONTIVEROS (FRONT END)</p><font color = "white">
	<img src ="Carlos-Ontiveros.jpg" height="175" width="200"/>
	<p>MATTHEW YU (BACK END)</p><font color = "white">
	<img src ="matthewY.jpg" height="175" width="200"/>
	
	</div>
	</center>

		<!--The Toro Team!!-->

	
	
	
	
	
	
	
	<!--iFrame to display PDF-->
	<h2 style="color:yellow;" id="docs">Documentation &nbsp;&nbsp;&nbsp;<a href="#Top">Top of page</a></h2>

	<ul>	
		<ul id="main-menu-documents"> <!-- given class name -->
		<li><a href="project4/docs/HMS-part1.pdf" target="pdf-window">Part 1</a></li>
		<li><a href="project4/docs/HMS-part2.pdf" target="pdf-window">Part 2</a></li>
		<li><a href="project4/docs/HMS-part3.pdf" target="pdf-window">Part 3</a></li>
		<li><a href="project4/docs/CSC 481 - HMS - Part 5.docx" target="pdf-window">Part 4</a></li>
		<li><a href="project4/docs/CSC 481 - HMS - Part 5.pdf" target="pdf-window">Part 5</a></li>

	</ul>
			
		<!--iFrame settings-->
		<iframe src="" width="1000" height="600" name="pdf-window"
			style="border:5px dotted white;margin: 1px 1px 1px 240px; "	>
		<p>Your browser does not support iframes.</p>
		</iframe>
	
	<h2 style="color:yellow;"> &nbsp;&nbsp;&nbsp;<a href="#Top">Top of page</a></h2>

	
	
	


	
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
