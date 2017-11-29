var app = angular.module("search_recibosindex", []);

app.controller("recibosindex_controller", function($scope, $http) {

    $scope.recibos = [];

    $scope.busquedarecibos = {};

    $scope.queryBy = '$';

    $http.get(base_url + "/getrecibos" ).success(function(data) {
        $scope.recibos = data;
    }).error(function(err) {
    })

});
