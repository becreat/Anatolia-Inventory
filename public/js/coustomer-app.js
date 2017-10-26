



var app = angular.module('anatoliaInventory', ['ngRoute']);


app.config(function($routeProvider){
	$routeProvider.
		when('/',{
			controller:'Dashbord'
			,templateUrl:baseurl+'coustomer/dashboard'
	})
		.when('/newOrder',{
			controller:'newOrder'
			,templateUrl:baseurl+'coustomer/newOrder'
		})

		.when('/newOrder:id',{
			controller:'newOrder'
			,templateUrl:baseurl+'coustomer/newOrder'
		})

		.when('/viewOrders',{
			controller:'viewOrders'
			,templateUrl:baseurl+'coustomer/viewOrders'
		})

		.when('/viewOrder:id',{
			controller:'viewOrder'
			,templateUrl:baseurl+'coustomer/viewOrder'
		})

		.when('/viewSuppliers',{
			controller:'viewSuppliers'
			,templateUrl:baseurl+'coustomer/viewSuppliers'
		})

		.when('/viewSupplier:id',{
			controller:'viewSupplier'
			,templateUrl:baseurl+'coustomer/viewSupplier'
		})

		.when('/viewProductsBySupplier:id',{
			controller:'viewProductsBySupplier'
			,templateUrl:baseurl+'coustomer/viewProductsBySupplier'
		})

		.when('/viewProducts',{
			controller:'viewProducts'
			,templateUrl:baseurl+'coustomer/viewProducts'
		})

		.when('/viewProduct:id',{
			controller:'viewProduct'
			,templateUrl:baseurl+'coustomer/viewProduct'
		})

		.when('/sendEmail',{
			controller:'sendEmail'
			,templateUrl:baseurl+'coustomer/sendEmail'
		})

		.when('/howToUse',{
			templateUrl:baseurl+'coustomer/howToUse'
		})

		.when('/profile',{
			controller:'profile'
			,templateUrl:baseurl+'coustomer/profile'
		})




});
