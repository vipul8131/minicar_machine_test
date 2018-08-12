var service_url = "http://"+window.location.hostname+"/minicar_machine_test/index.php/";
var current_date = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
myApp.controller("Mainctrl", ['$scope', '$http', '$state', '$timeout', '$stateParams', '$rootScope', '$location', function($scope, $http, $state, $timeout, $stateParams, $rootScope, $location) {
    $scope.init = function(){
        
    }

}]);