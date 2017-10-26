<div class="ui grid" >
	<div class="wide column">
		
		<div class="ui attached message icon">
		  <i class="users icon"></i>
		  <div class="content">
		  	<div class="header">
		  	 All Supllier
		  	</div>
		  	<p>All Avabile Supllier For You</p>
		  </div>
		</div>

		<table class="ui attached table celled segment  striped compact" style="zoom:.9">
			<thead>
				<tr>
					<th>Supplier Code</th>
					<th>Supplier Name</th>
					<th>Website</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="trim"><input type="text" class="table-filter" placeholder="#Supplier code" ng-model="supplier.supplier_id"></td>
					<td class="trim"><input type="text" class="table-filter" placeholder="Supplier name" ng-model="supplier.supplier_name"></td>
					<td class="trim"></td>
					<td class="trim"><input type="text" class="table-filter" placeholder="phone" ng-model="supplier.supplier_phone"></td>
					<td class="trim"></td>
				</tr>
				
				

				<tr ng-repeat="supplier in suppliers | filter:supplier">
					<td># {{supplier.supplier_id}}</td>
					<td>{{supplier.supplier_name}}</td>
					<td>{{supplier.supplier_web}}</td>
					<td>{{supplier.supplier_phone}}</td>
					<td>
						<a href="#/viewSupplier:{{supplier.supplier_id}}" class="ui button blue tiny">Details</a>
						<a href="#/viewProductsBySupplier:{{supplier.supplier_id}}" class="ui button green tiny">Products</a>
					</td>
				</tr>
				

			



			</tbody>

		</table>
	</div>
</div>