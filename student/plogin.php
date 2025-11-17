<?php

include("studconnection.php");

if (!$conn)
{
    die("Database connection failed: " . mysqli_connect_error());
}

//$_POST ambil nama <input>
$MatricNo = mysqli_real_escape_string($conn,$_POST['MatricNo']);
$password = mysqli_real_escape_string($conn,$_POST['password']);


$sql = "SELECT * FROM students s 
		where MatricNo = '$MatricNo'
		and password = '$password'";

// Check if MatricNo or password contain spaces
if (preg_match('/\s/', $MatricNo))
{
	echo "<script>alert('Matric ID cannot contain spaces.'); window.location='login.html';</script>";
	exit;
}

if (preg_match('/\s/', $password))
{
    echo "<script>alert('Password cannot contain spaces.'); window.location='login.html';</script>";
    exit;
}

if (strlen($MatricNo) < 3 || strlen($MatricNo) > 20)
{
    echo "<script>alert('Matric ID must be 3-20 characters.'); window.location='login.html';</script>";
    exit;
}

if (strlen($password) < 8 || strlen($password) > 30)
{
    echo "<script>alert('Password must be 8-30 characters.'); window.location='login.html';</script>";
    exit;
}
	

$qry = mysqli_query($conn, $sql);
$row = mysqli_num_rows($qry);

		if($row > 0)
		{
			$r = mysqli_fetch_assoc($qry);
			
			session_start();
			
			$_SESSION['userlogged'] = 1;
			$_SESSION['MatricNo'] = $MatricNo;
			$_SESSION['password'] = $password;
			$_SESSION['studIcNo'] = $r['studIcNo'];
			$_SESSION['studID'] = $r['studID'];
			$_SESSION['studGender'] = $r['studGender'];
			$_SESSION['studName'] = $r['studName'];
			
			
			//use when stud order product
			$_SESSION['orderID'] = ""; //to create orderID
			$_SESSION['logoutPermission'] = 1; //when stud select prod and that prod have in cart, this will prevent them to log out to the system [0=No 1=Yes]
			$_SESSION['order4Receipt'] = ""; //after checkout, orderID will be new but the orderID that has been ordered before will be save in this $_SESSION
			
			
			header("Location:home.php");
		
			}
			
		
		else
		{
			echo
			"<script language='javascript'>
				alert('Student does not exist.');
				window.location='login.html';
			</script>";
		}

?>