<HTML>
 <BODY>
   <HEAD>
      <TITLE>Today's Reservations</TITLE>
	  
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

	mysql_select_db('torohotel');

	 $inDate = date('Y-m-d',time());
	
	$sql = "show tables like 'reservation'";
	$retval = mysql_query($sql, $conn);
		
		
	// reservation table does exist, query the table
//	$sql = "select RSVP, CustomerID, RoomNumber, RoomType, CheckInDate, CheckOutDate from reservation where CheckInDate = '$inDate'";
//	$retval = mysql_query($sql, $conn);
//	if(!$retval)
//		{
//			echo "ERROR: " .mysql_error();
//		}
	?>
	
	


<?PHP
	if (mysql_num_rows($retval) == 0)
		echo "There are No Customers Today.<BR><BR>";
	else
	{
		echo 
			"<H2>Today's Reservations</H2><BR><BR>".
			"<TABLE border=5>".
			"<TR>".
				"<TH>Reservation Number</TH>".
				"<TH>Customer ID</TH>".
				"<TH>First Name</TH>".
				"<TH>Last Name</TH>".
				"<TH>Check In Date</TH>".
				"<TH>Check Out Date</TH>".
				
			"</TR>";

		$sql = "SELECT reservation.RSVP, customer.CustomerID, customer.FirstName, customer.LastName, reservation.CheckInDate, reservation.CheckOutDate
					FROM reservation
					INNER JOIN customer ON 
					customer.CustomerID = reservation.CustomerID
					WHERE CheckInDate = '$inDate' " ;
		
		$result1 = mysql_query($sql, $conn);

		while ($row = mysql_fetch_row($result1))
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


