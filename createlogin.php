<?php
	if(!isset($_SESSION["employeeid"]))
		{
		session_start();
		}
	else
		{
		session_start();
		$employeeEmail = strip_tags($_POST["femail"]);
		$fname = strip_tags($_POST["firstname"]);
		$lname = strip_tags($_POST["lastname"]);
		$password = strip_tags($_POST["fpass"]);
		}
		/*global session variables that are kept track on this page.
		$_SESSION["employeeid"]
		$_SESSION["employeefirstname"]
		$_SESSION["employeelastname"]
		$_SESSION["employeepassword"]
		$_SESSION["employeepposition"]*/
?>
<HTML>
   <HEAD>
      <TITLE>Toro Hotel Log In</TITLE>
	  <LINK HREF="p4verify.css" REL="stylesheet" TYPE="text/css">
   </HEAD>
   <BODY>
   <?PHP
	echo "<div class='sign-out-menu'>";
	//session_start();
		if(isset($_SESSION['firstname']))
		{
			//$login = $_SESSION['username'];
			$displayname = $_SESSION['firstname'];
			//echo 'Welcome $displayname!'.
			echo "<li><a href='staff-home.php' >Welcome $displayname</a>  <a href='logout.php'>Log Out</a> </li>";
		}
		else
		{
			//echo 'Hello Guest!';
			echo "<li><a href='' >Welcome Guest!</a>  <a href='log-in-customer.php'>Log In</a> </li>";
		}
	echo "</div>";
	?>
	<BR>
	<h1>Toro Hotel</h1>
	<CENTER>
	<NAV>
		<UL>
			<LI><A HREF="p4home.php">Toro Hotel Index</A></LI><BR>
		</UL>
	</NAV><BR><BR><BR><BR>
		<FORM ID="login" ACTION="createcustomer.php" METHOD="POST" TARGET=_self><BR>
		<H1>Create an Account</H1><BR><BR>
		Email Address:
		<INPUT TYPE="text" NAME="femail" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="Email Address*"/required><BR><BR>
		First Name:
		<INPUT TYPE="text" NAME="firstname" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="First Name*"/required><BR><BR>
		Last Name:
		<INPUT TYPE="text" NAME="lastname" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="Last Name*"/required><BR><BR>
		Create password:
		<INPUT TYPE="password" NAME="fpass" VALUE="" SIZE="20" MAXLENGTH="10" PLACEHOLDER="Set up Password*"><BR><BR>
		<INPUT TYPE="submit" VALUE="Register"><BR><BR><BR>
		</FORM>
	</CENTER>
	<DIV ID="footer">Copyright &copy; Toro Hotel</DIV>
   </BODY>
</HTML>
