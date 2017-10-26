(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		


		$http.get(baseurl+'coustomerservices/getRecentOrders/submitted').success(
			function(response) 
			{
				$scope.porders = response;
			}
		);

		$http.get(baseurl+'coustomerservices/getRecentOrders/processed').success(
			function(response) 
			{
				$scope.psorders = response;
			}
		);

	};

	app.controller('Dashbord', ctlr);


}());

/**
	NewOrder 
*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams,$location,$interval) {	 

		/* open by draft */

		if( $routeParams.id != undefined)
		{
			$scope.order_id = $routeParams.id.substring(1); 

			$http.get(baseurl+'coustomerservices/getOrder/'+ $scope.order_id).success(
				function(response) 
				{
					$scope.order = response;
					

					if(response.order_details.order_status!='draft'){
						$location.path("newOrder");
					}

					$scope.order_id=response.order_details.order_id;
					if(response.order_details.order_date != null)
					{
						$scope.order_date=response.order_details.order_date;
					}
				

					$scope.order_required_delivery_date=response.order_details.order_required_delivery_date;
					$scope.order_notes=response.order_details.order_notes;
					$scope.cart=[];


					angular.forEach($scope.order.order_items,function(item){
						$scope.cart.push({
							"id":item.item_id,
							"product_id":item.product_id,
							"order_id":$scope.order_id,
							"product_title":item.product_title,
							"item_quantity":item.item_quantity,
							"unit_name":item.unit_name,
							"product_regular_unit_price":item.product_regular_unit_price,
							"tax_calc":item.tax_calc
						});


						
					});


					


					$http.get(baseurl+'coustomerservices/getSupplier/'+$scope.order.order_details.order_supplier_id).success(
						function(response) 
						{
							$scope.supplier = response;
							$scope.selected_supplier = $scope.supplier.supplier_id;


						}
					);
					$scope.autosave = $interval(function() { 
						$scope.saveOrder('draft'); 
					}, 10000);

				}
			);		
			
			
		}else{

			$scope.selecter = true;
		}


		$http.get(baseurl+'coustomerservices/getCoustomerInfo').success(
			function(response) 
			{
				$scope.coustomer = response.coustomer;
				$scope.suppliers = response.suppliers;

			}
		);


		$scope.selectSupplier = function(){
			$scope.selecter = null;
						
			$http.get(baseurl+'coustomerservices/getSupplier/'+$scope.selected_supplier).success(
				function(response) 
				{
					$scope.supplier = response;

					$order_details = {
						'order_coustomer_id' : $scope.coustomer.coustomer_id,
						'order_supplier_id' : $scope.supplier.supplier_id,
						'order_status' : 'draft'
					};

					var order = {
						'order_details':$order_details
					};



					$http.post(baseurl+'coustomerservices/saveOrder',order).success(function(response){
						
						$http.get(baseurl+'coustomerservices/genNewOrderID').success(
							function(response) 
							{
								
								$location.path("newOrder:"+response);

							}
						);

					});				
				}
			);
		}


		

		$http.get(baseurl+'coustomerservices/getCategory').success(
			function(response) 
			{
				$scope.categorys = response;

			}
		);

		$scope.selectProducts = function()
		{
			$scope.fproduct = '';
			$scope.unit_quantity = null;
			$scope.selected_product = null;
			$http.get(baseurl+'coustomerservices/getProducts/'+ $scope.selected_category.product_cat_id + '/' + $scope.selected_supplier).success(
			
				function(response) 
				{
					$scope.products = response;
					

				}
			);
		}

		$scope.selecteProduct = function()
		{

			$scope.unit_quantity = 1;
			$http.get(baseurl+'coustomerservices/getProduct/'+ $scope.opt_selected_product.product_id).success(
				function(response) 
				{
					$scope.selected_product = response;
					console.log($scope.selected_product);
					$scope.unit_quantity = parseInt($scope.selected_product.product_min_qt);




				}
			);


		}


		

		$scope.removeFrmCart = function(index)
		{
			if($scope.cart[index].id != undefined){
				$http.post(baseurl+'coustomerservices/removeItem/'+$scope.cart[index].id).success(function(response){});
			}
			$scope.cart.splice(index, 1);
		}




		$scope.totalQuantityOrderd = function(){
			var total = 0; 
			angular.forEach($scope.cart,function(item){
				total += parseInt(item.item_quantity);
				
			});
			return total;

		}

		
		$scope.totalCost = function(){
			var totalPrice = 0; 

			angular.forEach($scope.cart,function(item){
				
				var tax = item.tax_calc;
				var price = item.product_regular_unit_price;
				var qyt = item.item_quantity

				totalPrice +=(((tax/100)*price)+(price*1)) * qyt;
				
			});
			return totalPrice;
		}


		$scope.saveOrder = function(status)
		{
			
			if(status=='submitted'){
				$interval.cancel($scope.autosave);
				console.log("cancle");
			}

			$order_details = {
				'order_id' : $scope.order_id,
				'order_coustomer_id' : $scope.coustomer.coustomer_id,
				'order_supplier_id' : $scope.supplier.supplier_id,
				'order_status' : status,
				'order_notes' : $scope.order_notes,
				'order_date' : $scope.order_date,
				'order_required_delivery_date' : $scope.order_required_delivery_date,
				'order_total_price' : $scope.totalCost()
			};

			



			$http.post(baseurl+'coustomerservices/saveOrder',{'order_details':$order_details}).success(function(response){
				if(status=='submitted'){
					$location.path("viewOrder:"+$scope.order_id);
				}
			});
		}

		$scope.addToCart = function()
		{
			if(typeof $scope.cart == 'undefined'){$scope.cart=[]}

			

			var item = {
				"product_id":$scope.selected_product.product_id,
				"order_id":$scope.order_id,
				"item_quantity":$scope.unit_quantity
			};

			if($scope.unit_quantity >= $scope.selected_product.product_min_qt)
			{
				$http.post(baseurl+'coustomerservices/addOrderItem',{'order_item':item}).success(function(response){
					$scope.cart.push({
						"id":response,
						"product_id":$scope.selected_product.product_id,
						"order_id":$scope.order_id,
						"product_title":$scope.selected_product.product_title,
						"item_quantity":$scope.unit_quantity,
						"product_regular_unit_price":$scope.selected_product.product_regular_unit_price,
						"tax_calc":$scope.selected_product.tax_calc
					});
				});	
			}
			else{
				alert('Minimum qyt is ' + $scope.selected_product.product_min_qt + ' for this item');
				$scope.unit_quantity = parseInt($scope.selected_product.product_min_qt);
			}

			
		


		}

		$scope.updateQuantity = function(id,qyt)
		{
			$http.post(baseurl+'coustomerservices/updateQuantity/'+id+'/'+qyt).success(function(){});	
			
		}

		$scope.submitOrder = function()
		{
			if(confirm('Are you sure you want Submit this Order ?')==true)
			{
				$scope.saveOrder('submitted');
			}
		}




		

		

	};

	app.controller('newOrder', ctlr);


}());


