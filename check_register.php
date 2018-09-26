<?php

	include ("Connection/condb.php");
	$sql = "SELECT * FROM user WHERE username = '".trim($_POST['username'])."' 
	and Password = '".$_POST['password']."'";
	$query = mysqli_query($db, $sql);
	$result = mysqli_fetch_array($query);

	if($result)
	{
            echo "มีชื่อผู้ใช้นี้แล้ว!";
            echo "<script>alert('มีชื่อผู้ใช้นี้แล้ว!')</script>";
            echo '<meta http-equiv= "refresh" content="0; url=register.php"/>'; 
		
	}
	else
	{
        $sql = "INSERT INTO user (username, password) VALUES ('".$_POST["username"]."', 
		'".$_POST["password"]."')";
        $query = mysqli_query($db, $sql);
        echo "<script>alert('Register Completed!')</script>"; 
		// echo "<script>window.close();</script>";
		echo '<meta http-equiv= "refresh" content="0; url=login_form2.php"/>';
		
	}
		mysqli_close($db);







	
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
		
	// $strSQL = "INSERT INTO user (username, password) VALUES ('".$_POST["username"]."', 
	// '".$_POST["password"]."')";
	// $objQuery = mysql_query($strSQL);
		
		// echo "<script>alert('Register Completed!')</script>"; 
		// echo "<script>window.close();</script>";
		// echo '<meta http-equiv= "refresh" content="0; url=searchmember.php"/>';
		
	// }

	// mysql_close();
?>