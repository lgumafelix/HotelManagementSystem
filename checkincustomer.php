<?php
	session_start();
	if(!isset($_SESSION["employeeid"]))
		{
			header("Location: index.php");
		}
		/*global session variables that are kept track on this page.
		$_SESSION["employeeid"] = $empid;
		$_SESSION["employeepassword"] = $password;
		$_SESSION["employeefirstname"] = $staffname;
		$_SESSION["employeelastname"] = $stafflastname;*/
?>
<HTML>
<HEAD>
	<TITLE>Check In Guest</TITLE>
</HEAD>
<BODY>
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

	$reservation = $_POST['fradio'];
	
	// verify reservation table exists
	$sql = "show tables like 'reservation'";
	$retval = mysql_query($sql, $conn);
		
	$empid = $_SESSION['employeeid'];
	
	// reservation table does exist, query the table
	$sql = "select RSVP, CustomerID, RoomNumber, RoomType, CheckInDate, CheckOutDate 
			from reservation 
			where RSVP = '$reservation'";
	$retval = mysql_query($sql, $conn);

	$sql2 = "UPDATE `reservation` 
			SET `CheckInStatus` = '1', 
				'EmployeeID' = '$empid' 
			WHERE `reservation`.`RSVP` = '$reservation' ";
	$retval2 = mysql_query($sql2, $conn);

	// check if query returned anything
	if (mysql_num_rows($retval) == 0)
		echo "There are No Customers listed .<BR><BR>";
	else
	{
		// 1 or more entries were returned
		echo 
			"<H2>Customer is Checked in!</H2><BR><BR>".
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

<a href = "lookup.php">Back To Reservation Look Up</a><BR><BR>
<a href = "staff-home.php">Back To Employee Home</a>

</BODY>
</HTML>


