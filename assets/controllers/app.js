var myApp = angular.module("myApp", ['ui.router', 'angularUtils.directives.dirPagination']);
var base_url = "http://" + window.location.hostname + "/minicar_machine_test/";
myApp.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.when("", "/manufacturer");
    $urlRouterProvider.otherwise("/manufacturer");
    $stateProvider.state("/home", {
                url: "/home",
                views: {
                    'bodys': {
                        templateUrl: base_url+"index.php/home/main_page",
                        controller:"Mainctrl"
                    }
                }    
            }).state("/manufacturer", {
                url: "/manufacturer",
                views: {
                    'bodys': {
                        templateUrl: base_url+"index.php/home/manufacturer",
                        controller:"Manufacturerctrl"
                    }
                }    
            }).state("/car_models", {
                url: "/car_models",
                views: {
                    'bodys': {
                        templateUrl: base_url+"index.php/home/car_models",
                        controller:"Carmodelsctrl"
                    }
                }    
            })
});
/*first letter capital filter*/
myApp.filter('firstCaps', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
});
myApp.directive("filesModel", function($parse) {
    return {
        restrict: 'A',
        link: function($scope, element, attrs) {
            element.on("change", function(event) {
                var files = event.target.files;
                //image preview code by vipul
                    for (var i = 0; i < files.length; i++) {
                         var file = files[i];
                             var reader = new FileReader();
                             reader.onload = $scope.imageIsLoaded; 
                             reader.readAsDataURL(file);
                     }
                //end of code
                $parse(attrs.filesModel).assign($scope, element[0].files);
                $scope.$apply();

            });
        }
    }
}); //end of multiple file upload
//directive end here

//filter for for loop for html
myApp.filter('ranges', function() {
    return function(input, total) {
        total = parseInt(total);

        for (var i = 0; i < total; i++) {
            input.push(i);
        }

        return input;
    };
});
//end of filter here
myApp.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});

myApp.directive('ckEditor', function() {
  return {
    require: '?ngModel',
    link: function(scope, elm, attr, ngModel) {
      var ck = CKEDITOR.replace(elm[0]);

      if (!ngModel) return;

      ck.on('pasteState', function() {
        scope.$apply(function() {
          ngModel.$setViewValue(ck.getData());
        });
      });

      ngModel.$render = function(value) {
        ck.setData(ngModel.$viewValue);
      };
    }
  };
});

myApp.directive('stringToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(value) {
        return '' + value;
      });
      ngModel.$formatters.push(function(value) {
        return parseFloat(value);
      });
    }
  };
});

//utc filter is remove 'T' and 'Z' from date comming from mysql datetime
myApp.filter('utc', function(){

  return function(val){
    var date = new Date(val);
     return new Date(date.getUTCFullYear(), 
                     date.getUTCMonth(), 
                     date.getUTCDate(),  
                     date.getUTCHours(), 
                     date.getUTCMinutes(), 
                     date.getUTCSeconds());
  };    

});

//textbox accept only letters not a number
myApp.directive('onlyLettersInput', function onlyLettersInput() {
      return {
        require: 'ngModel',
        link: function(scope, element, attr, ngModelCtrl) {
          function fromUser(text) {
            var transformedInput = text.replace(/[^a-zA-Z]/g, '');
            //console.log(transformedInput);
            if (transformedInput !== text) {
              ngModelCtrl.$setViewValue(transformedInput);
              ngModelCtrl.$render();
            }
            return transformedInput;
          }
          ngModelCtrl.$parsers.push(fromUser);
        }
      };
    });

myApp.directive('setHeight', function($window){
  return{
    link: function(scope, element, attrs){
        element.css('height', $window.innerHeight-150 + 'px');
        //element.height($window.innerHeight/3);
    }
  }
})

// myApp.constant('jdFontselectConfig', {
//   googleApiKey: 'AIzaSyBleGC8Hm2ML9GDNh_bg603nxu0lktIq_Q'
// });