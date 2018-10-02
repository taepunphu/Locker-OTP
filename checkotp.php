<?php
    session_start();
    include ("Connection/condb.php");
    $sql2 = "SELECT * FROM locker WHERE LockerID = '$_GET[id]'";
	$query2 = mysqli_query($db, $sql2);
    $result = mysqli_fetch_array($query2);
    
    $genOTP = $result["genLockerOTP"];
    $authenOTP = $result['authenLockerOTP'];
    $lockerID = $result["LockerID"];
    
?>

<title>checkotp</title>
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
			mqttSend("/LED", "Connected");
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
<center>
<body>
    <?php
    if("$genOTP" == "$authenOTP"){
        $sql = "UPDATE locker SET LockerStatus = 'ไม่ล็อค', LockerUser = ''
        , genLockerOTP = '', authenLockerOTP = '' WHERE LockerID = '$_GET[id]'";
	    $query = mysqli_query($db, $sql); ?>
        <!-- echo "<script>alert('Unlock!!')</script>"; -->
        <!-- // echo "<script>window.close();</script>"; -->
        <!-- // echo '<meta id="LED-off" http-equiv= "refresh" content="0; url=index.php"/>'; -->
        <h2>UNLOCK!!</h2>
        <h2>รหัส OTP ยืนยันถูกต้อง</h2>
        <a href="index.php"><button id="LED-off" onclick="clickHandler()">เปิดล็อกเกอร์</button>
        <script>
        function clickHandler() {
            window.close();
            }
        </script>
        
    <?php 
    }else{
        echo "<script>alert('รหัสไม่ถูกต้อง!!')</script>";
        // echo "<script>window.close();</script>";
        echo '<meta http-equiv= "refresh" content="0; url=unlock.php?id='.$lockerID.'"/>'; 
        // echo "<script>window.location.reload();</script>";
        // header( "refresh:0; url=unlock.php" );

    }
    ?>
</body>
</center>