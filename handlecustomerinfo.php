<?php
	session_start();
	
	$username = "root";
	$password = "password";
	$hostname = "localhost";
	$conn = mysql_connect($hostname, $username, $password) or die ("Could not connect to database");
	$selected = mysql_select_db("torohotel", $conn);

	$query = "SELECT * FROM customer WHERE Email = '".$_POST['cemail']."'";
	$retval = mysql_query($query, $conn) or die(mysql_error());
	$result = mysql_fetch_array($retval);
	
	
	if($result == false){
	header("Location: getcustomerinfo.php");
	}
	else {
	//$_SESSION['customeremail'] = $_POST['cemail'];
	$_SESSION['customerid'] = $result['CustomerID'];
	//$_SESSION['customerfirstname'] = $result['FirstName'];
	//$_SESSION['customerlastname'] = $result['LastName'];	
		
	mysql_close();
	header("Location: findaroom.php");
	}

?>




