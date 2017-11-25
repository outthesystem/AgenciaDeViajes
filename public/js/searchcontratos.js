var app = angular.module("search_contratos", []);

app.controller("contratos_controller", function($scope, $http) {

    $scope.contratos = [];

    $scope.busquedacontratos = {};

    $scope.queryBy = '$';

    $http.get(base_url + "/getcontratos").success(function(data) {
        $scope.contratos = data;
    }).error(function(err) {
    })

});
