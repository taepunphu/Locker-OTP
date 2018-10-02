<?php
	session_start();
	include ("Connection/condb.php");
	$sql = "UPDATE locker SET authenLockerOTP = '".$_POST["otp"]."' WHERE LockerID = '1'";
	$query = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OTP</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">OTP</div>
				<div class="panel-body">
					<form role="form" method="post" action="">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="OTP" name="otp" type="text" autofocus="" required>
							</div>
							
							<!-- <a href="index.html" class="btn btn-primary">Login</a> -->
							<button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
						</fieldset>
							
							<!-- <div class="container">				 -->
									<!-- Modal -->
									<!-- <div class="modal fade" id="myModal" role="dialog"> -->
									  <!-- <div class="modal-dialog"> -->
									  
										<!-- Modal content-->
										<!-- <div class="modal-content">
										  <div class="modal-header">
												<h3 class="modal-title" id="exampleModalLabel">Register</h3>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
										  </div>
										  <div class="modal-body">
												<form method="post" action="save_register.php">
														<div class="form-group">
														  <label for="recipient-name" class="col-form-label">Username :</label>
														  <input type="text" name="username" class="form-control">
														</div>
														<div class="form-group">
																<label for="recipient-name" class="col-form-label">Password :</label>
																<input type="password" name="password" class="form-control">
														</div>
														<button type="submit" name="submit" class="btn btn-primary">ตกลง</button>
												 </form>
										  </div>
										  <div class="modal-footer">
												<button type="submit" name="submit" class="btn btn-primary">ตกลง</button>
										  </div>
										</div>
										
									  </div>
									</div>
						   </div> -->

					 </form>
				</div>
			</div>
		</div><!-- /.col-->

		
	</div><!-- /.row -->	
	




<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>