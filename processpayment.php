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
<HTML>
 <BODY>
 <?PHP
	echo "<div class='sign-out-menu'>";
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
   <HEAD>
      <TITLE>Payment</TITLE>
	  
   </HEAD>
   
	<?PHP
	// first connect to database
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'password';
	$db_mydb = "torohotel";
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(!$conn)
		{
			echo "Could not connect: " . mysql_error()."<BR>";
		}
	//use my own database
	mysql_select_db('torohotel');

	 $reservation = $_POST['reservation'];
	
	// verify reservation table exists
	$sql = "show tables like 'reservation'";
	$retval = mysql_query($sql, $conn);
		
		
	// reservation table does exist, query the table
	$sql = "select RSVP, CustomerID, RoomNumber, RoomType, CheckInDate, CheckOutDate from reservation where RSVP = '$reservation'";
	$retval = mysql_query($sql, $conn);

	$sql2 = "UPDATE `reservation` SET `Paid` = '1' WHERE `reservation`.`RSVP` = '$reservation' ";
	$retval2 = mysql_query($sql2, $conn);

	?>

<?PHP
	// check if query returned anything
	if (mysql_num_rows($retval) == 0)
		echo "There are No Customers listed .<BR><BR>";
	else
	{
		// 1 or more pets were returned, create and output the table
		echo 
			"<H2>Customer Payment has been Processed!</H2><BR><BR>".
			"<H2>Customer Checked Out!</H2><BR><BR>".
			"<TABLE border=5>".
			"<TR>".
				"<TH>Reservation Number</TH>".
				"<TH>Customer ID</TH>".
				"<TH>Room Number</TH>".
				"<TH>Room Type</TH>".
				"<TH>Check In Date</TH>".
				"<TH>Check Out Date</TH>".
				
			"</TR>";
		while ($row = mysql_fetch_row($retval))
		{
			echo "<TR>";
			for ($i=0; $i<6; $i++)
				{
					echo "<TD>".$row[$i]."</TD>";
				}
			echo "</TR>";
		}
		echo "</TABLE><BR>";	
	}
	mysql_close($conn);
	?>

<a href = "staff-home.php">Back To Employee Home</a>

</BODY>
</HTML>


