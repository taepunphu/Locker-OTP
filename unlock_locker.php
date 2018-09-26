<?php
	session_start();
	$db = mysqli_connect('localhost', 'tae', '1234', 'locker');
	$sql = "SELECT * FROM user WHERE userID = '".$_SESSION['userID']."'";
	$query = mysqli_query($db, $sql);
	$result = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ล็อคเกอร์ที่ไม่ติดล็อก</title>
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
				<a class="navbar-brand" href="#"><span>LOCKER</span>OTP</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-th-large">&nbsp;</span> ผู้ใช้งาน : <?php echo $result["username"];?> </a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-th-large">&nbsp;</span> รายการล็อคเกอร์ทั้งหมด</a></li>
			<li><a href="lock_locker.php"><span class="glyphicon glyphicon-remove-circle">&nbsp;</span> ล็อคเกอร์ที่ติดล็อก</a></li>
			<li class="active"><a href="unlock_locker.php"><span class="glyphicon glyphicon-ok-circle">&nbsp;</span> ล็อคเกอร์ที่ไม่ติดล็อก</a></li>
			
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
			<div class="row">
					<ol class="breadcrumb">
						<li><a href="#">
							<em class="fa fa-home"></em>
						</a></li>
						<li class="active">ล็อคเกอร์ที่ไม่ติดล็อก</li>
					</ol>
				</div><!--/.row-->
				
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">ล็อคเกอร์ที่ไม่ติดล็อก</h1>
					</div>
				</div><!--/.row-->
				
				<div class="panel panel-container">
						
					<div class="row">
							
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div class="div-square">
								 <a href="blank.html" >
	   <img src="img/lk.png" width="150" height="150">
							<h4>Locker 1</h4>
							</a>
							<h5>Status : ว่าง</h5>
							</div>
						   
						   
						</div> 
							
							 
							 
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div class="div-square">
								 <a href="blank.html" >
	   <img src="img/lk.png" width="150" height="150">
							<h4>Locker 2</h4>
							</a>
							<h5>Status : ว่าง</h5>
							</div>
						   
						   
						</div>
					
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div class="div-square">
								 <a href="blank.html">
		<img src="img/lk.png" width="150" height="150">
							<h4>Locker 3</h4>
							</a>
							<h5>Status : ว่าง</h5>
							</div>
						   
						   
						</div>
						
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div class="div-square">
								 <a href="blank.html" >
		<img src="img/lk.png" width="150" height="150">
							<h4>Locker 4</h4>
							</a>
							<h5>Status : ว่าง</h5>
							</div>
						   
						   
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div class="div-square">
								 <a href="blank.html" >
		<img src="img/lk.png" width="150" height="150">
							<h4>Locker 5</h4>
							</a>
							<h5>Status : ว่าง</h5>
							</div>
						   
						   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div class="div-square">
								 <a href="blank.html" >
		<img src="img/lk.png" width="150" height="150">
							<h4>Locker 6</h4>
							</a>
							<h5>Status : ว่าง</h5>
							</div>
						   
						   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="div-square">
									 <a href="blank.html" >
			<img src="img/lk.png" width="150" height="150">
								<h4>Locker 7</h4>
								</a>
								<h5>Status : ว่าง</h5>
								</div>
							   
							   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="div-square">
									 <a href="blank.html" >
			<img src="img/lk.png" width="150" height="150">
								<h4>Locker 7</h4>
								</a>
								<h5>Status : ว่าง</h5>
								</div>
							   
							   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="div-square">
									 <a href="blank.html" >
			<img src="img/lk.png" width="150" height="150">
								<h4>Locker 7</h4>
								</a>
								<h5>Status : ว่าง</h5>
								</div>
							   
							   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="div-square">
									 <a href="blank.html" >
			<img src="img/lk.png" width="150" height="150">
								<h4>Locker 7</h4>
								</a>
								<h5>Status : ว่าง</h5>
								</div>
							   
							   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="div-square">
									 <a href="blank.html" >
			<img src="img/lk.png" width="150" height="150">
								<h4>Locker 7</h4>
								</a>
								<h5>Status : ว่าง</h5>
								</div>
							   
							   
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="div-square">
									 <a href="blank.html" >
			<img src="img/lk.png" width="150" height="150">
								<h4>Locker 7</h4>
								</a>
								<h5>Status : ว่าง</h5>
								</div>
							   
							   
					    </div>

				</div>
					
            </div>
		

		
	 
		
	</div>	<!--/.main-->
	  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
	window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
	var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
	responsive: true,
	segmentShowStroke: false
	});
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {
	responsive: true,
	segmentShowStroke: false
	});
	var chart5 = document.getElementById("radar-chart").getContext("2d");
	window.myRadarChart = new Chart(chart5).Radar(radarData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.05)",
	angleLineColor: "rgba(0,0,0,.2)"
	});
	var chart6 = document.getElementById("polar-area-chart").getContext("2d");
	window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	segmentShowStroke: false
	});
};
	</script>	
</body>
</html>
