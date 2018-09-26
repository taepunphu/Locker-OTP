<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "tae", "1234", "locker");  
 if(isset($_POST["user_ID"]))  
 {  
      $query = "SELECT * FROM user WHERE userID = '".$_POST["user_ID"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 