myApp.controller("Carmodelsctrl", ['$scope', '$http', '$state', '$timeout', '$stateParams', '$rootScope', '$location', function($scope, $http, $state, $timeout, $stateParams, $rootScope, $location) {
    $scope.init = function(){
        $scope.get_models();
        $scope.get_manufacturers();
    }

    $scope.listsData = [];
    $scope.stepsModel = [];
    $scope.files_list = [];
    var files_datas = [];
    $scope.model_name = "";
    $scope.model_color = "";
    $scope.model_note = "";
    $scope.mfg_year = "";
    $scope.manufacturer_id = "";
    $scope.reg_no = "";
    $scope.years = [];
    $scope.modelsData = [];
    var currDates = new Date();
   	for(var i=1900;i<=currDates.getFullYear();i++){//dynamic years
   		$scope.years.push(i);
   	}
    $scope.imageIsLoaded = function(e){//Get image and preview image to model by directive
        $scope.$apply(function() {
            var imgStr = e.target.result;
            var imgTypes = imgStr.split(";");
            var types_ = imgTypes[0].split(":")[1];
            if(types_ == 'image/png' || types_ == 'image/jpg' || types_ == 'image/jpeg'){
                $scope.stepsModel.push(e.target.result);
            }else{
                angular.element("input[type='file']").val(null);
                swal({title:"Oops!", text:"Image type is invalid.", type:"error"});
            }
        });
    }

    $scope.get_manufacturers = function(){//get manufacturer data
    	NProgress.start();
    	$http({
    			url:service_url+"home/get_manufacturer",
    			method:'GET',
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    		}).then(function(resp){
    			NProgress.done();
    			if(resp.data.status == "success"){
    				$scope.listsData = resp.data.data;
    			}else{
    				$scope.listsData = [];
    			}
    		});
    }

    $scope.get_models = function(){//get model details
    	NProgress.start();
    	$scope.modelsData = [];
    	$http({
    			url:service_url+"home/get_models",
    			method:'GET',
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    		}).then(function(resp){
    			NProgress.done();
    			console.log(resp);
    			if(resp.data.status == "success"){
    				$scope.modelsData = resp.data.data;
    			}else{
    				$scope.modelsData = [];
    			}
    		});
    }

    $scope.save_models = function(imgs){// save model data
    	var model_name = $scope.model_name;
    	var manufacturer_id = $scope.manufacturer_id;
    	var model_color = $scope.model_color;
    	var mfg_year = $scope.mfg_year;
    	var reg_no = $scope.reg_no;
    	var model_note = $scope.model_note;
    	var model_images = imgs;
    	console.log(model_images);
    	var formData = new FormData();
    	if(model_name == "" || manufacturer_id == "" || model_color == "" || mfg_year == "" || reg_no == "" || model_note == "" || model_images == ""){
    		swal({title:"Oops!", text:"All fields are mandatory", type:"error"});
    		return false;	
    	}
    	
    	if(model_images == undefined){
    		swal({title:"Oops!", text:"Please upload 2 model images", type:"error"});
    		return false;
    	}

    	if(model_images.length == 0){
    		swal({title:"Oops!", text:"Please upload 2 model images", type:"error"});
    		return false;
    	}

    	if(model_images.length > 2){
    		swal({title:"Oops!", text:"Sorry! You can not upload more than 2 images.", type:"error"});
    		$scope.stepsModel = [];
    		angular.element("input[type=file]").val("");
    		return false;
    	}

    	formData.append("file1", model_images[0]);
    	formData.append("file2", model_images[1]);
    	formData.append("model_name", model_name);
    	formData.append("manufacturer_id", manufacturer_id);
    	formData.append("model_color", model_color);
    	formData.append("mfg_year", mfg_year);
    	formData.append("reg_no", reg_no);
    	formData.append("model_note", model_note);
    	formData.append("added_date", current_date);
    	NProgress.start();
    	 $http.post(service_url+"home/save_models", formData, {
                transformRequest: angular.identity,
                headers: { 'Content-Type': undefined }
            }).then(function(response){
            	NProgress.done();
            	//console.log(response);
            	if(response.data.status == "success" && response.data.code == 200){
            		swal({title:"Success!", text:"New model data added successfully", type:"success"});
            		$scope.model_name = "";
			    	$scope.manufacturer_id = "";
			    	$scope.model_color = "";
			    	$scope.mfg_year = "";
			    	$scope.reg_no = "";
			    	$scope.model_note = "";
			    	$scope.stepsModel = [];
			    	angular.element("input[type=file]").val("");
			    	$scope.get_models();
            	}else if(response.data.status == "success" && response.data.code == 201){
            		swal({title:"Oops!", text:"This model name is already exists", type:"error"});
            	}else{
            		swal({title:"Oops!", text:"Something went wrong", type:"error"});
            	}
            });


    }
}]);