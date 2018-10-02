<?php
$servername = "localhost";
$username = "tae";
$password = "1234";
$database = "locker";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
mysqli_query($db, "SET character_set_results=utf8");
mysqli_query($db, "SET character_set_client=utf8");
mysqli_query($db, "SET character_set_connection=utf8");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
// echo "Connected successfully";
?>