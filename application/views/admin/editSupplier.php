<div class="ui grid" style="zoom: .9;">
	


	<div class="trim wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="large edit icon "></i>Edit :  {{supplier.supplier_name}}</h3>
				
				
			</div>
			

			<table class="ui definition table compact top attached">
			  <tbody>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Supplier Name</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_name"></td>
			    </tr>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Supplier Title</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_title"></td>
			    </tr>
			    <tr>
			      <td class="two wide column" style="width: 20%;">Supplier Code</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_code" disabled></td>
			    </tr>
			    <tr>
			      <td>Company Name</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_company_name"></td>
			    </tr>
			    
			    
			    <tr>
			      <td>Address</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_address"></td>
			    </tr>
			    <tr>
			      <td>Phone</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_phone"></td>
			    </tr>
			    <tr>
			      <td>Email</td>
			       <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_email"></td>
			    </tr>
			    
			    <tr>
			      <td>Web</td>
			      <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_web"></td>
			    </tr>
			    <tr>
			      <td>GST Number / Tax Id Number</td>
			       <td class="trim"><input type="text" class="table-filter" ng-model="supplier.supplier_tax_id"></td>
			    </tr>
			    <tr>
			      <td>About Company</td>
			       <td class="trim">
			       		<textarea class="table-filter" id="" cols="30" rows="10" ng-model="supplier.supplier_company_details"></textarea>
			       </td>
			    </tr>
			     <tr>
			      <td>Special Notes</td>
			       <td class="trim">
			       		<textarea class="table-filter" id="" cols="30" rows="10" ng-model="supplier.supplier_special_note"></textarea>
			       </td>
			    </tr>

			    <tr>
			      <td></td>
			      <td>
			      	<a ng-click="update()" class="ui button blue fluid">Update Changes</a>
			      </td>
			    </tr>



			  </tbody>
			</table>
			

		</div>
		
	</div>

	
</div>