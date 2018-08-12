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
			      <tr dir-paginate="data in inventoryLists | filter:search | itemsPerPage:10" ng-click="openPopup(data.MODEL_ID)">
			        <td>{{$index+1}}</td>
			        <td>{{data.MANUFACTURER_NAME}}</td>
			        <td>{{data.MODEL_NAME}}</td>
			        <td>{{data.model_count}}</td>
			      </tr>
			    </tbody>
			  </table>
			  <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true">
			  </dir-pagination-controls><!-- Angularjs Pagination  -->

		</div>
	</div>
	<!-- Popup for models details -->
	<div class="modal modal-primary fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Model Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body row">
	        <div class="col-md-4">
	        	<img class="img-responsive img-thumbnail" src="uploads/{{inventoryPopupDetails.IMAGE1}}">
	        	<img class="img-responsive img-thumbnail" src="uploads/{{inventoryPopupDetails.IMAGE2}}">
	        </div>
	        <div class="col-md-8">	        	
	        	<table class="table table-striped">
	        		<tr>
	        			<td><b>Reg. No :</b></td>
	        			<td>{{inventoryPopupDetails.REG_NUMBER}}</td>
	        		</tr>
	        		<tr>
	        			<td><b>Model Name :</b></td>
	        			<td>{{inventoryPopupDetails.MODEL_NAME}}</td>
	        		</tr>
	        		<tr>
	        			<td><b>Mfg Name :</b></td>
	        			<td>{{inventoryPopupDetails.MANUFACTURER_NAME}}</td>
	        		</tr>
	        		<tr>
	        			<td><b>Colour :</b></td>
	        			<td><div style="width:70px;height:20px;border: 1px solid #000;;background:{{inventoryPopupDetails.COLOR}}"></div></td>
	        		</tr>
	        		<tr>
	        			<td><b>Mfg Year :</b></td>
	        			<td>{{inventoryPopupDetails.MANUFACTURING_YEAR}}</td>
	        		</tr>
	        		<tr>
	        			<td><b>Note :</b></td>
	        			<td>{{inventoryPopupDetails.NOTE}}</td>
	        		</tr>
	        		<tr>
	        			<td><b>Date :</b></td>
	        			<td>{{inventoryPopupDetails.ADDED_DATE}}</td>
	        		</tr>
	        		
	        	</table>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>