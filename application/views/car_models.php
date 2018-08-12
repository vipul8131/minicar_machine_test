<style type="text/css">
	.thumb-img{
		width: 150px !important;
	}
</style>
<div ng-init="init()">
	<div class="panel panel-primary">
	  <div class="panel-heading">Add New</div>
	  <div class="panel-body">
	    <div class="col-md-6">
	    	<label>Model Name</label>
	    	<input type="text" class="form-control" ng-model="model_name" placeholder="Model Name">
	    </div>
	    <div class="col-md-6">
	    	<label>Mfg. Name</label>
	    	<select class="form-control" ng-model="manufacturer_id">
	    		<option value="">Select Manufacturer</option>
	    		<option ng-repeat="manufact in listsData" value="{{manufact.MANUFACTURER_ID}}">{{manufact.MANUFACTURER_NAME}}</option>
	    	</select>
	    </div>
	    <div class="col-md-6">
	    	<label>Model Colour</label>
	    	<input type="color" class="form-control" ng-model="model_color" placeholder="Model Color">
	    </div>
	    <div class="col-md-6">
	    	<label>Mfg Year</label>
	    	<select class="form-control" ng-model="mfg_year">
	    		<option value="">Select Year</option>
	    		<option ng-repeat="yr in years" value="{{yr}}">{{yr}}</option>
	    	</select>
	    </div>
	    <div class="col-md-6">
	    	<label>Reg. Number</label>
	    	<input type="text" class="form-control" ng-model="reg_no" placeholder="Reg. Number">
	    </div>
	    <div class="col-md-6">
	    	<label>Note</label>
	    	<textarea class="form-control" ng-model="model_note" >Note
	    	</textarea>
	    </div>
	    <div class="col-md-6">
	    	<label>Model Images(Only 2)</label>
	    	<div class="fileinput fileinput-new" data-provides="fileinput">
                <div>
                    <input type="file" files-model="logoImage" id="logoImage" multiple>
                </div>
                <div class="col-md-3 fileinput-new thumbnail thumb-img mr15" ng-repeat="step in stepsModel" ng-if="stepsModel.length != ''" >
                    <img class="thumb" ng-src="{{step}}" style="width: 150px !important"/>
                </div>
            </div>
	    </div>
	    <div class="col-md-12" style="margin-top:10px;">
	    	<button class="btn btn-primary" ng-click="save_models(logoImage)">Save</button>
	    </div>
	  </div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">All Models</div>
		<div class="panel-body">
			<div class="form-group pull-left">
				<input type="text" class="form-control" ng-model="search" placeholder="Search Models">
			</div>
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
			        <th>Note</th>
			        <th>Date</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr dir-paginate="data in modelsData | filter:search | itemsPerPage:10">
			        <td>{{data.MODEL_ID}}</td>
			        <td><img src="uploads/{{data.IMAGE1}}" class="img-responsive" style="width: 100px;"></td>
			        <td><img src="uploads/{{data.IMAGE2}}" class="img-responsive" style="width: 100px;"></td>
			        <td>{{data.MODEL_NAME}}</td>
			        <td>{{data.MANUFACTURER_NAME}}</td>
			        <td>{{data.COLOR}}</td>
			        <td>{{data.MANUFACTURING_YEAR}}</td>
			        <td>{{data.REG_NUMBER}}</td>
			        <td>{{data.NOTE}}</td>
			        <td>{{data.ADDED_DATE | date}}</td>
			      </tr>
			    </tbody>
			  </table>
			  <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true">
			  </dir-pagination-controls>

		</div>
	</div>
</div>