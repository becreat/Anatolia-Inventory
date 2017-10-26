<div class="ui grid" style="zoom: .9;">
	


	<div class="trim wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="large add square icon "></i>Add New Coustomer</h3>
				
				
			</div>
			

			<table class="ui definition table compact top attached">
			  <tbody>

			    <tr>
			      <td class="two wide column" style="width: 20%;">Customer Name</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_name"></td>
			    </tr>

			    <tr>
			      <td class="two wide column" style="width: 20%;">Customer Code</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_code"></td>
			    </tr>

			    <tr>
			      <td class="two wide column" style="width: 20%;">Username</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_user"></td>
			    </tr>
			    <tr>
			      <td>Password</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_pass"></td>
			    </tr>
			    

			    <tr>
			      <td>Company Name</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_company_name"></td>
			    </tr>
			    
			    
			  

			    <tr>
			      <td>Address Line 1</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="address1"></td>
			    </tr>
			    <tr>
			      <td>Address Line 2</td>
			      <td class="trim">
			      		<input type="text" class="table-filter" ng-model="address2">
			      		<input type="hidden" ng-model="customer.coustomer_address = address1 + ' ' + address2">

			       </td>
			    </tr>

			    <tr>
			      <td>Delivery Address Line 1</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="delivery_address1"></td>
			    </tr>
			    <tr>
			      <td>Delivery Address Line 2</td>
			      <td class="trim">
			      		<input type="text" class="table-filter" ng-model="delivery_address2">
			      		<input type="hidden" ng-model="customer.coustomer_delivery_address = delivery_address1 + ' ' + delivery_address2">

			       </td>
			    </tr>

			    <tr>
			      <td>Sales Account Number</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.customer_sales_account"></td>
			    </tr>


			    <tr>
			      <td>Phone</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_phone"></td>
			    </tr>
			    <tr>
			      <td>Email</td>
			       <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_email"></td>
			    </tr>
			    <tr>
			      <td>Web</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_web"></td>
			    </tr>
			    <tr>
			      <td>GST/VAT Number</td>
			       <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_tax_id"></td>
			    </tr>
			    <tr>
			      <td>About Company</td>
			       <td class="trim">
			       		<textarea class="table-filter" id="" cols="30" rows="4" ng-model="customer.coustomer_company_details"></textarea>
			       </td>
			    </tr>
			     <tr>
			      <td>Special Notes</td>
			       <td class="trim">
			       		<textarea class="table-filter" id="" cols="30" rows="4" ng-model="customer.coustomer_special_note"></textarea>
			       </td>
			    </tr>

			    <tr>
			      <td></td>
			      <td>
			      	<a ng-click="addCustomer()" class="ui button green fluid">Add New Customer</a>
			      </td>
			    </tr>



			  </tbody>
			</table>
			

		</div>
		
	</div>

	

	
	
</div>