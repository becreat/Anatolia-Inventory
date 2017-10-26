<div class="ui grid">
	<div class="trim wide column">

		<table class="ui attached table celled segment striped compact scroll" style="zoom:.75">
			<thead>
				<tr>
					<th colspan="7">
						<h2 class="trim">Select Product's for <span class="text-blue">{{coustomer.coustomer_name}}</span></h2>
					</th>
				</tr>
				<tr>
					<th width="10%">Product Code</th>
					<th width="10%">Product Name</th>
					<th width="20%">Supplier</th>
					<th width="10%">Catagory</th>
					<th width="10%">Supplier Price</th>
					<th width="10%">Default Sell Price</th>
					<th width="3%">Action</th>
				</tr>
				<tr>
					<td class="trim"><input type="text" class="table-filter" placeholder="#Product Code" ng-model="productf.product_code"></td>
					<td class="trim"><input type="text" class="table-filter" placeholder="#Product Name" ng-model="productf.product_title"></td>
					<td class="trim">
						<select class="table-filter" ng-model="productf.product_supplier_id">
						   	<option value="">All Suppliers</option>
						    <option ng-repeat="supplier in suppliers" value="{{supplier.supplier_id}}">{{supplier.supplier_name}}</option>
						</select>
					</td>
					<td class="trim">
						<select class="table-filter" ng-model="productf.product_cat_title">
						   	<option value="">All Category</option>
						    <option ng-repeat="category in categorys" value="{{category.product_cat_title}}">{{category.product_cat_title}}</option>
						</select>
					</td>
					<td></td>
					<td></td>
					<td></td>
					

				</tr>
				
			</thead>
		
		</table>
		<div class="scroll nobar" style="max-height: 250px;">
			<table class="ui attached table celled segment striped compact" style="zoom:.75">
				<tbody>
					
						<tr ng-repeat="product in products | limitTo: 100 | filter:productf">
							<td width="10%">#{{product.product_code}}</td>
							<td width="10%">{{product.product_title}}</td>
							<td width="20%">{{product.supplier_name}}</td>
							<td width="10%">{{product.product_cat_title}}</td>
							<td width="10%">$ {{product.product_raw_unit_price}}</td>
							<td width="10%">$ {{product.product_regular_unit_price}}</td>
							<td width="3%" class="trim">
								<a ng-click="add(product.product_id,$index)" class="ui button blue mini fluid"><i class="icon add"></i></a>
							</td>
						</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>
<div class="vsap" style="height: 40px;"></div>
<div class="ui grid">
	<div class="trim wide column">
		<table class="ui attached table celled segment striped compact scroll" style="zoom:.75">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Supplier Price</th>
					<th>Default Sell Price</th>
					<th>Default Sell Rate</th>
					<th>Individual Default Sell Price</th>
					<th>Individual Sell Rate</th>
					<th>Individual Min Qyt</th>
					<th>Individual Max Qyt</th>
					<th width="18%">Action</th>
				</tr>
				<tr>
					<td class="trim"><input type="text" class="table-filter" placeholder="#Product Name" ng-model="selectedProductsf.product_title"></td>
					
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr ng-repeat="product in selectedProducts | limitTo: 100 | filter:selectedProductsf">
					

					<td>{{product.product_title}}</td>
					<td>$ {{product.product_raw_unit_price}}</td>
					<td>$ {{product.product_default_unit_price}}</td>
					<td>{{product.product_default_unit_price_rate}}</td>
					<td>${{ product.c_product_unit_price = ((product.c_product_unit_price_rate*product.product_raw_unit_price)/100) + (product.product_raw_unit_price*1)}}</td>

					<td class="trim"><input type="text" class="table-filter" ng-model="product.c_product_unit_price_rate"></td>
					<td class="trim"><input type="text" class="table-filter" ng-model="product.product_min_qt"></td>
					<td class="trim"><input type="text" class="table-filter" ng-model="product.product_max_qt"></td>

					<td class="trim">
						<a ng-click="update(product.c_product_id,$index)" class="ui button blue mini "><i class="icon save"></i>Update</a>
						<a ng-click="reset(product.c_product_id,$index)" class="ui button orange mini "><i class="icon refresh"></i>reset</a>
						<a ng-click="delete(product.c_product_id,$index)" class="ui button red mini "><i class="icon remove"></i></a>
					</td>
				</tr>
				
			</thead>
		
		</table>
		
	</div>
</div>

