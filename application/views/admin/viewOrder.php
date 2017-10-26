<div class="blackpaper popup-toggle"></div>
<div class="popup popup-toggle">
	<div class="panel panel-default">
		<div class="panel-heading clearfix"><h3 class="panel-title pull-left">	<i class="large cart icon "></i>Update Order Information</h3></div>
		

		<table class="ui definition table compact top attached">
		  <tbody>

		    <tr>
		      <td class="two wide column" style="width: 20%;">Supplier Ref Number</td>
		      <td class="trim"><input type="text" class="table-filter" ng-model="order.order_details.order_po"></td>
		    </tr>

		    <tr>
		      <td class="two wide column" style="width: 20%;">ETA </td>
		      <td class="trim"><input type="text" class="table-filter" ng-model="order.order_details.order_eta"></td>
		    </tr>

		    <tr>
		      <td class="two wide column" style="width: 20%;">Tracking Number </td>
		      <td class="trim"><input type="text" class="table-filter" ng-model="order.order_details.order_tracking"></td>
		    </tr>

		    <tr>
		      <td class="two wide column" style="width: 20%;">Notes</td>
		      <td class="trim">
		      	<textarea type="text" class="table-filter" ng-model="order.order_details.order_notes" style="height:100px">
		      	</textarea>
		      </td>
		    </tr>

		  

		    <tr>
		      <td></td>
		      <td>
		      	<a ng-click="submitOrderInfo()" class="ui button green">Submit Order Information</a>
		      	<a ng-click="submitOrderInfo()" class="ui button red">Cancle</a>
		      </td>
		    </tr>



		  </tbody>
		</table>
		

	</div>
</div>

<div class="ui grid top aligned">
	<div class="column six wide ">
		<div class="ui segment" style="zoom:.9">
		  <h2 class="ui header">
		    {{order.order_details.coustomer_name}} Order #{{order.order_details.order_id}}
		  </h2>
		  <table class="ui definition table compact">
		    <tbody>
		      <tr>
		        <td class="two wide column">Customer Code</td>
		        <td>{{order.order_details.coustomer_id}}</td>
		      </tr>
		      <tr>
		        <td>CA By Supplie</td>
		        <td></td>
		      </tr>
		      <tr>
		        <td>Order Number</td>
		        <td>{{order.order_details.order_id}}</td>
		      </tr>
		      <tr>
		        <td>Order Date</td>
		        <td>{{order.order_details.order_date | date:'fullDate'}}</td>
		      </tr>
		      <tr>
		        <td>Delivery Required</td>
		        <td>{{order.order_details.order_required_delivery_date | date:'fullDate'}}</td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	</div>

	<div class="column six wide ">
		<div class="ui segment">
		  <h2 class="ui header">
		    {{order.order_details.supplier_name}} # {{order.order_details.supplier_id}}
		  </h2>
		  <table class="ui definition table compact">
		    <tbody>
		      <tr>
		        <td>Supplier Code</td>
		        <td>{{order.order_details.supplier_id}}</td>
		      </tr>
		      <tr>
		        <td>Supplier Ref Number</td>
		        <td>{{order.order_details.order_po}}</td>
		      </tr>
		      <tr>
		        <td>ETA </td>
		        <td>{{order.order_details.order_eta}}</td>
		      </tr>
		      <tr>
		        <td>Tracking</td>
		        <td>{{order.order_details.order_tracking}}</td>
		        
		      </tr>
		      <tr>
		        <td>Supplier Notes</td>
		        <td>{{order.order_details.supplier_special_note}}</td>
		        
		      </tr>
		    </tbody>
		  </table>
		</div>
	</div>

	
	

	 <div class="four wide column">
	 <div class="vsap" style="height:70px"></div>
	   <div class=" ui labeled huge button fluid {{order.order_details.order_status}}">{{order.order_details.order_status | uppercase}}</div>
	 </div>
	
</div>




<div class="ui grid">
	<div class="wide column">
		<table class="ui attached table celled segment striped compact scroll" style="zoom:.9">
			<thead>
				<tr>
					<th width="10%">No</th>
					<th width="20%">Product Name</th>
					<th width="10%">Ordered Quantity</th>
					<th width="10%">Unit Price</th>
					<th width="10%">GST</th>
				</tr>	
				<tr>
					
					<td class="trim"></td>
					<td class="trim"></td>
					<td class="trim"></td>
					<td class="trim"></td>
					<td class="trim"></td>

				</tr>
				
			</thead>
		
		</table>

		<div class="scroll nobar" style="height:150px">
			<table class="ui attached table celled segment striped compact" style="zoom:.75">
				<tbody>
					<tr ng-repeat="item in order.order_items | filter:itemf ">
						<td width="10%"># {{$index+1}}</td>
						<td width="20%">{{item.product_title}} - # {{item.item_id}}</td>
						<td width="10%">{{item.item_quantity}} {{item.unit_name}}</td>
						<td width="10%">{{item.product_regular_unit_price | currency}}</td>
						<td width="10%">{{item.tax_calc}}%</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		


	</div>
</div>


<div class="ui grid top aligned">
	<div class="eight wide column">
		
		<h3 class="ui top attached header blue block">Order Note :</h3>
		<div class="ui segment attached">
			<p>{{order.order_details.order_notes}}</p>
			<p class="pull-right">
				<a href="<?=base_url() ?>common/exportOrder/{{order.order_details.order_id}}" class="ui button blue  tiny icon"><i class="icon external share"></i> Export</a>

			</p>
			<div class="clear ui divider"></div>
			
			<div class="ui buttons" ng-if="order.order_details.order_status != 'accepted' ">
			  <div class="ui button yellow" ng-click="updateOrder('processed')">Processed</div>
			  <div class="or" data-text="or"></div>
			  <div class="ui button purple" ng-click="updateOrder('delay')">Delay</div>
			  <div class="or" data-text="or"></div>
			  <div class="ui button red" ng-click="updateOrder('cancelled')">Cancel</div>
			  <div class="or" data-text="or"></div>
			  <div class="ui button orange" ng-click="updateOrder('ondelivery')">Delivery</div>
			</div>
			
		</div>
		
	</div>	
	<div class="eight wide column">
		<table class="ui definition table compact">
		  <tbody>
		    <tr>
		      <td style="width:40%">Total Item</td>
		      <td>{{totalItem()}}</td>
		    </tr>
		    <tr>
		      <td>Total Quantity Ordered</td>
		      <td>{{totalQuantityOrderd()}}</td>
		    </tr>
		    <tr>
		      <td>Total Quantity Received</td>
		      <td>{{totalQuantityRecived()}}</td>
		    </tr>
		    
		    <tr>
		      <td>Total Cost</td>
		      <td>{{totalCost() | currency }}</td>
		    </tr>
		  </tbody>
		</table>

	</div>	
</div>