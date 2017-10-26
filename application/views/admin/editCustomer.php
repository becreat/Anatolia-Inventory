<div class="ui grid" style="zoom: .9;">
	


	<div class="nine wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="large edit icon "></i>Edit :  {{customer.coustomer_name}}</h3>
				
				
			</div>
			

			<table class="ui definition table compact top attached">
			  <tbody>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Customer Name</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_name"></td>
			    </tr>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Customer Code</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_code" disabled></td>
			    </tr>
			    <tr>
			      <td>Company Name</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_company_name"></td>
			    </tr>
			    
			    
			    <tr>
			      <td>Address</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_address"></td>
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
			      <td>Customer Tax ID</td>
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
			      	<a ng-click="updateDetails()" class="ui button blue fluid">Update Details</a>
			      </td>
			    </tr>



			  </tbody>
			</table>
			

		</div>
		
	</div>

	<div class="seven wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">	<i class="large lock icon "></i>Login Details</h3>
			</div>
			
			<table class="ui definition table compact top attached">
			  <tbody>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Username</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_user"></td>
			    </tr>
			    <tr>
			      <td>Password</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="customer.coustomer_pass"></td>
			    </tr>
			    
			    
			    

			    <tr>
			      <td></td>
			      <td>
			      	<a ng-click="updateDetails()" class="ui button blue fluid">Update Login Information</a>
			      </td>
			    </tr>



			  </tbody>
			</table>
			

		</div>

		<div class="vsap"></div>

		<div class="panel panel-default" >
			<div class="panel-heading clearfix"><h3 class="panel-title pull-left">	<i class="large users icon "></i>Manage Supplier</h3></div>
			
			<table class="ui attached table celled segment  striped compact" style="zoom:.9">
						<thead>
							<tr>
								<th>Supplier Code</th>
								<th>Supplier Name</th>
								<th>Customer Code By Supplier</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="trim" width="16%"><input type="text" class="table-filter" placeholder="#Supplier code" ng-model="supplier.supplier_id"></td>
								<td class="trim"><input type="text" class="table-filter" placeholder="Supplier name" ng-model="supplier.supplier_name"></td>
								<td class="trim"></td>
								<td class="trim"></td>
							</tr>
							
							

							<tr ng-repeat="supplier in customerssuppliers | filter:supplier">
								<td># {{supplier.supplier_id}}</td>
								<td>{{supplier.supplier_name}}</td>
								<td class="trim"><input type="text" ng-change="updateSupplier(supplier.crws_id,supplier.ci)" ng-model="supplier.ci" class="table-filter"></td>
								<td>
									<a ng-click="removeSupplier(supplier.crws_id,$index)" class="ui button red mini"><i class="icon remove"></i></a>
								</td>
							</tr>
							
						</tbody>

					</table>

					<table class="ui attached table celled segment  striped compact">
						<tr>
							<td class="trim">
								<select name="" class="table-filter"  ng-model="crws_supplier"  ng-options="supplier.supplier_name for supplier in suppliers">
									<option value="">Select a Supplier</option>
								</select>
							</td>
							<td class="trim"><input class="table-filter" type="text" ng-model="ci_code" placeholder="#Customer Code By Supplier"></td>
							<td><a ng-click="addSupplier(crws_supplier.supplier_id)" class="ui button green mini fluid"><i class="icon add"></i></a></td>
						</tr>
					</table>
			

		</div>
		
	</div>

	
	
</div>