(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		
		$http.get(baseurl+'coustomerservices/getOrders').success(
			function(response) 
			{
				$scope.orders = response;
			}
		);
		
	};

	app.controller('viewOrders', ctlr);


}());


/**
 	ViewOrder 
*/


(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams,$location) {	    
		
		$http.get(baseurl+'coustomerservices/getOrder/'+$routeParams.id.substring(1)).success(
			function(response) 
			{
				$scope.order = response;
				
				$http.get(baseurl+'common/getCrwsCode/'+$scope.order.order_details.order_coustomer_id+'/'+$scope.order.order_details.order_supplier_id).success(function(response){
					$scope.crws_code=response;
				});

				$scope.totalItem = function(){
					return $scope.order.order_items.length;
				}

				$scope.totalQuantityOrderd = function(){
					var total = 0; 
					angular.forEach($scope.order.order_items,function(item){
						total += parseInt(item.item_quantity);
						
					});
					return total;

				}

				$scope.totalQuantityRecived = function(){
					
					var total = 0; 
					angular.forEach($scope.order.order_items,function(item){
						total += parseInt(item.item_recived_quantity);
						
					});
					return total;
				}

				$scope.totalCost = function(){
					var totalPrice = 0; 
					angular.forEach($scope.order.order_items,function(item){
						line_total = (item.item_quantity*item.product_regular_unit_price);
						totalPrice += line_total + (line_total * (item.tax_calc/100));
						
					});
					return totalPrice;
				}
			

			}


			
		);

		$scope.deleteOrder = function()
		{

			if(confirm('Are you sure you want to delete this order ?')==true)
			{
				$http.post(baseurl+'coustomerservices/deleteOrder/'+$scope.order.order_details.order_id).success(function(response){
					$location.path("viewOrders");
				});	
			}
		}

		$scope.acceptOrder = function()
		{


			if(confirm('Are you sure you want to Accpet order ?')==true)
			{
				var items = [];
				angular.forEach($scope.order.order_items,function(item){
					items.push({
						'item_id':item.item_id
						,'item_recived_quantity':item.item_recived_quantity
					});
				});

				console.log(items);

				$http.post(baseurl+'coustomerservices/acceptOrder/'+$scope.order.order_details.order_id,{'order_items':items}).success(function(response){
					
					$scope.order.order_details.order_status = 'accepted';
					

				});	
			}

			

		}



		
		
	};

	app.controller('viewOrder', ctlr);


}());


