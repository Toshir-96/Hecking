<?php
include 'connect.php';
if(isset($_REQUEST['submit'])){

	extract($_REQUEST);

	if($obj->userReg($name,$username,$password,$email)){
		header('location:login.php');
	}
	else{
		echo "Cannot Updated!";	
	}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Registration </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<style type="text/css">
		table {
			zoom: 0.9;
		}
		thead {
			background: #724dd8;
			color: #fff;
			font-weight: bold;
		}
		.step-inner-content {
			padding: 40px 40px 28px;
		}
		.custom-btn.custom-btn {
			margin-bottom: 30px;
			display: block;
			right: 0;
			background: #724dd8;
			float: left;
			padding: 9px 25px;
			color: #fff;
			cursor: pointer;
			font-size: 20px;
			border-radius: 0;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="wizard-content-1 clearfix">
			<div class="steps d-inline-block clearfix">
				<span class="bg-shape"></span>
				<ul class="tablist multisteps-form__progress">
					<li class="multisteps-form__progress-btn js-active current">
						<div class="step-btn-icon-text">
							<div class="step-btn-icon float-left position-relative">
								<img src="assets/img/bt1.png" alt="">
							</div>
							<div class="step-btn-text">
								<h2 class="text-uppercase">Registration</h2>
								<span class="text-capitalize"></span>
							</div>
						</div>
					</li>
					<li class="multisteps-form__progress-btn">
						<div class="step-btn-icon-text">
							<div class="step-btn-icon float-left position-relative">
								<img src="assets/img/bt2.png" alt="">
							</div>
							<div class="step-btn-text">
								<h2 class="text-uppercase"><a href="login.php">Login</a></h2>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="step-inner-content clearfix position-relative">
				<div class="wizard-inner-box row justify-content-center">
					<div class="inner-title text-center">
						<h2>Registration</h2>
						<p>Tation argumentum et usu, dicit viderer evertitur te has</p>
					</div>
					<form class="col-md-8 need-job-slide" action="registration.php" method="post">
						<table width="600" border="0" class="table table-striped table-hover" cellspacing="0" cellpadding="5">
							<tr>
								<th width="90" scope="row" style="text-align:right" >Name</th>
								<td width="347"><input type="text" class="form-control input-large" name="name" /></td>
							</tr>
							<tr>
								<th width="90" scope="row" style="text-align:right" >User Name</th>
								<td width="347"><input type="text" class="form-control input-large" name="username" /></td>
							</tr>
							<tr>
								<th width="90" scope="row" style="text-align:right" >Email</th>
								<td width="347"><input type="email" class="form-control input-large" name="email" /></td>
							</tr>
							<tr>
								<th width="90" scope="row" style="text-align:right" >Password</th>
								<td width="347"><input type="password" class="form-control input-large" name="password" /></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Registration" class="btn btn-success custom-btn" /></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>