myApp.controller("Inventoryctrl", ['$scope', '$http', '$state', '$timeout', '$stateParams', '$rootScope', '$location', function($scope, $http, $state, $timeout, $stateParams, $rootScope, $location) {
    $scope.init = function(){
        $scope.get_inventory_details();
    }
    $scope.inventoryLists = [];
     $scope.get_inventory_details = function(){
     	NProgress.start();
     	$scope.inventoryLists = [];
    	$http({
    			url:service_url+"home/get_inventory_details",
    			method:'GET',
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    		}).then(function(resp){
    			NProgress.done();
    			console.log(resp);
    			if(resp.data.status == "success"){
    				$scope.inventoryLists = resp.data.data;
    			}else{
    				$scope.inventoryLists = [];
    			}
    		});
     }
}]);