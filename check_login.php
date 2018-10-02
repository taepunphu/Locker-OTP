<?php
	session_start();
	include ("Connection/condb.php");
	$sql = "SELECT * FROM user WHERE username = '".$_POST['username']."' 
	and Password = '".$_POST['password']."'";
	$query = mysqli_query($db, $sql);
	$result = mysqli_fetch_array($query);
	$sql2 = "SELECT * FROM locker WHERE LockerID = '$_GET[id]'";
	$query2 = mysqli_query($db, $sql2);
	$result2 = mysqli_fetch_array($query2);

	if(!$result)
	{
			echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!";
			echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!')</script>";
            echo '<meta http-equiv= "refresh" content="0; url=login_form2.php"/>'; 
		
	}
	else
	{
			$_SESSION["userID"] = $result["userID"];
			$_SESSION["username"] = $result["username"];

			session_write_close();
			if($result2["LockerID"] == '1')
			{
				header("location:status.php?id=1");
			}
			if($result2["LockerID"] == '2')
			{
				header("location:status.php?id=2");
			}
			// echo '<meta http-equiv= "refresh" content="0; url=index.php"/>';
		
	}
		mysqli_close($db);







	// mysql_connect("localhost","tae","1234");
	// mysql_select_db("locker");
	// mysql_query("SET character_set_results=utf8");
	// mysql_query("SET character_set_client=utf8");
	// mysql_query("SET character_set_connection=utf8");
	
	// if(trim($_POST["username"]) == "")
	// {
	// 	echo "Please input Username!";
	// 	exit();	
	// }
	
	// if(trim($_POST["password"]) == "")
	// {
	// 	echo "Please input Password!";
	// 	exit();	
	// }	

	// $strSQL = "SELECT * FROM user WHERE username = '".trim($_POST['username'])."' ";
	// $objQuery = mysql_query($strSQL);
	// $objResult = mysql_fetch_array($objQuery);
	// if($objResult)
	// {
	// 		echo "Username already exists!";
	// }
	// else
	// {	
		
	// 	$strSQL = "INSERT INTO user (username, password) VALUES ('".$_POST["username"]."', 
	// 	'".$_POST["password"]."')";
	// 	$objQuery = mysql_query($strSQL);
		
	// 	echo "<script>alert('Register Completed!')</script>"; 
	// 	echo "<script>window.close();</script>";
	// 	echo '<meta http-equiv= "refresh" content="0; url=searchmember.php"/>';
		
	// }

	// mysql_close();
?>