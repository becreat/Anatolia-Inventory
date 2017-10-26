<div class="ui grid">
	<div class="wide column trim">
		
		<div class="ui attached message icon">
		  <i class="file text outline icon"></i>
		  <div class="content">
		  	<div class="header">
		  	 All Orders
		  	</div>
		  	<p>All Submited Order</p>
		  </div>
		</div>
		<table class="ui attached table celled segment striped compact scroll">
			<thead>
				<tr>
					<th width="10%">Order No</th>
					<th width="20%">Coustomer</th>
					<th width="20%">Supplier</th>
					<th width="20%">Order Date</th>
					<th width="10%">Total Price</th>
					<th width="10%">Status</th>
					<th width="10%">Action</th>
				</tr>
				<tr>
					<td class="trim"><input type="text" class="table-filter" placeholder="#order code" ng-model="orderf.order_id"></td>
					<td class="trim">
						<input style="width: 60%;float:left;background-image:none;border-right:1px solid #ccc"type="text" class="table-filter" placeholder="#coustomer name" ng-model="orderf.coustomer_name">
						<input style="width: 40%;float:left"type="text" class="table-filter" placeholder="#code" ng-model="orderf.coustomer_id">
					</td>
					<td class="trim">
						<input style="width: 60%;float:left;background-image:none;border-right:1px solid #ccc"type="text" class="table-filter" placeholder="#supplier name" ng-model="orderf.supplier_name">
						<input style="width: 40%;float:left"type="text" class="table-filter" placeholder="#code" ng-model="orderf.supplier_id">
					</td>
					<td class="trim"><input type="text" datepicker class="datepicker table-filter" ng-model="orderf.order_date"></td>
					<td class="trim"><input type="text"  class="table-filter" ng-model="orderf.order_total_price"></td>
				
					<td class="trim">
						<select class="table-filter" ng-model="orderf.order_status">
							<option value="">All</option>
							<option value="submitted">Submitted</option>
							<option value="processed">Processed</option>
							<option value="delay">Delay</option>
							<option value="cancelled">Cancelled</option>
							<option value="ondelivery">On Delivery</option>
							<option value="accepted">Accepted</option>
						</select>
					</td>
					<td></td>
					

				</tr>
				
			</thead>
		
		</table>

		<div class="scroll nobar">
			<table class="ui attached table celled segment striped compact" style="zoom:.75">
				<tbody>
					
						<tr ng-repeat="order in orders | filter:orderf | limitTo: 100" class="{{order.order_status}}">
							<td width="10%">{{order.order_id}}</td>
							<td width="20%">{{order.coustomer_name}} - # {{order.coustomer_id}}</td>
							<td width="20%">{{order.supplier_name}} - # {{order.supplier_id}}</td>
							<td width="20%">{{order.order_date | date:'fullDate'}}</td>
							<td width="10%">{{order.order_total_price | currency}}</td>
							<td width="10%"><strong>{{order.order_status | uppercase}}</strong></td>
							<td width="10%">
								<a href="#/viewOrder:{{order.order_id}}" class="ui button blue tiny">View</a>
							</td>
						</tr>
					
				</tbody>
			</table>
		</div>

	</div>
</div>