<div class="ui grid" style="zoom:.8">
		
		<div class="trim wide column">
			<div class="ui attached message ">
				<div class="header">
					<h3 class="trim">Unites Manager</h3>
				</div>
				<p></p>
			</div>


			<table class="ui attached table celled segment striped compact">
				<thead>
					<tr>
						<th width="10%">ID</th>
						<th>Unite Name</th>
						<th></th>
					</tr>
					
					
				</thead>

				<tbody>
					<tr>
						<td class="trim"><input type="text" class="table-filter" placeholder="#id" ng-model="unitf.unit_id"></td>
						<td class="trim"><input type="text" class="table-filter" placeholder="#unit name" ng-model="unitf.unit_name"></td>
						<td></td>
										
					</tr>
					<tr ng-repeat="unit in units | filter:unitf ">
						<td>{{unit.unit_id}}</td>
						<td class="trim"><input ng-change="update(unit.unit_id,$index)" type="text" class="table-filter" ng-model="unit.unit_name"></td>
						<td class="trim"><a ng-click="delete(unit.unit_id,$index)" class="ui small red labeled  button"><i class="icon remove"></i></a></td>
					
					</tr>
				</tbody>
			
			</table>
			

			<div class="ui bottom attached  message">
				<a class="ui small primary labeled icon button" ng-click="addNew()"> <i class="plus icon"></i>Add New Unit</a>
			</div>
		</div>


		
	</div>