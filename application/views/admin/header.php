<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrator | Cafe Anatolia Inventory</title>
	<link rel="stylesheet" href="<?=base_url()?>public/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1 , user-scalable=0">
</head>
<body ng-app="anatoliaInventory">
	
	<div class="ui large menu vertical  mainnavigation  red inverted" >
		
		<div class="header item"><img src="<?=base_url()?>public/img/logo.png" height="50"></div>
		
		<a class="item" href="#/"><i class="file text outline icon icon-left"></i> View Orders</a>
		
		<div class="ui dropdown item">
			<i class="cubes icon icon-left"></i>Products <i class="dropdown icon"></i>

			<div class="menu">
				<a class="item" href="#/addProduct"><i class="add icon icon-left "></i> Add Product</a>
				<a class="item" href="#/viewProducts"><i class="browser icon icon-left"></i> View Products</a>
				<a class="item" href="#/manageCategory"><i class="content icon icon-left"></i> Manage Category</a>
			</div>
		</div>

		<div class="ui dropdown item">
			<i class="users icon icon-left"></i>Suppliers <i class="dropdown icon"></i>

			<div class="menu">
				<a class="item" href="#/createSupplier"><i class="add icon icon-left"></i> Create Supplier</a>
				<a class="item" href="#/manageSuppliers"><i class="database icon icon-left"></i> Manage Suppliers</a>
			</div>
		</div>

		<div class="ui dropdown item">
			<i class="male icon icon-left"></i>Customer <i class="dropdown icon"></i>

			<div class="menu">
				<a class="item" href="#/createCustomer"><i class="add icon icon-left"></i> Create Customer</a>
				<a class="item" href="#/manageCustomers"><i class="database icon icon-left"></i> Manage Customer</a>
			</div>
		</div>

		

		

		<div class="ui dropdown item">
			<i class="settings icon icon-left"></i> Settings <i class="dropdown icon"></i>
			
			<div class="menu">
				<a class="item" href="#/changeAccess"><i class="lock icon icon-left"></i> Change Password</a>
				<a class="item" href="#/unitManager"><i class="database icon icon-left"></i> Unit Management</a>
				<a class="item" href="#/taxManager"><i class="legal icon icon-left"></i> Tax Management</a>
			</div>
		</div>

		<a class="item ui icon" href="<?=site_url('admin/logout') ?>"><i class="sign out icon icon-left"></i> Logout</a>
	</div> 


	

	