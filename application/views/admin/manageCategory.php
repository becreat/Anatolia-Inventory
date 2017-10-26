<div class="ui grid" style="zoom:.8">
		
		<div class="trim wide column">
			<div class="ui attached message ">
				<div class="header">
					<h3 class="trim">Category Manager</h3>
				</div>
				<p></p>
			</div>


			<table class="ui attached table celled segment striped compact">
				<thead>
					<tr>
						<th width="10%">ID</th>
						<th>Category Title</th>
						<th></th>
					</tr>
					
					
				</thead>

				<tbody>
					<tr>
						<td class="trim"><input type="text" class="table-filter" placeholder="#id" ng-model="categoryf.product_cat_id"></td>
						<td class="trim"><input type="text" class="table-filter" placeholder="#title" ng-model="categoryf.product_cat_title"></td>
						<td></td>
						
										
					</tr>
					<tr ng-repeat="category in categorys | filter:categoryf ">
						<td>{{category.product_cat_id}}</td>
						<td class="trim"><input ng-change="update(category.product_cat_id,$index)" type="text" class="table-filter" ng-model="category.product_cat_title"></td>
						<td class="trim"><a ng-click="delete(category.product_cat_id,$index)" class="ui small red labeled  button"><i class="icon remove"></i></a></td>
					</tr>
				</tbody>
			
			</table>
			

			<div class="ui bottom attached  message">
				<a class="ui small primary labeled icon button" ng-click="addNew()"> <i class="plus icon"></i>Add New Category</a>
			</div>
		</div>


		
	</div>