var app = angular.module("contratos_pasajeros", []);

app.directive('input', [function() {
    return {
        restrict: 'E',
        require: '?ngModel',
        link: function(scope, element, attrs, ngModel) {
            if ('undefined' !== typeof attrs.type && 'number' === attrs.type && ngModel) {
                ngModel.$formatters.push(function(modelValue) {
                    return Number(modelValue);
                });

                ngModel.$parsers.push(function(viewValue) {
                    return Number(viewValue);
                });
            }
        }
    }
}]);



app.controller("ctrlpasajeros", function($scope, $http) {

    $scope.posts = [];

    $scope.carrito = [];

    $scope.clienteasignado = [];

    $scope.clientes = [];

    $scope.busqueda = {};

    $scope.busquedaclientes = {};

    $scope.queryBy = '$';

    $scope.newPost = {};

    $http.get(base_url + "/getpasajeros/" + id_contract).success(function(data) {
        $scope.clientes = data;
    }).error(function(err) {
    })

});
