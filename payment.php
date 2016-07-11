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
	<title>Payment Page</title>
	<link href = "indexcss.css" rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	
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
	<form>
	<!-- your regular form follows -->
	<table width=518 border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr bgcolor="#E5E5E5"> 
		<td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp; Billing Information</strong></td>
	</tr>
	<tr> 
		<td height="22" width="180" align="right" valign="middle">First Name:</td>
		<td colspan="2" align="left"><input name="firstName" type="text" size="50"></td>
	</tr>
	<tr> 
		<td height="22" align="right" valign="middle">Last Name:</td>
		<td colspan="2" align="left"><input name="lastName" type="text" size="50"></td>
	</tr>
	<tr>
		<td height="22" align="right" valign="middle">Phone:</td>
		<td colspan="2" align="left"><input name="phone" input type="number" value="" size="11"></td>
	</tr>
	<tr> 
		<td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
	</tr>
	<tr bgcolor="#E5E5E5"> 
		<td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Credit Card (required)</strong></td>
	</tr>
	<tr> 
		<td height="22" align="right" valign="middle">Credit Card Number:</td>
		<td colspan="2" align="left"> <input type="number" value="" size="19" maxlength="16"></td>
	</tr>
	<tr> 
		<td height="22" align="right" valign="middle">Expiration Date:</td>
		<td colspan="2" align="left">
		<SELECT NAME="expirationMonth" >
			<OPTION VALUE="" SELECTED>--Month--
			<OPTION VALUE="01">January 
			<OPTION VALUE="02">February
			<OPTION VALUE="03">March 
			<OPTION VALUE="04">April 
			<OPTION VALUE="05">May 
			<OPTION VALUE="06">June
			<OPTION VALUE="07">July
			<OPTION VALUE="08">August
			<OPTION VALUE="09">September 
			<OPTION VALUE="10">October 
			<OPTION VALUE="11">November 
			<OPTION VALUE="12">December 
		</SELECT> /
		<SELECT NAME="expirationYear">
			<OPTION VALUE="" SELECTED>--Year--
			<OPTION VALUE="04">2004
			<OPTION VALUE="05">2005
			 <OPTION VALUE="06">2006
			 <OPTION VALUE="07">2007
			 <OPTION VALUE="08">2008
			 <OPTION VALUE="09">2009
			 <OPTION VALUE="10">2010
			 <OPTION VALUE="11">2011
			 <OPTION VALUE="12">2012
			 <OPTION VALUE="13">2013
			 <OPTION VALUE="14">2014
			 <OPTION VALUE="15">2015
		</SELECT>
		</td>
	</tr>
	<tr> 
		<td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
	</tr>
	<tr bgcolor="#E5E5E5"> 
		<td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Additional Information</strong></td>
	</tr>
	<tr> 
		<td height="22" align="right" valign="middle">Contact Email:</td>
		<td colspan="2" align="left"><input name="contactEmail" type="text" value="" size="50"></td>
	</tr>
	<tr> 
		<td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
	</tr>
	<tr> 
		<td height="22" align="right" valign="top">Special instructions for the staff:</td>
		<td colspan="2" align="left"><textarea name="notes" cols="45" rows="4"></textarea></td>
	</tr>
	</table>
 	<!--<INPUT TYPE="submit" VALUE="Find Room">-->
	<!-- make into php file, start session, session variable with credit card number-->
	<p><a href="addreservation.php" > <button type="button" >Confirm Reservation</button></a><br><br>
		<a href="findaroom.php" > <button type="button" >Cancel</button></a></p>
	</form>
	</center>
	<footer>
	<!--	Only class=linked will have hover effects	-->
	<ul id="homeMenu2">
		<li><a class="linked" href="index.php">Index</a>
		<a class="linked" href="about.php">About Toro Hotel</a>
		<a class="linked" href="log-in-staff.php" >Staff</a>
		<a class="linked" href="careers.php" >Careers</a>
		<a >Call Us (310) 243-TORO</a>
		<a >&#x7c; &nbsp; &#169; 2013-2015 Toro Hotels, Inc. All rights reserved</a></li>		
	</ul>
	</footer>
</body>
</html>