(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		
		$http.get(baseurl+'coustomerservices/getSupplier').success(
			function(response) 
			{
				$scope.suppliers = response;


			}
		);
		
	};

	app.controller('viewSuppliers', ctlr);


}());


(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	   
		$http.get(baseurl+'coustomerservices/getSupplier/'+ $routeParams.id.substring(1)).success(
			function(response) 
			{
				$scope.supplier = response;

			}
		);
		
	};

	app.controller('viewSupplier', ctlr);


}());

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		
		$http.get(baseurl+'coustomerservices/getProducts/'+$routeParams.id.substring(1)).success(
			function(response) 
			{
				$scope.products = response;

			}
		);

		

		$http.get(baseurl+'coustomerservices/getCategory').success(
			function(response) 
			{
				$scope.categorys = response;

			}
		);

		$http.get(baseurl+'coustomerservices/getSupplier/'+$routeParams.id.substring(1)).success(
			function(response) 
			{
				$scope.supplier = response;

			}
		);


	
		
	};

	app.controller('viewProductsBySupplier', ctlr);


}());

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		
		$http.get(baseurl+'coustomerservices/getProducts').success(
			function(response) 
			{
				$scope.products = response;

			}
		);

		$http.get(baseurl+'coustomerservices/getSupplier').success(
			function(response) 
			{
				$scope.suppliers = response;

			}
		);

		$http.get(baseurl+'coustomerservices/getCategory').success(
			function(response) 
			{
				$scope.categorys = response;

			}
		);


	};

	app.controller('viewProducts', ctlr);


}());

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		
		$http.get(baseurl+'coustomerservices/getProduct/'+$routeParams.id.substring(1)).success(
			function(response) 
			{
				$scope.product = response;
				console.log($scope.product);

			}
		);
		
	};

	app.controller('viewProduct', ctlr);


}());



(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		
		$http.get(baseurl+'coustomerservices/getCoustomerInfo').success(
			function(response) 
			{
				$scope.coustomer = response.coustomer;
				$scope.suppliers = response.suppliers;

			}
		);
		
	};

	app.controller('profile', ctlr);


}());



