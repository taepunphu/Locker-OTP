<?php
    session_start();
    include ("Connection/condb.php");
    $sql2 = "SELECT * FROM locker WHERE LockerID = '$_GET[id]'";
	$query2 = mysqli_query($db, $sql2);
    $result = mysqli_fetch_array($query2);
    
    $genOTP = $result["genLockerOTP"];
    $authenOTP = $result['authenLockerOTP'];
    $lockerID = $result["LockerID"];
    
    if("$genOTP" == "$authenOTP"){
        $sql = "UPDATE locker SET LockerStatus = 'ไม่ล็อค', LockerUser = ''
        , genLockerOTP = '', authenLockerOTP = '' WHERE LockerID = '$_GET[id]'";
	    $query = mysqli_query($db, $sql);
        echo "<script>alert('Unlock!!')</script>"; 
        // echo "<script>window.close();</script>";
        echo '<meta http-equiv= "refresh" content="0; url=index.php"/>';
    }else{
        echo "<script>alert('รหัสไม่ถูกต้อง!!')</script>";
        // echo "<script>window.close();</script>";
        echo '<meta http-equiv= "refresh" content="0; url=unlock.php?id='.$lockerID.'"/>'; 
        // echo "<script>window.location.reload();</script>";
        // header( "refresh:0; url=unlock.php" );

    }
?>