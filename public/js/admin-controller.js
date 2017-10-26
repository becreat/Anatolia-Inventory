

/*ViewOrders*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		
		$http.get(baseurl+'adminservices/getOrders').success(
			function(response) 
			{
				$scope.orders = response;
			}
		);
	};

	app.controller('viewOrders', ctlr);

}());


/*ViewOrder*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		
		$http.get(baseurl+'adminservices/getOrders/'+$routeParams.id.substring(1)).success(
			function(response) 
			{
				$scope.order = response;

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
						totalPrice += (item.item_quantity*item.product_regular_unit_price);
						
					});
					return totalPrice + (totalPrice * (15/100));
				}
			

			}
		);




		/*Update Order*/

		$scope.updateOrder = function(status)
		{
			if(confirm('Are you sure you want to change order status ?')==true)
			{
				var order_update = {
					'order_status':status
					,'order_eta':$scope.order.order_details.order_eta
					,'order_tracking':$scope.order.order_details.order_tracking
				}

				


				$http.post(baseurl+'adminservices/updateOrder/'+$scope.order.order_details.order_id,{'order_details':order_update}).success(function(response){
					
					$scope.order.order_details.order_status = status;

				});

				if(status=='processed')
				{
					alert('Order Details is sent to Supplier via Email !!');
				}


				$('.popup-toggle').toggle();
			}
		}


		$scope.submitOrderInfo = function(status)
		{
			
			var order_update = {
				'order_po':$scope.order.order_details.order_po
				,'order_eta':$scope.order.order_details.order_eta
				,'order_tracking':$scope.order.order_details.order_tracking
				,'order_notes':$scope.order.order_details.order_notes
			}

			$http.post(baseurl+'adminservices/updateOrder/'+$scope.order.order_details.order_id,{'order_details':order_update}).success(function(response){});
			$('.popup-toggle').toggle();
		}


	};

	app.controller('viewOrder', ctlr);

}());


