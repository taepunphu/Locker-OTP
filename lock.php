<?php
	session_start();
	include ("Connection/condb.php");
	$sql = "SELECT * FROM user WHERE userID = '".$_SESSION['userID']."'";
	$query = mysqli_query($db, $sql);
	$result = mysqli_fetch_array($query);
	$user = $result["username"];
	// $db = mysqli_connect('localhost', 'tae', '1234', 'locker');

	$sql = "UPDATE locker SET LockerStatus = 'ล็อค', LockerUser = '$user' WHERE LockerID = '$_GET[id]'";
	$query = mysqli_query($db, $sql);

	
	echo "<script>alert('Lock!!')</script>"; 
	// echo "<script>window.close();</script>";
	echo '<meta http-equiv= "refresh" content="0; url=index.php"/>';
	
?>
