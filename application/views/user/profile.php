<div class="ui grid">
	<div class="nine wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">Your Account Details</h3>
				
				
			</div>
			<div class="list-group">
				<div class="list-group-item">
					<label>Contact Person </label>
					<h4 class="list-group-item-heading">{{coustomer.coustomer_name}}</h4>
				</div>
				<div class="list-group-item">
					<label>Company Name	 </label>
					<h4 class="list-group-item-heading">{{coustomer.coustomer_company_name}}</h4>
				</div>
				
				<div class="list-group-item">
					<label>Address </label>
					<h4 class="list-group-item-heading">{{coustomer.coustomer_address}}</h4>
				</div>

				<div class="list-group-item">
					<label>Delevery Address</label>
					<h4 class="list-group-item-heading">{{coustomer.coustomer_delivery_address}}</h4>
				</div>
				
				
				<div class="list-group-item" >
					<label>Phone</label>
					<h4 class="list-group-item-heading">{{coustomer.coustomer_phone}}</h4>
				</div>
				
				<div class="list-group-item">
					<label>Email</label>
					<h4 class="list-group-item-heading"><a href="mailto:{{coustomer.coustomer_email}}">{{coustomer.coustomer_email}}</a></h4>
				</div>

				<div class="list-group-item">
					<label>Web </label>
					<h4 class="list-group-item-heading"><a href="{{coustomer.coustomer_web}}">{{coustomer.coustomer_web}}</a></h4>
				</div>
				

			</div>
			<div class="panel-footer">
				<small class="pull-left ">Note : If you want any of avobe information please contact with Admin</small>	
			</div>

		</div>
		
	</div>

	<div class="seven wide column">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">List Of Your Suppliers</h3>
				
				
			</div>
			<div class="list-group scroll">
				
				<a class="list-group-item" href="#/viewSupplier:{{supplier.supplier_id}}" ng-repeat="supplier in suppliers">
					<h4 class="list-group-item-heading">{{supplier.supplier_name}}</h4>
					<label># {{supplier.supplier_id}}</label>
				</a>


			</div>


		</div>
	</div>
</div>