<style type="text/css">
	#inventoryTbl tr:hover{
		cursor: pointer;
	}
</style>
<div ng-init="init();">
	<div class="panel panel-primary">
		<div class="panel-heading">View Inventory</div>
		<div class="panel-body">
			<div class="form-group pull-left">
				<input type="text" class="form-control" ng-model="search" placeholder="Search">
			</div>
			<table class="table table-striped table-hover" id="inventoryTbl">
			    <thead>
			      <tr>
			        <th>Sr.No.</th>
			        <th>Manufacturer Name</th>
			        <!-- <th>Model Name</th> -->
			        <th>Count</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr dir-paginate="data in inventoryLists | filter:search | itemsPerPage:10" ng-click="openPopup(data.MANUFACTURER_ID)" pagination-id="allmodels">
			        <td>{{$index+1}}</td>
			        <td>{{data.MANUFACTURER_NAME}}</td>
			        <!-- <td>{{data.MODEL_NAME}}</td> -->
			        <td>{{data.model_count}}</td>
			      </tr>
			    </tbody>
			  </table>
			  <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" pagination-id="allmodels">
			  </dir-pagination-controls><!-- Angularjs Pagination  -->

		</div>
	</div>
	<!-- Popup for models details -->
	<div class="modal modal-primary fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content ">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Model Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body row">
	      	<div class="table-responsive">
	       <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Id</th>
			        <th>Image 1</th>
			        <th>Image 2</th>
			        <th>Model Name</th>
			        <th>Mfg. Name</th>
			        <th>Colour</th>
			        <th>MFG. Year</th>
			        <th>Reg. No.</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr dir-paginate="data in inventoryPopupDetails | filter:search | itemsPerPage:10" pagination-id="modelDetails">
			        <td>{{data.MODEL_ID}}</td>
			        <td><img src="uploads/{{data.IMAGE1}}" class="img-responsive" style="width: 100px;"></td>
			        <td><img src="uploads/{{data.IMAGE2}}" class="img-responsive" style="width: 100px;"></td>
			        <td>{{data.MODEL_NAME}}</td>
			        <td>{{data.MANUFACTURER_NAME}}</td>
			        <td><div style="width:70px;height:20px;border: 1px solid #000;;background:{{data.COLOR}}"></div></td>
			        <td>{{data.MANUFACTURING_YEAR}}</td>
			        <td>{{data.REG_NUMBER}}</td>
			        <td>
			        	<button class="btn btn-primary" ng-click="soldModel(data.MODEL_ID)">Sold</button>
			        </td>
			      </tr>
			    </tbody>
			  </table>
			  </div>
			  <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" pagination-id="modelDetails">
			  </dir-pagination-controls>
	      </div>
	    </div>
	  </div>
	</div>
</div>