/*addProduct*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$location) {	    
		
		$http.get(baseurl+'adminservices/getCategorys/').success(function(response){$scope.categorys = response;});
		$http.get(baseurl+'adminservices/getSuppliers/').success(function(response){$scope.suppliers = response;});
		$http.get(baseurl+'adminservices/getTaxs/').success(function(response){$scope.taxs = response;});
		$http.get(baseurl+'adminservices/getUnits/').success(function(response){$scope.units = response;});

		$scope.product = {};
		$scope.product.product_min_qt = 1;
		$scope.product.product_max_qt = 9999;


		$scope.getRegularPrice = function()
		{

			$scope.product.product_regular_unit_price =  (($scope.product.product_regular_unit_price_rate*$scope.product.product_raw_unit_price)/100) + parseInt($scope.product.product_raw_unit_price);
			return $scope.product.product_regular_unit_price;
		}

		$scope.addProduct = function()
		{
			if(confirm('Are you sure you want Add New Products ?')==true)
			{
				$http.post(baseurl+'adminservices/addProduct/',{'product_details':$scope.product}).success(function(response){
					alert('New Product Created !');
					$location.path('editProduct:'+ response);

				});
				
			}
		}

	};

	app.controller('addProduct', ctlr);

}());


/*viewProducts*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		
		$http.get(baseurl+'adminservices/getProducts').success(function(response){$scope.products = response;});
		$http.get(baseurl+'adminservices/getSuppliers').success(function(response){$scope.suppliers = response;});
		$http.get(baseurl+'adminservices/getCategorys').success(function(response) {$scope.categorys = response;});

		$scope.deleteProduct = function(id,index)
		{
			if(confirm("Are you sure you want to remove this Product ?")==true)
			{
				$http.post(baseurl+'adminservices/deleteProduct/'+id).success(function(response){
					$scope.products.splice(index, 1);
				});
				
			}
		}

		$scope.toggleAccess = function(id,key,index)
		{
			
			$http.post(baseurl+'adminservices/updateProductStatus/'+id+'/'+key).success(function(response){
				
				$scope.products[index].product_status = key;

			});
		}
	};

	

	app.controller('viewProducts', ctlr);

}());




/*editProduct*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {
		$http.get(baseurl+'adminservices/getProduct/'+$routeParams.id.substring(1)).success(function(response){$scope.product = response;});
		$http.get(baseurl+'adminservices/getCategorys/').success(function(response){$scope.categorys = response;});
		$http.get(baseurl+'adminservices/getSuppliers/').success(function(response){$scope.suppliers = response;});
		$http.get(baseurl+'adminservices/getTaxs/').success(function(response){$scope.taxs = response;});
		$http.get(baseurl+'adminservices/getUnits/').success(function(response){$scope.units = response;});

		
		

		$scope.getRegularPrice = function()
		{

			$scope.product.product_regular_unit_price =  (($scope.product.product_regular_unit_price_rate*$scope.product.product_raw_unit_price)/100) + parseInt($scope.product.product_raw_unit_price);
			return $scope.product.product_regular_unit_price;
		}

		$scope.updateProduct = function()
		{
			if(confirm('Are you sure you want to update product Details ?')==true)
			{
				$http.post(baseurl+'adminservices/updateProduct/'+$routeParams.id.substring(1),{'product_details':$scope.product}).success(function(response){
					alert('Product Details Updated');
				});
				
			}
		}

	};

	app.controller('editProduct', ctlr);

}());


/*manageCategory*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		$http.get(baseurl+'adminservices/getCategorys/').success(function(response){$scope.categorys = response;});
		
		$scope.addNew = function()
		{
			if(confirm('Are you sure you want to create new category ?')==true)
			{
				
				$http.post(baseurl+'adminservices/addCategory/').success(function(response){
					$scope.categorys.push({
						'product_cat_id':response
						,'product_cat_title':'category'
						,'product_cat_massure_unit':'kg'
					});
				});
			}
			
		
		}

		$scope.update = function(id,index)
		{

			$http.post(baseurl+'adminservices/updateCategory/'+id,{'category_details':$scope.categorys[index]}).success(function(response){});
			
		
		}

		$scope.delete = function(id,index)
		{
			if(confirm('Confirm to delete it'))
			{
				
				$http.post(baseurl+'adminservices/deleteCat/'+id).success(function(response){
					$scope.categorys.splice(index, 1);
				});
			}
		}
	};

	app.controller('manageCategory', ctlr);

}());


/*Units Manager*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		$http.get(baseurl+'adminservices/getUnits/').success(function(response){$scope.units = response;});
		
		$scope.addNew = function()
		{
			if(confirm('Are you sure you want to create new category ?')==true)
			{
				
				$http.post(baseurl+'adminservices/addUnit/').success(function(response){
					$scope.units.push({
						'unit_id':response
						,'unit_name':'new'
					});
				});
			}
			
		
		}

		$scope.update = function(id,index)
		{

			$http.post(baseurl+'adminservices/updateUnit/'+id,{'unit_details':$scope.units[index]}).success(function(response){});
			
		
		}

		$scope.delete = function(id,index)
		{
			if(prompt('type "del" to delete')=='del')
			{
				
				$http.post(baseurl+'adminservices/deleteUnit/'+id).success(function(response){
					$scope.units.splice(index, 1);
				});
			}
		}
	};

	app.controller('unitManager', ctlr);

}());


/*Tax Manager*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		$http.get(baseurl+'adminservices/getTaxs/').success(function(response){$scope.taxs = response;});
		
		$scope.addNew = function()
		{
			if(confirm('Are you sure you want to create new category ?')==true)
			{
				
				$http.post(baseurl+'adminservices/addTax/').success(function(response){
					$scope.taxs.push({
						'tax_id':response
						,'tax_name':'new'
						,'tax_calc':''
					});
				});
			}
			
		
		}

		$scope.update = function(id,index)
		{

			$http.post(baseurl+'adminservices/updateTax/'+id,{'tax_details':$scope.taxs[index]}).success(function(response){});
			
		
		}

		$scope.delete = function(id,index)
		{
			if(prompt('type "del" to delete')=='del')
			{
				
				$http.post(baseurl+'adminservices/deleteTax/'+id).success(function(response){
					$scope.taxs.splice(index, 1);
				});
			}
		}
	};

	app.controller('taxManager', ctlr);

}());



/*createSupplier*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$location) {

		$scope.addSupplier = function()
		{
			if(confirm('Are you sure you want Add New Supplier ?')==true)
			{
				$http.post(baseurl+'adminservices/addSupplier/',{'supplier_details':$scope.supplier}).success(function(response){
					alert('New Supplier Created !');
					$location.path('editSupplier:'+ response);

				});
				
			}
		}
	};

	app.controller('createSupplier', ctlr);

}());


/*manageSuppliers*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		$http.get(baseurl+'adminservices/getSuppliers/').success(function(response){$scope.suppliers = response;});
	};

	app.controller('manageSuppliers', ctlr);

}());


/*editSupplier*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		$http.get(baseurl+'adminservices/getSuppliers/'+$routeParams.id.substring(1)).success(function(response){$scope.supplier = response;});
		$scope.update = function()
		{
			if(confirm('Are you sure you want to update Supplier Details ?')==true)
			{
				$http.post(baseurl+'adminservices/updateSupplier/'+$routeParams.id.substring(1),{'supplier_details':$scope.supplier}).success(function(response){
					alert('Supplier Details Updated');
				});
				
			}
		}
	};

	app.controller('editSupplier', ctlr);

}());




/*createCustomer*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$location) {	    
		
		$scope.addCustomer = function()
		{
			if(confirm('Are you sure you want Add New Customer ?')==true)
			{
				$http.post(baseurl+'adminservices/addCustomer/',{'customer_details':$scope.customer}).success(function(response){
					alert('New Customer Created !');
					$location.path('editCustomer:'+ response);

				});
				
			}
		}
	};

	app.controller('createCustomer', ctlr);

}());


/*manageCustomers*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		$http.get(baseurl+'adminservices/getCustomers/').success(function(response){$scope.customers = response;});
		$scope.sendAccess = function()
		{
			alert('Software Access Information Send to Customer Via Email.');
		}

		$scope.toggleAccess = function(id,key,index)
		{
			
			$http.post(baseurl+'adminservices/updateCustomerAccess/'+id+'/'+key).success(function(response){
				
				$scope.customers[index].coustomer_active = key;

			});
		}
	};

	app.controller('manageCustomers', ctlr);

}());


/*Manage Price For Individual Customers*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		
		$http.get(baseurl+'adminservices/getCustomers/'+$routeParams.id.substring(1)).success(function(response){$scope.coustomer = response;});
		$http.get(baseurl+'adminservices/getSuppliersByCustomer/'+$routeParams.id.substring(1)).success(function(response){$scope.suppliers = response;});
		$http.get(baseurl+'adminservices/getCategorys').success(function(response) {$scope.categorys = response;});
		$http.get(baseurl+'adminservices/getAvailableProductsByCoustomer/'+$routeParams.id.substring(1)).success(function(response){
				
				$scope.products = response.products;
				$scope.selectedProducts = response.selectedProducts;
		});



		$scope.add = function(id,index)
		{
			if(confirm('Are your sure you want to add this product')){
				
				
				var row = $scope.products[index];

				var data = {
					c_product_coustomer_id:$routeParams.id.substring(1)
					,c_product_product_id:row.product_id
					,c_product_product_min_qt:row.product_min_qt
					,c_product_product_max_qt:row.product_max_qt
					,c_product_unit_price:row.product_regular_unit_price
					,c_product_unit_price_rate:row.product_regular_unit_price_rate
				};

				$http.post(baseurl+'adminservices/createProductInCoustomer/',data).success(function(lastID){
					$scope.selectedProducts.push({
						c_product_id:lastID,
						product_title:row.product_title,
						product_raw_unit_price:row.product_raw_unit_price,
						product_default_unit_price:row.product_regular_unit_price,
						product_default_unit_price_rate:row.product_regular_unit_price_rate,
						c_product_unit_price_rate:row.product_regular_unit_price_rate,
						product_min_qt:row.product_min_qt,
						product_max_qt:row.product_max_qt
					
					});

					$scope.products.splice(index, 1);


				});

				
			}
		}
		
		$scope.update = function(id,index)
		{
			if(confirm('Are your sure you want to change information')){
				
				var row = $scope.selectedProducts[index];
				var data = {
					c_product_unit_price:row.c_product_unit_price,
					c_product_unit_price_rate:row.c_product_unit_price_rate,
					c_product_product_min_qt:row.product_min_qt,
					c_product_product_max_qt:row.product_max_qt
				};

			

				$http.post(baseurl+'adminservices/updateProductInCoustomerList/'+id,data);
			}
		}

		$scope.reset = function(id,index)
		{	

			if(confirm('Are your sure you want to change information')){
				
				var row = $scope.selectedProducts[index];
				var data = {
					c_product_unit_price:row.product_default_unit_price,
					c_product_unit_price_rate:row.product_default_unit_price_rate,
					c_product_product_min_qt:row.default_min_qt,
					c_product_product_max_qt:row.default_max_qt
				};

			

				$http.post(baseurl+'adminservices/updateProductInCoustomerList/'+id,data).success(function(){
					$scope.selectedProducts[index].c_product_unit_price_rate = row.product_default_unit_price_rate;
					$scope.selectedProducts[index].product_min_qt = row.default_min_qt;
					$scope.selectedProducts[index].product_max_qt = row.default_max_qt;
					
				});;
			}

			
		}

		$scope.delete = function(id,index)
		{
			if(confirm('Are your sure you want delete this product')){
				
				

				$http.get(baseurl+'adminservices/removeProductFrmCoustomerList/'+id).success(function(){
					$scope.selectedProducts.splice(index,1);
				});
			}
			
			
		}

		

		


	};

	app.controller('productManager', ctlr);

}());




/*editCustomer*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http,$routeParams) {	    
		$http.get(baseurl+'adminservices/getCustomers/'+$routeParams.id.substring(1)).success(function(response){$scope.customer = response;});
		$http.get(baseurl+'adminservices/getSuppliers/').success(function(response){$scope.suppliers = response;});
		$http.get(baseurl+'adminservices/getSuppliersByCustomer/'+$routeParams.id.substring(1)).success(function(response){$scope.customerssuppliers = response;});
		

		$scope.updateDetails = function()
		{
			if(confirm('Are you sure you want to update Supplier Details ?')==true)
			{
				$http.post(baseurl+'adminservices/updateCustomer/'+$routeParams.id.substring(1),{'customer_details':$scope.customer}).success(function(response){
					alert('Customer Details Updated');
				});

				
			}



		}

		$scope.removeSupplier = function(id,index)
		{	

			if(confirm('Are you sure you want to remove this Supplier ?')==true)
			{
				$http.post(baseurl+'adminservices/removeCrws/'+id).success(function(response){
					$scope.customerssuppliers.splice(index, 1);
				});
			}

		}

		$scope.addSupplier = function(id){

			var ifExists = false;

			angular.forEach($scope.customerssuppliers,function(element){
				if(element.crws_supplier_id == id){
					ifExists = true;
				}
			});

			if(ifExists==true){
				alert("This Supplier Already Exists.");
			}else{
				if(confirm('Are you sure you want to add this Supplier ?')==true)
				{
					

					var crws = {
						'coustomer_id':$routeParams.id.substring(1)
						,'crws_supplier_id':id
						,'ci':$scope.ci_code
					}

					$http.post(baseurl+'adminservices/addCrws/',{'crws_details':crws}).success(function(response){

						$scope.customerssuppliers.push({
							'crws_id':response
							,'coustomer_id':$routeParams.id.substring(1)
							,'crws_supplier_id':id
							,'supplier_name':$scope.crws_supplier.supplier_name
							,'ci':$scope.ci_code
						});
					});
				}
			}
		}

		$scope.updateSupplier = function(id,content)
		{	

			$http.post(baseurl+'adminservices/updateCrws/'+id+'/'+content).success(function(response){});
		}

	};

	

	app.controller('editCustomer', ctlr);

}());



/*changeAccess*/

(function(){
	
	var app = angular.module('anatoliaInventory');

	
	var ctlr = function($scope,$http) {	    
		
		$http.get(baseurl+'adminservices/getAdminSetting/').success(function(response){$scope.admin = response });
		
		$scope.update = function()
		{
			if($scope.old_password == $scope.admin.admin_password)
			{
				if(($scope.new_password == $scope.new_cpassword ) && $scope.new_password != null)
				{
					var newSetting = {
						'admin_username' : $scope.admin.admin_username
						,'admin_password' : $scope.new_password
 					}

 					$http.post(baseurl+'adminservices/updateSetting/',{'setting':newSetting}).success(function(response){
 						alert('Settting Changed Successfully.');
 					});
				}else{
					alert('Password Do not Match!!');
				}

			}else{
				alert('Wrong Password !!');
			}
		}

	};

	app.controller('changeAccess', ctlr);

}());





