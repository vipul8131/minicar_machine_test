myApp.controller("Inventoryctrl", ['$scope', '$http', '$state', '$timeout', '$stateParams', '$rootScope', '$location', function($scope, $http, $state, $timeout, $stateParams, $rootScope, $location) {
    $scope.init = function(){
        $scope.get_inventory_details();
    }
    $scope.inventoryLists = [];
    $scope.inventoryPopupDetails = [];
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

     $scope.openPopup = function(modelIds){//open modal by clicking on rows
     	angular.element("#inventoryModal").modal("show");
     	$scope.getModelData(modelIds);
     }

     $scope.getModelData = function(Ids){
     	NProgress.start();
     	$scope.inventoryPopupDetails = [];
     	$http({
    			url:service_url+"home/get_inventory_details_by_id",
    			method:'POST',
    			data:{'model_id':Ids},
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    		}).then(function(resp){
    			NProgress.done();
    			if(resp.data.status == "success"){
    				$scope.inventoryPopupDetails = resp.data.data[0];
    			}else{
    				$scope.inventoryPopupDetails = [];
    			}
    		});
     }
}]);