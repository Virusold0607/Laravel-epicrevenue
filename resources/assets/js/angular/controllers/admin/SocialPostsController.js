adminControllers.controller('SocialPostsListController', ['$scope', '$http', '$routeParams', '$location', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $location, $httpParamSerializerJQLike) {
        $scope.page = $routeParams.page;
        $http.get('/api/admin/socialposts/?page=' + $routeParams.page).success(function(data) {
            $scope.socialaccounts = data.data;

            $scope.totalItems = data.total;
            $scope.currentPage = data.current_page;
            $scope.maxSize = 10;

        });

        $scope.pageChanged = function() {
            $location.path('/socialposts/' + $scope.currentPage);
        };

        $scope.orderProp = 'id';

    }]);

adminControllers.controller('SocialPostsDetailController', ['$scope', '$http', '$routeParams', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $httpParamSerializerJQLike) {
        $scope.igId = $routeParams.igId;
        $http.get('/api/admin/socialaccounts/' + $routeParams.igId).success(function(data) {
            $scope.ig = data;
        });
    }]);