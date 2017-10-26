<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cafe Anatolia Inventory</title>
	<link rel="stylesheet" href="<?=base_url()?>public/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1 , user-scalable=0">
</head>
<body ng-app="anatoliaInventory">
	
	<div class="ui large menu vertical  mainnavigation  red inverted" >
		<div class="header item"><img src="<?=base_url()?>public/img/logo.png" height="50"></div>

		<a class="active item" href="#/"><i class="dashboard icon icon-left"></i> Dashboard</a>

		<div class="ui dropdown item">
			<i class="print icon icon-left"></i> Order <i class="dropdown icon"></i>

			<div class="menu">
				<a class="item" href="#/newOrder"><i class="file outline icon icon-left"></i>New Order</a> 
				<a class="item" href="#/viewOrders"><i class="file text outline icon icon-left"></i> View Orders</a>
			</div>
		</div>

		<div class="ui dropdown item">
			<i class="shop icon icon-left"></i> Inventory <i class="dropdown icon"></i>

			<div class="menu">
				<a class="item" href="#/viewSuppliers"><i class="users icon icon-left"></i> View Suppliers</a>
				 <a class="item" href="#/viewProducts"><i class="cubes icon icon-left"></i> View Products</a>
			</div>
		</div>

		<div class="ui dropdown item">
			<i class="help circle icon icon-left"></i> Help <i class="dropdown icon"></i>

			<div class="menu">
				<a class="item" href="#/sendEmail"><i class="mail outline icon icon-left"></i>Email Head Office</a>
				<a class="item" href="#/howToUse"><i class="info circle icon icon-left"></i>How To Use</a>
			</div>
		</div>

		<a class="item" href="#/profile"><i class="user icon icon-left"></i> Profile</a>
		<a class="item ui icon" href="<?=site_url('coustomer/logout') ?>"><i class="sign out icon icon-left"></i> Logout</a>
		
		
	</div> <!--End of topnavigation-->

	