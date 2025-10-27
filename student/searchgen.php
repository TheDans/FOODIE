<?php
session_start();
include("studconnection.php");

	$i = 1;
	while($i == 1)
	{
		$uniqId = substr(str_shuffle("0123456789"), 0, 3);

		$orderID = "OR".$uniqId;
							
		$sql = "SELECT orderID FROM orders WHERE orderID='".$orderID."'";
		$qry=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($qry);
								
		if($row > 0)
		{
			$i = 1;
		}
		else
		{
			$i = -1;
		}
	}
	
	function checkProdID($conn,$orderID)
	{
		$found = false;
		$sql = "SELECT orderID FROM orders WHERE orderID='".$orderID."'";
		$qry=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($qry);
		
		if($row > 0)
		{
			$found = true;
		}
		return $found;
	}
	
	if(checkProdID($conn, $orderID) == false)
	{
		$_SESSION['orderID'] = "$orderID";
        
		header("Location: searchprod.php");
	}
	else
	{
		echo "error";
	}

?>