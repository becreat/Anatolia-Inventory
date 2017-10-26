<div class="ui grid" style="zoom:.8">
		
		<div class="trim wide column">
			<div class="ui attached message ">
				<div class="header">
					<h3 class="trim">Tax Manager</h3>
				</div>
				<p></p>
			</div>


			<table class="ui attached table celled segment striped compact">
				<thead>
					<tr>
						<th width="10%">ID</th>
						<th>Tax Rule Name</th>
						<th>Tax Rercentage (%)</th>
						<th></th>
					</tr>
					
					
				</thead>

				<tbody>
					<tr>
						<td class="trim"><input type="text" class="table-filter" placeholder="#id" ng-model="taxf.tax_id"></td>
						<td class="trim"><input type="text" class="table-filter" placeholder="#title" ng-model="taxf.tax_name"></td>
						<td class="trim"></td>
						<th></th>
										
					</tr>
					<tr ng-repeat="tax in taxs | filter:taxf ">
						<td>{{tax.tax_id}}</td>
						<td class="trim"><input ng-change="update(tax.tax_id,$index)" type="text" class="table-filter" ng-model="tax.tax_name"></td>
						<td class="trim"><input ng-change="update(tax.tax_id,$index)" type="text" class="table-filter" ng-model="tax.tax_calc"></td>
						<td class="trim"><a ng-click="delete(tax.tax_id,$index)" class="ui small red labeled  button"><i class="icon remove"></i></a></td>
					</tr>
				</tbody>
			
			</table>
			

			<div class="ui bottom attached  message">
				<a class="ui small primary labeled icon button" ng-click="addNew()"> <i class="plus icon"></i>Add New Category</a>
			</div>
		</div>


		
	</div>