<div class="ui grid" ng-show="selecter">
	<div class="four wide column centered">
		<div class="ui form">
		<center><label for="">Select supplier</label></center>
		  <div class="field">
		    <select ng-model="selected_supplier" ng-change="selectSupplier()" style="zoom:1.4">
		      <option value="">Select a supplier</option>
		      <option value="{{supplier.supplier_id}}" ng-repeat="supplier in suppliers">{{supplier.supplier_name}}</option>
		    </select>
		  </div>
		</div>
	</div>
	
</div>


<div class="info ui message" ng-show="supplier">Order Saved to Draft</div>


<div class="ui grid" ng-show="supplier">
	<div class="sixteen wide column trim">
		<div class="ui four column top aligned relaxed fitted stackable grid" style="">
			<div class="column">
				<h3 class="ui black block header top attached">{{coustomer.coustomer_name}} #{{coustomer.coustomer_id}}</h3>
				<table class="ui segment definition table compact attached">
					<tbody>
						<tr>
							<td class="two wide column">Customer Code</td>
							<td>{{coustomer.coustomer_id}}</td>
						</tr>
						<tr>
							<td>CA By Supplie</td>
							<td>{{supplier.ci}}</td>
						</tr>
						<tr>
							<td>Order Number</td>
							<td># <strong>{{order_id}}</strong></td>
						</tr>
						<tr>
							<td>Order Date</td>
							<td class="trim"><input datepicker ng-model="order_date" type="text" class="table-filter" ng-init="order_date='<?=date('Y-m-d'); ?>'" ></td>
						</tr>
						<tr>
							<td>Delivery Required</td>
							<td class="trim"><input  placeholder="Input Delivery Required Date"  datepicker ng-model="order_required_delivery_date" type="text" class="table-filter"></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="column">
				<h3 class="ui black block header top attached">{{supplier.supplier_name}} #{{supplier.supplier_id}}</h3>
				<table class="ui segment definition table compact attached">
					<tbody>
						<tr>
							<td class="two wide column">Supplier Code</td>
							<td>{{supplier.supplier_id}}</td>
						</tr>
						<tr>
							<td>Supplier PO</td>
							<td></td>
						</tr>
						<tr>
							<td>ETA </td>
							<td></td>
						</tr>
						
						<tr>
							<td>Notes</td>
							<td class="trim">
								<p>{{supplier.supplier_special_note}}</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>


			<div class="column">
				<table class="ui segment definition table compact attached">
					<tbody>
						<tr>
							<td class="two wide column">Line Total</td>
							<td>{{cart.length}}</td>
						</tr>
						<tr>
							<td>Quantity Ordered</td>
							<td>{{totalQuantityOrderd()}}</td>
						</tr>
						<tr>
							<td>Total Cost</td>
							<td>{{totalCost()  |currency }}</td>
						</tr>
						
					</tbody>
				</table>
			</div>

			<div class="column">
				<div class="ui segment form">
					<h3>Order Note : </h3>
					<textarea ng-model="order_notes" placeholder="you spacial comment about this order"></textarea>
					<div class="vsap"></div>
					<div class="ui buttons" style="zoom:.8">
					  <a ng-click="saveOrder('draft')" class="ui button orange">Save Draft</a>
					  <div class="or"></div>
					  <a ng-click="submitOrder()" class="ui positive button">Submit Order</a>
					</div>
				</div>
			</div>
		</div>

		<div class="ui grid trim" >
			<div class="wide column">
				<table class="ui table celled segment striped compact">
					
					<tr>
						<td class="trim">
							<!-- <select name="" class="table-filter"  ng-change="selectProducts()"  ng-model="cat_id">
								<option value="{{category.product_cat_id}}" ng-repeat="category in categorys" >{{category.product_cat_title}}</option>
							</select> -->
							<select name="" class="table-filter"  ng-change="selectProducts()"  ng-model="selected_category" ng-options="category.product_cat_title for category in categorys">
								<option value="">Select Category</option>
							</select>
						</td>
						<td class="trim">
							<input type="text" class="table-filter" ng-model="fproduct" placeholder="search product">
						</td>
						<td class="trim">
							<select name="" class="table-filter" ng-model="opt_selected_product" ng-change="selecteProduct()" ng-options="product.product_title for product in products | filter:fproduct">
								<option value="">Select Product</option>
							</select>
						</td>
						<td class="trim" width="10%">
							<input type="number" class="table-filter" ng-model="unit_quantity"  ng-min="unit_quantity" style="zoom: 1.3" min="1">
						</td>
						<td class="trim"><strong>{{selected_product.unit_name}}</strong></td>
						<td class="trim" width="10%"><center><strong>{{ (selected_product.product_regular_unit_price * unit_quantity) | currency}}</strong></center></td>
						<td class="trim">
							<center><a href="" class="ui button blue" style="display: block;width: 100%;" ng-click="addToCart()">ADD</a></center>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="ui grid trim" ng-show="cart">
			<div class="wide column">
				<table class="ui attached table celled segment striped compact" style="zoom:.75">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="30%">Product</th>
							<th width="6%">Quantity</th>
							<th width="4%"></th>
							<th width="10%">Quantity Received</th>
							<th width="10%">Unit Price</th>
							<th width="10%">Unit Total Price</th>
							<th width="10%">GST</th>
							<th width="10%">Action</th>
						</tr>
						
						
					</thead>
				
				</table>

				<div class="nobar" style="height:200px">
					<table class="ui attached table celled segment striped compact" style="zoom:.75">
						<tbody>
								
								<tr ng-repeat="item in cart">
									<td width="10%"># {{$index+1}}</td>
									<td width="30%">{{item.product_title}}</td>
									<td width="6%" class="trim"><input type="number" ng-model="item.item_quantity" value="{{item.item_quantity}}" class="table-filter" min="1" ng-change="updateQuantity(item.id,item.item_quantity)"></td>
									<td width="4%">{{item.unit_name}}</td>
									<td width="10%">Panding</td>
									<td width="10%">{{item.product_regular_unit_price | currency}}</td>
									<td width="10%">{{item.product_regular_unit_price*item.item_quantity | currency}}</td>
									<td width="10%">{{item.tax_calc}}%</td>
									<td width="10%" class="trim">
										<center><a href="" class="ui button red" style="display: block;width: 100%;" ng-click="removeFrmCart($index)"><i class="icon remove "></i></a></center>
								
									</td>
									
								</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>



