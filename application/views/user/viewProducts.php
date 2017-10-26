<div class="ui grid">
	<div class="wide column">
		
		<div class="ui attached message icon">
		  <i class="cubes icon"></i>
		  <div class="content">
		  	<div class="header">
		  	 All Products
		  	</div>
		  	<p>All Avabile Products For You</p>
		  </div>
		</div>

		<table class="ui attached table celled segment striped compact scroll" style="zoom:.75">
			<thead>
				<tr>
					<th width="10%">Product Code</th>
					<th width="30%">Product Name</th>
					<th width="20%">Supplier Prodcut Code</th>
					<th width="10%">Catagory</th>
					<th width="10%">Unit Price</th>
					<th width="10%">Action</th>
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
					

				</tr>
				
			</thead>
		
		</table>
		<div class="scroll nobar">
			<table class="ui attached table celled segment striped compact" style="zoom:.75">
				<tbody>
					
						<tr ng-repeat="product in products | filter:productf">
							<td width="10%">#{{product.product_code}}</td>
							<td width="30%">{{product.product_title}}</td>
							<td width="20%"># {{product.product_supplier_id}}</td>
							<td width="10%">{{product.product_cat_title}}</td>
							<td width="10%">$ {{product.product_regular_unit_price}}</td>
							<td width="10%">
								<a href="#/viewProduct:{{product.product_id}}" class="ui button blue tiny">View</a>
							</td>
						</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>