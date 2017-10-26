var app = angular.module('anatoliaInventory', ['ngRoute']);


app.config(function($routeProvider){
	$routeProvider.
		when('/',{
			controller:'viewOrders'
			,templateUrl:baseurl+'admin/viewOrders'
		})
		
		.when('/viewOrder:id',{
			controller:'viewOrder'
			,templateUrl:baseurl+'admin/viewOrder'
		})

		.when('/addProduct',{
			controller:'addProduct'
			,templateUrl:baseurl+'admin/addProduct'
		})

		.when('/viewProducts',{
			controller:'viewProducts'
			,templateUrl:baseurl+'admin/viewProducts'
		})

		.when('/editProduct:id',{
			controller:'editProduct'
			,templateUrl:baseurl+'admin/editProduct'
		})

		.when('/manageCategory',{
			controller:'manageCategory'
			,templateUrl:baseurl+'admin/manageCategory'
		})

		.when('/createSupplier',{
			controller:'createSupplier'
			,templateUrl:baseurl+'admin/createSupplier'
		})

		.when('/manageSuppliers',{
			controller:'manageSuppliers'
			,templateUrl:baseurl+'admin/manageSuppliers'
		})

		.when('/editSupplier:id',{
			controller:'editSupplier'
			,templateUrl:baseurl+'admin/editSupplier'
		})


		.when('/createCustomer',{
			controller:'createCustomer'
			,templateUrl:baseurl+'admin/createCustomer'
		})

		.when('/manageCustomers',{
			controller:'manageCustomers'
			,templateUrl:baseurl+'admin/manageCustomers'
		})

		.when('/productManager:id',{
			controller:'productManager'
			,templateUrl:baseurl+'admin/productManager'
		})

		.when('/editCustomer:id',{
			controller:'editCustomer'
			,templateUrl:baseurl+'admin/editCustomer'
		})

		.when('/changeAccess',{
			controller:'changeAccess'
			,templateUrl:baseurl+'admin/changeAccess'
		})

		.when('/unitManager',{
			controller:'unitManager'
			,templateUrl:baseurl+'admin/unitManager'
		})

		.when('/taxManager',{
			controller:'taxManager'
			,templateUrl:baseurl+'admin/taxManager'
		})	

			




});
