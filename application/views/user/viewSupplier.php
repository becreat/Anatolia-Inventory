<div class="ui grid" style="zoom: .9;">
	


	<div class="sixteen wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="large user icon "></i> {{supplier.supplier_name}}</h3>
				
				
			</div>
			<div class="list-group">
				<div class="list-group-item">
					<label>Supplier Code</label>
					<h4 class="list-group-item-heading">#{{supplier.supplier_id}}</h4>
				</div>

				<div class="list-group-item">
					<label>Company Name	 </label>
					<h4 class="list-group-item-heading">{{supplier.supplier_company_name}}</h4>
				</div>
				
				<div class="list-group-item">
					<label>Address </label>
					<h4 class="list-group-item-heading">{{supplier.supplier_address}}</h4>
				</div>

			
				
				
				<div class="list-group-item" >
					<label>Phone</label>
					<h4 class="list-group-item-heading">{{supplier.supplier_phone}}</h4>
				</div>
				
				<div class="list-group-item">
					<label>Email</label>
					<h4 class="list-group-item-heading">{{supplier.supplier_email}}</h4>
				</div>

				<div class="list-group-item">
					<label>Web </label>
					<h4 class="list-group-item-heading"><a href="">{{supplier.supplier_web}}</a></h4>
				</div>

				<div class="list-group-item">
					<label>Supplier Tax ID</label>
					<h4 class="list-group-item-heading">{{supplier.supplier_tax_id}}</h4>
				</div>

				<div class="list-group-item">
					<label>About Company</label>
					<h4 class="list-group-item-heading">{{supplier.supplier_company_details}}</h4>
				</div>

			</div>
			<div class="panel-footer">
				<div class="pull-left">
					<strong>Special Notes : </strong>
					<p>{{supplier.supplier_special_note}}</p>
				</div>	
			</div>

		</div>
		
	</div>

	
</div>