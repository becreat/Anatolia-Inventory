<div class="ui grid" >
	<div class="wide column trim">
		
		<div class="ui attached message icon">
		  <i class="users icon"></i>
		  <div class="content">
		  	<div class="header">
		  	 All Customers
		  	</div>
		  </div>
		</div>

		<table class="ui attached table celled segment  striped compact" style="zoom:.8">
			<thead>
				<tr>
					<th width="10%">Customers Code</th>
					<th width="10%">Customers Name</th>
					<th>Website</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="trim"><input type="text" class="table-filter" placeholder="#customer code" ng-model="customer.coustomer_id"></td>
					<td class="trim"><input type="text" class="table-filter" placeholder="customer name" ng-model="customer.coustomer_name"></td>
					<td class="trim"></td>
					<td class="trim"><input type="text" class="table-filter" placeholder="phone" ng-model="customer.coustomer_phone"></td>
					<td class="trim"></td>
				</tr>
				
				

				<tr ng-repeat="customer in customers | filter:customer">
					<td># {{customer.coustomer_id}}</td>
					<td>{{customer.coustomer_name}}</td>
					<td>{{customer.coustomer_web}}</td>
					<td>{{customer.coustomer_phone}}</td>
					<td>
						
							<a href="#/editCustomer:{{customer.coustomer_id}}" class="ui button blue mini">View / Edit</a>
							<a href="#/productManager:{{customer.coustomer_id}}" class="ui button yellow mini">Product List</a>
							<a ng-click="sendAccess(customer.coustomer_id)" class="ui button orange mini " >Send Software Access</a>
							<a ng-click="toggleAccess(customer.coustomer_id,1,$index)" class="ui button green mini" ng-if="customer.coustomer_active==0 ">EnableSoftware Access</a>
							<a ng-click="toggleAccess(customer.coustomer_id,0,$index)" class="ui button red	mini" ng-if="customer.coustomer_active==1 ">Disable Software Access</a>
						
					</td>
				</tr>
				

			



			</tbody>

		</table>
	</div>
</div>