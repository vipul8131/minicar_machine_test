<div ng-init="init();">
	<div class="panel panel-primary">
		<div class="panel-heading">View Inventory</div>
		<div class="panel-body">
			<div class="form-group pull-left">
				<input type="text" class="form-control" ng-model="search" placeholder="Search">
			</div>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Sr.No.</th>
			        <th>Manufacturer Name</th>
			        <th>Model Name</th>
			        <th>Count</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr dir-paginate="data in inventoryLists | filter:search | itemsPerPage:10">
			        <td>{{$index+1}}</td>
			        <td>{{data.MANUFACTURER_NAME}}</td>
			        <td>{{data.MODEL_NAME}}</td>
			        <td>{{data.model_count}}</td>
			      </tr>
			    </tbody>
			  </table>
			  <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true">
			  </dir-pagination-controls>

		</div>
	</div>
</div>