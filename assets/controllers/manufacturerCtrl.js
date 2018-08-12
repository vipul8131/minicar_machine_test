myApp.controller("Manufacturerctrl", ['$scope', '$http', '$state', '$timeout', '$stateParams', '$rootScope', '$location', function($scope, $http, $state, $timeout, $stateParams, $rootScope, $location) {
    $scope.init = function(){
        $scope.get_manufacturers();
    }

    $scope.m_name = "";
    $scope.listsData = [];
    $scope.get_manufacturers = function(){
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

    $scope.save_manufacturer = function(){
    	var mname = $scope.m_name;
    	if(mname.trim() == "" || mname.trim() == undefined){
    		swal({"title":"Oops!", "text":"Manufacturer name should not be empty", type:"error"});
    		return false;
    	}else{
    		NProgress.start();
    		$http({
    			url:service_url+"home/save_manufacturer",
    			method:'POST',
    			data:{"m_name":mname, "added_date":current_date},
    			headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    			/*headers:{'Content-Type':'application/json'}*/
    		}).then(function(resp){
    			console.log(resp);
    			NProgress.done();
    			//var resp = JSON.parse(response);
    			if(resp.data.status == "success" && resp.data.code == 200){
    				$scope.m_name = "";
    				swal({"title":"Success!", "text":"Manufacturer saved successfully", type:"success"});
    				$scope.get_manufacturers();
    			}else if(resp.data.status == "success" && resp.data.code == 201){
    				swal({"title":"Oops!", "text":"Manufacturer is already exists", type:"error"});
    			}else{
    				swal({"title":"Oops!", "text":"Something went wrong", type:"error"});
    			}
    		});
    	}
    }

}]);