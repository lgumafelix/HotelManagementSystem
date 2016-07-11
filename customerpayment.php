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
	<H1>Customer Payment</H1>
		<FORM action= "processpayment.php" method= "POST">
		<p>Enter Reservation Number:</p><INPUT type = "text" name = "reservation" />
		
		<BR>
		<INPUT TYPE="submit" value= "Submit Payment/Check Out" />
	</FORM>
	
<BR>

<a href = "staff-home.php">Back To Employee Home</a>



</BODY>

</HTML>
