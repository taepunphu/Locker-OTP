<?php
	session_start();
	include ("Connection/condb.php");
	$sql = "SELECT * FROM locker WHERE LockerID = '$_GET[id]'";
	$query = mysqli_query($db, $sql);
	// $result = mysqli_fetch_array($query);
	// $sql2 = "SELECT * FROM user";
	// $query2 = mysqli_query($db, $sql2);
	// $result2 = mysqli_fetch_array($query2);

?>

<!DOCTYPE html>
<html>
<title>Status</title>
<script src="jquery-1.11.3.min.js"></script>
<script src="mqttws31.js"></script>
<script>
var config = {
	mqtt_server: "m15.cloudmqtt.com",
	mqtt_websockets_port: 39684,
	mqtt_user: "TEST",
	mqtt_password: "12345"
};

$(document).ready(function(e) {
	// Create a client instance
	client = new Paho.MQTT.Client(config.mqtt_server, config.mqtt_websockets_port, "web_" + parseInt(Math.random() * 100, 10)); 
	//Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));
	
	// connect the client
	client.connect({
		useSSL: true,
		userName: config.mqtt_user,
		password: config.mqtt_password,
		onSuccess: function() {
			// Once a connection has been made, make a subscription and send a message.
			// console.log("onConnect");
			$("#status").text("Connected").removeClass().addClass("connected");
			client.subscribe("/LED");
			mqttSend("/LED", "GET");
		},
		onFailure: function(e) {
			$("#status").text("Error : " + e).removeClass().addClass("error");
			// console.log(e);
		}
	});
	
	client.onConnectionLost = function(responseObject) {
		if (responseObject.errorCode !== 0) {
			$("#status").text("onConnectionLost:" + responseObject.errorMessage).removeClass().addClass("connect");
			setTimeout(function() { client.connect() }, 1000);
		}
	}
	
	client.onMessageArrived = function(message) {
		// $("#status").text("onMessageArrived:" + message.payloadString).removeClass().addClass("error");
		console.log(message.payloadString);
		if (message.payloadString == "lock" || message.payloadString == "unlock") {
			$("#LED-on").attr("disable", (message.payloadString == "lock" ? true : false));
			$("#LED-off").attr("disable", (message.payloadString == "unlock" ? true : false));
		}
	}

	$("#LED-on").click(function(e) {
        mqttSend("/LED", "lock");
    });
	
	$("#LED-off").click(function(e) {
        mqttSend("/LED", "unlock");
    });
});

var mqttSend = function(topic, msg) {
	var message = new Paho.MQTT.Message(msg);
	message.destinationName = topic;
	client.send(message); 
}
</script>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ล็อคเกอร์ที่ติดล็อก</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a href="index.php" class="navbar-brand"><span>LOCKER</span>OTP</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<?php
                while ($row =mysqli_fetch_array($query)) {
					$lockerID = $row["LockerID"];
					if($_SESSION["username"] != $row["LockerUser"] && $row["LockerUser"] != ''){
						echo "<script>alert('ไม่ใช่ล็อกเกอร์ของคุณ!!')</script>";
						echo '<meta http-equiv= "refresh" content="0; url=login_form2.php?id='.$lockerID.'"/>';
					}
                ?>
				<h1 class="page-header">Locker <?php echo $row["LockerName"]?></h1>
				<?php
				if($row["LockerStatus"] == "ไม่ล็อค"){ ?>
					<a id="LED-on" href="lock.php?id=<?php echo $row["LockerID"]; ?>"><img src='icon/lock.png' alt='lock' /></a>
					<h3>กรุณารอ Server connect!? => <span id="status" class="connect">Connect...</span></h3>
				<?php
				}
				?>
				<?php
				if($row["LockerStatus"] == "ล็อค"){ ?>
					<a href="unlock.php?id=<?php echo $row["LockerID"]; ?>"><img src='icon/unlock.png' alt='unlock'/></a>
					<h3>กรุณารอ Server connect!? => <span id="status" class="connect">Connect...</span></h3>	
				<?php
				}
				}
				?>				
			</div>
        </div><!--/.row-->
        

    </div>	<!--/.main-->
	  

    <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        
    </body>
    </html>
    