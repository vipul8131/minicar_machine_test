myApp.controller("Inventoryctrl", ['$scope', '$http', '$state', '$timeout', '$stateParams', '$rootScope', '$location', function($scope, $http, $state, $timeout, $stateParams, $rootScope, $location) {
    $scope.init = function(){
        $scope.get_inventory_details();
    }
    $scope.inventoryLists = [];
    $scope.inventoryPopupDetails = [];
    $scope.selectedModel = "";
     $scope.get_inventory_details = function(){//get inventory details
     	NProgress.start();
     	$scope.inventoryLists = [];
    	$http({
    			url:service_url+"home/get_inventory_details",
    			method:'GET',
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    		}).then(function(resp){
    			NProgress.done();
    			if(resp.data.status == "success"){
    				$scope.inventoryLists = resp.data.data;
    			}else{
    				$scope.inventoryLists = [];
    			}
    		});
     }

     $scope.openPopup = function(manufacturerIds){//open modal by clicking on rows
     	$scope.selectedModel = manufacturerIds;
     	angular.element("#inventoryModal").modal("show");
     	$scope.getModelData(manufacturerIds);
     }

     $scope.getModelData = function(Ids){
     	NProgress.start();
     	$scope.inventoryPopupDetails = [];
     	$http({
    			url:service_url+"home/get_inventory_details_by_id",
    			method:'POST',
    			data:{'m_id':Ids},
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    		}).then(function(resp){
    			NProgress.done();
    			if(resp.data.status == "success"){
    				$scope.inventoryPopupDetails = resp.data.data;
    			}else{
    				$scope.inventoryPopupDetails = [];
    			}
    		});
     }

     $scope.soldModel = function(modelId){
     	 swal({
                    title: "Are you sure?",
                    text: "This model will sold and will delete from DB.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Sold it!",
                    cancelButtonText: "No, thanks!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                    	NProgress.start();
                    	$http({
			    			url:service_url+"home/sold_model",
			    			method:'POST',
			    			data:{'model_id':modelId},
			    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
			    		}).then(function(resp){
			    			NProgress.done();
			    			if(resp.data.status == "success"){
			    				swal({title:"Success!", text:"Model sold successfully.", type:"success"});
			    				angular.element("#inventoryModal").modal("hide");
			    				$scope.get_inventory_details();
			    			}else{
			    				$scope.inventoryPopupDetails = [];
			    			}
			    		});
                    }
                });

     }
}]);