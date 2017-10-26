<div class="ui grid">
	
	<div class="wide column trim">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="add icon "></i> Add : {{product.product_title}}</h3>
				
				
			</div>
			


			<table class="ui definition table compact top attached">
			  <tbody>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Product Title</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="product.product_title"></td>
			    </tr>

			    <tr>
			      <td class="two wide column" style="width: 20%;">Product Code</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="product.product_code"></td>
			    </tr>

			    <tr>
			      <td class="two wide column" style="width: 20%;">Supplier Product Code</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="product.supplier_product_code"></td>
			    </tr>


			    <tr>
			      <td>Product Catagoy</td>
			      <td class="trim">
			      		<select name="" class="table-filter"  ng-model="product.product_category_id"  ng-options="category.product_cat_id as category.product_cat_title for category in categorys">
			      			<option value="">Select a category</option>
			      		</select>
			      </td>
			    </tr>

			    <tr>
			      <td>Product Tax</td>
			      <td class="trim">
			      		<select name="" class="table-filter"  ng-model="product.product_tax_id"  ng-options="tax.tax_id as tax.tax_name for tax in taxs">
			      			<option value="">Select a tax rule</option>
			      		</select>
			      </td>
			    </tr>

			    <tr>
			      <td>Product Unit</td>
			      <td class="trim">
			      		<select name="" class="table-filter"  ng-model="product.product_unit_id"  ng-options="unit.unit_id as unit.unit_name for unit in units">
			      			<option value="">Select a Unit</option>
			      		</select>
			      </td>
			    </tr>
			    
			    
			    <tr>
			      <td>Supplier Price</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="product.product_raw_unit_price"></td>
			    </tr>
			    <tr>
			      <td>Sell price</td>
			      <td class="trim">
			      		<input type="text" class="table-filter" ng-model="getRegularPrice()" style="width: 20%;float: left;" disabled>
			      		<input type="text" class="table-filter" ng-model="product.product_regular_unit_price_rate" style="width: 80%;float: left;" placeholder="In Percent">
			       </td>
			    </tr>
			    <tr>
			      <td>Product Supplier</td>
			      <td class="trim">
			      		<select name="" class="table-filter"  ng-model="product.product_supplier_id"  ng-options="supplier.supplier_id as supplier.supplier_name for supplier in suppliers">
			      			<option value="">Select a Supplier</option>
			      		</select>
			      </td>
			    </tr>
			    <tr>
			      <td>Product Description</td>
			       <td class="trim">
			       		<textarea class="table-filter" id="" cols="30" rows="10" ng-model="product.productDetails"></textarea>
			       </td>
			    </tr>

			    <tr>
			      <td>Minimum Quantity</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="product.product_min_qt" ></td>
			    </tr>
			    
			    <tr>
			      <td>Maximum Quantity</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="product.product_max_qt"></td>
			    </tr>

			    <tr>
			      <td></td>
			      <td>
			      	<a ng-click="addProduct()" class="ui button green fluid">Add New Product</a>
			      </td>
			    </tr>



			  </tbody>
			</table>

		</div>
		
	</div>

	

	
</div>