<div ng-init="init()">
	<div class="panel panel-primary">
	  <div class="panel-heading">Add New</div>
	  <div class="panel-body">
	    <div class="form-group">
	    	<label>Manufacturer Name</label>
	    	<input type="text" class="form-control" ng-model="m_name" placeholder="Manufacturer Name">
	    </div>
	    <button class="btn btn-primary" ng-click="save_manufacturer()">Save</button>
	  </div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">All Manufacturers</div>
		<div class="panel-body">
			<div class="form-group pull-left">
				<input type="text" class="form-control" ng-model="search" placeholder="Search Manufacturer">
			</div>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Id</th>
			        <th>Manufacturer Name</th>
			        <th>Date</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr dir-paginate="data in listsData | filter:search | itemsPerPage:10">
			        <td>{{data.MANUFACTURER_ID}}</td>
			        <td>{{data.MANUFACTURER_NAME}}</td>
			        <td>{{data.ADDED_DATE | date}}</td>
			      </tr>
			    </tbody>
			  </table>
			  <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true">
			  </dir-pagination-controls>

		</div>
	</div>
</div>