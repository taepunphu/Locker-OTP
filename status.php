<?php
	session_start();
	include ("Connection/condb.php");
	$sql = "SELECT * FROM locker WHERE LockerID = '$_GET[id]'";
	$query = mysqli_query($db, $sql);
	// $result = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
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
                ?>
				<h1 class="page-header">Locker <?php echo $row["LockerName"]?></h1>
				<?php
				if($row["LockerStatus"] == "ไม่ล็อค"){ ?>
					<a href="lock.php?id=<?php echo $row["LockerID"]; ?>"><img src='icon/lock.png' alt='lock' />
				<?php
				}
				?>
				<?php
				if($row["LockerStatus"] == "ล็อค"){ ?>
					<a href="unlock.php?id=<?php echo $row["LockerID"]; ?>"><img src='icon/unlock.png' alt='unlock' />	
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
    