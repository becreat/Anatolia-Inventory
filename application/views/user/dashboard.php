<div class="ui grid" style="zoom:.76">
		
		<div class="eight wide column">
			<div class="ui attached message warning ">
				<div class="header">
					<h3 class="trim">Pending Orders</h3>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
			</div>


			<table class="ui attached table celled segment striped compact">
				<thead>
					<tr>
						<th>Order No</th>
						<th>Supplier</th>
						<th>Order Date</th>
						<th>Delivery Date</th>
						<th>Total Price</th>
						<th></th>
					</tr>
					
					
				</thead>

				<tbody>
					<tr>
						<td class="trim" width="10%"><input type="text" class="table-filter" placeholder="#order No" ng-model="porderf.order_id"></td>
						<td class="trim" width="20%"><input type="text" class="table-filter" ng-model="porderf.order_supplier_id"></td>
						<td class="trim"></td>
						<td class="trim"></td>
						<td></td>
						<td></td>						
					</tr>
					<tr ng-repeat="porder in porders | filter:porderf ">
						<td>{{porder.order_id}}</td>
						<td>{{porder.supplier_name}}- #{{porder.order_supplier_id}}</td>
						<td>{{porder.order_date | date:'fullDate'}}</td>
						<td>{{porder.order_required_delivery_date | date:'fullDate'}}</td>
						<td>{{porder.order_total_price | currency}}</td>
						<td><a href="<?=base_url('') ?>#/viewOrder:{{porder.order_id}}" class="ui button blue tiny">View</a></td>
					</tr>
				</tbody>
			
			</table>
			

			<div class="ui bottom attached  message">
				<a class="ui small primary labeled icon button" href="<?=base_url('') ?>#/newOrder"> <i class="plus icon"></i>New Order</a>
			</div>
		</div>


		<div class="eight wide column">
			<div class="ui attached message positive ">
				<div class="header">
					<h3 class="trim"> Recently Processed Order</h3>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
			</div>

			<table class="ui attached fluid celled segment table striped compact">
				<thead>
					<tr>
						<th>Order No</th>
						<th>Supplier</th>
						<th>Order Date</th>
						<th>Delivery Date</th>
						<th>Total Price</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="trim" width="10%"><input type="text" class="table-filter" placeholder="#order No" ng-model="psorderf.order_id"></td>
						<td class="trim" width="20%"><input type="text" class="table-filter" ng-model="psorderf.order_supplier_id"></td>
						<td class="trim"></td>
						<td class="trim"></td>
						<td></td>
						<td></td>						
					</tr>
					<tr ng-repeat="order in psorders | filter:psorderf ">
						<td>{{order.order_id}}</td>
						<td>{{order.supplier_name}}- #{{order.order_supplier_id}}</td>
						<td>{{order.order_date | date:'fullDate'}}</td>
						<td>{{order.order_required_delivery_date | date:'fullDate'}}</td>
						<td>{{order.order_total_price | currency}}</td>
						<td><a href="<?=base_url('') ?>#/viewOrder:{{order.order_id}}" class="ui button blue tiny">View</a></td>
					</tr>
				</tbody>

			</table>

			<div class="ui bottom attached  message">
				<a class="ui small primary labeled icon button" href="<?=base_url('') ?>#/newOrder"> <i class="plus icon"></i>New Order</a>
			</div>

		</div>
	</div>