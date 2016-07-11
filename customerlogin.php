<?php
	session_start();
	if(!isset($_SESSION["customerid"]))
		{
			header("Location: index.php");
		}
		/*global session variables that are kept track on this page.
		$_SESSION['customeremail']
		$_SESSION['customerid']
		$_SESSION['customerfirstname']
		$_SESSION['customerlastname']
		$_SESSION['customerpassword']*/
?>
<HTML>
   <HEAD>
      <TITLE>Toro Hotel Log In</TITLE>
	  <LINK HREF="p4verify.css" REL="stylesheet" TYPE="text/css">
   </HEAD>
   <BODY>
   <?PHP
	echo "<div class='sign-out-menu'>";
		//if a customer is logged in
		if(isset($_SESSION['customerid']))
		{
			//display customer's first name and Log Out combo
			$displayname = $_SESSION['customerfirstname'];
			echo "<ul><li>
					<a href='customer-home.php'>Welcome $displayname</a>
					<a href='logout.php'>Log Out</a>
				</li></ul>";
		}
		else
		{
			//display a generic Welcome Guest and Log In combo
			echo "<ul><li>
					<a href='index.php'>Welcome Guest!</a>
					<a href='log-in-customer.php'>Log In</a>
				</li></ul>";
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
		<FORM ID="login" ACTION="checkcustomer.php" METHOD="POST" TARGET=_self><BR>
		<H1>Login to Toro Hotel</H1><BR><BR>
		Email address:
		<INPUT TYPE="text" NAME="femail" VALUE="" SIZE="20" MAXLENGTH="20" PLACEHOLDER="Email Address*"/required><BR><BR>
		Password:
		<INPUT TYPE="password" NAME="fpass" VALUE="" SIZE="20" MAXLENGTH="10" PLACEHOLDER="Password*"><BR><BR>
		<INPUT TYPE="submit" VALUE="Log In"><BR><BR><BR>
	</FORM>
	</CENTER>
	<DIV ID="footer">Copyright &copy; Toro Hotel</DIV>
   </BODY>
</HTML>
