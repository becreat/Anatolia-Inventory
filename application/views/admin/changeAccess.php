<div class="ui grid" style="zoom: .9;">
	


	<div class="eight wide column">
		

		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			
				<h3 class="panel-title pull-left">	<i class="large setting icon "></i>Change Login Details</h3>
				
				
			</div>
			

			<table class="ui definition table compact top attached">
			  <tbody>
			   <tr>
			     <td class="two wide column" style="width: 20%;">Username</td>
			     <td class="trim"><input type="text" class="table-filter" ng-model="admin.admin_username"></td>
			   </tr>
			   
			   <tr>
			     <td>Current Password</td>
			     <td class="trim"><input type="password" class="table-filter" ng-model="old_password"></td>
			   </tr>

			   <tr>
			     <td>Password</td>
			     <td class="trim"><input type="password" class="table-filter" ng-model="new_password"></td>
			   </tr>
			   <tr>
			     <td>Confirm Password</td>
			     <td class="trim"><input type="password" class="table-filter" ng-model="new_cpassword"></td>
			   </tr>
			    <tr>
			      <td></td>
			      <td>
			      	<a ng-click="update()" class="ui button blue fluid">Update</a>
			      </td>
			    </tr>



			  </tbody>
			</table>
			

		</div>
		
	</div>

	

	
	
</div>