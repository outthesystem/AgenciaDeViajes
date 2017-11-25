var app = angular.module("search_pasajeros", []);
app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: ' <div class="loader"></div> ',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
  });
app.controller("pasajeros_controller", function($scope, $http) {

    $scope.loading = true;

    $scope.pasajeros = [];

    $scope.busquedapasajeros = {};

    $scope.queryBy = '$';

    $http.get(base_url + "/getpasajeros").success(function(data) {
        $scope.pasajeros = data;
         $scope.loading = false;
    }).error(function(err) {
    })

});
