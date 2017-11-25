var app = angular.module("search_recibos", []);

app.controller("recibos_controller", function($scope, $http) {

    $scope.recibos = [];

    $scope.busquedarecibos = {};

    $scope.queryBy = '$';

    $http.get(base_url + "/getrecibos/" + id_pasajero).success(function(data) {
        $scope.recibos = data;
    }).error(function(err) {
    })

});
