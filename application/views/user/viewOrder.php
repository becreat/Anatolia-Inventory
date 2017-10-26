<div class="ui grid top aligned relaxed">
	<div class="column seven wide">
		<div class="ui segment" style="zoom:.9">
		  <h2 class="ui header">
		    <?=$this->session->userdata('coustomer_name') ?> Order #{{order.order_details.order_id}}
		  </h2>
		  <table class="ui definition table compact">
		    <tbody>
		      <tr>
		        <td class="two wide column">Customer Code</td>
		        <td><?=$this->session->userdata('coustomer_id') ?></td>
		      </tr>
		      <tr>
		        <td>CA By Supplie</td>
		        <td># {{crws_code}}</td>
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
	

	<div class="column six wide">
		<div class="ui segment" style="zoom:.9">
		  <h2 class="ui header">
		    {{order.order_details.supplier_name}} # {{order.order_details.supplier_id}}
		  </h2>
		  <table class="ui definition table compact">
		    <tbody>
		      <tr>
		        <td class="two wide column">Supplier Code</td>
		        <td>{{order.order_details.supplier_id}}</td>
		      </tr>
		      <tr>
		        <td>Supplier Order Ref Number</td>
		        <td>{{order.order_details.supplier_id}}</td>
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
		        <td>Notes</td>
		        <td>{{order.order_details.supplier_special_note}}</td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	</div>


	 <div class="three wide column trim">
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
					<th width="25%">Quantity Received</th>
					<th width="5%"></th>
					<th width="10%">Unit Price</th>
					<th width="10%">GST</th>
				</tr>	
				<tr>
					
					<td class="trim"></td>
					<td class="trim"></td>
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
						<td width="25%" class="trim">
							<div ng-if="order.order_details.order_status == 'ondelivery' ">
								<span ng-if="item.item_recived_quantity==null" ng-init="item.item_recived_quantity=item.item_quantity" ></span>
								<input type="text" name="" id="" class="table-filter"  ng-model="item.item_recived_quantity">
							</div>
							<p ng-if="order.order_details.order_status != 'ondelivery' ">
								{{panding}}
							</p>
							<span ng-if="order.order_details.order_status == 'accepted' ">
								{{item.item_recived_quantity}}
							</span>
						</td>

						<td width="5%">{{item.unit_name}}</td>
						<td width="10%">{{item.product_regular_unit_price | currency}}</td>
						<td width="10%">{{item.tax_calc}}%</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		


	</div>
</div>

<div class="vsap"></div>
<div class="ui divider"></div>

<div class="ui grid top aligned">
	<div class="six wide column">
		
		<h3 class="ui top attached header blue block">Order Note :</h3>
		<div class="ui segment attached">
			<p>{{order.order_details.order_notes}}</p>
			<p class="pull-right">
				
				<a ng-if="order.order_details.order_status == 'draft' " href="#/newOrder:{{order.order_details.order_id}}" class="labeled  mini ui button green icon" ><i class="icon arrow right"></i> Continue Order</a>
				<a ng-if="order.order_details.order_status == 'draft' " class="labeled  ui button red icon mini" ng-click="deleteOrder()"><i class="icon remove"></i> Delete</a>
				<a href="<?=base_url() ?>common/exportOrder/{{order.order_details.order_id}}" class="ui button blue  mini icon"><i class="icon external share"></i> Export</a>
				<a ng-if="order.order_details.order_status == 'ondelivery' " ng-click="acceptOrder()" class="labeled  ui button green icon"><i class="icon checkmark"></i> Accept Order</a>
				
			</p>
		</div>
		
	</div>	
	<div class="ten wide column">
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
		      <td>Total Cost With Tax</td>
		      <td>{{totalCost() | currency }}</td>
		    </tr>
		  </tbody>
		</table>

	</div>	
</div>