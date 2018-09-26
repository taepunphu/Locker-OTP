<?php
	//random
	function generateRandomString($length = 4) {
		return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
	$random = generateRandomString();
	//
	include ("Connection/condb.php");
	// $db = mysqli_connect('localhost', 'tae', '1234', 'locker');

	$sql = "UPDATE locker SET genLockerOTP = '$random' WHERE LockerID = '$_GET[id]'";
	$query = mysqli_query($db, $sql);
	$sql2 = "SELECT * FROM locker WHERE LockerID = '$_GET[id]'";
	$query2 = mysqli_query($db, $sql2);
	$result = mysqli_fetch_array($query2);
	
	$genOTP = $result["genLockerOTP"];
	$authenOTP = $result['authenLockerOTP'];
	$lockerID = $result["LockerID"];
	
	// echo "<script>location.reload();</script>";
		if("$genOTP" != "$authenOTP"){
		echo "<script type='text/javascript'>alert('กำลังสุ่ม OTP กรุณากรอกให้เสร็จก่อนปิด')</script>";
		echo "<script type='text/javascript'>alert('OTP: $genOTP')</script>";
		// echo $genOTP;
		// echo "<script>window.close();</script>";
		echo '<meta http-equiv= "refresh" content="0; url=checkotp.php?id='.$lockerID.'"/>';
		// header( "refresh:0; url=checkotp.php?id=$lockerID" );
		
		// echo $authenOTP;
		// echo $genOTP;
		}
	
?>

<script type="text/javascript">
    setInterval(function () { 
		location.reload();
    }, 5 * 1000);
</script>