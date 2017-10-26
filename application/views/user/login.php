<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cafe Anatolia Inventory</title>
	<link rel="stylesheet" href="<?=base_url() ?>public/css/style.css">
</head>
<body>
	

	<div class="vsap" style="height: 30px;"></div>

	<center><img src="<?=base_url() ?>public/img/logo-ex.png" alt=""></center>
	<div class="ui container login">
		
	

		<?php if(isset($error)): ?>
		<div class="ui negative message icon ">
			<i class="warning circle icon"></i>
			<div class="header">
				Invalid Login Information
			</div>
			<p>Please check your username and password</p>
		</div>
		<?php endif; ?>



		<div class="ui icon message attached">
			<i class="users icon"></i>
			<div class="content">
				<div class="header">
					Customer Dashboard Login
				</div>
				<p>Use your login details that you recived from <strong>Head Office</strong></p>
			</div>
		</div>
		
		<form class="ui form attached fluid segment" method="POST" action="">

			<div class="field">
				<label>Username</label>
				<input placeholder="Username" type="text" required name="uname">

			</div>
			<div class="field">
				<label>Password</label>
				<input type="password" required name="pass">
			</div>
			<div class="inline field">
				<div class="ui checkbox">
					<input type="checkbox" id="terms">
					<label for="terms">Remember me on this device</label>
				</div>
			</div>
			<input name="submit" type="submit" value="Login" class="ui blue submit button fluid">
		</form>
		<div class="ui bottom attached warning message">
			<i class="icon help"></i>
			Forgot your login details ? <a href="#">Recover login details</a>
		</div>

	</div>










	<script src="<?=base_url() ?>public/js/jquery-2.1.1.min.js"></script>
	<script src="<?=base_url() ?>public/js/semantic.min.js"></script>
</body>
</html>