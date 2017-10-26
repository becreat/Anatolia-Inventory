<div class="ui grid" style="zoom: .9;">
	
	<div class="ten wide column">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="large cube icon "></i> {{product.product_title}}</h3>
				
				
			</div>
			
			<div class="list-group ">
				<div class="list-group-item">
					<label>Product Code</label>
					<h4 class="list-group-item-heading"># {{product.product_code}}</h4>
				</div>
				<div class="list-group-item">
					<label>Product Catagoy</label>
					<h4 class="list-group-item-heading">{{product.product_cat_title}}</h4>
				</div>
				
				<div class="list-group-item">
					<label>Product Description</label>
					<h4 class="list-group-item-heading">{{product.productDetails}}</h4>
				</div>		
								
				<div class="list-group-item" >
					<label>Unit Of Messure</label>
					<h4 class="list-group-item-heading">{{product.unit_name}}</h4>
				</div>
				
				<div class="list-group-item">
					<label>Unit Price</label>
					<h4 class="list-group-item-heading">$ {{product.product_regular_unit_price}}</h4>
				</div>

				

				

			</div>

		</div>
		
	</div>

	<div class="six wide column">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left"><i class="large user icon "></i> Supplier Information</h3>
				
				
			</div>
			
			<div class="list-group ">
				<div class="list-group-item">
					<label>Supplier Name</label>
					<h4 class="list-group-item-heading">{{product.supplier_name}}</h4>
				</div>

				<div class="list-group-item">
					<label>Supplier Code</label>
					<h4 class="list-group-item-heading"># {{product.supplier_id}}</h4>
				</div>

			</div>
			

		</div>
		
	</div>

	
</div>