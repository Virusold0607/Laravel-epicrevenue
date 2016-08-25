adminControllers.controller('InstagramPostsListController', ['$scope', '$http', '$routeParams', '$location', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $location, $httpParamSerializerJQLike) {
        $scope.page = $routeParams.page;
        $http.get('/admin/api/instagramposts/?page=' + $routeParams.page).success(function(data) {
            $scope.instagramaccounts = data.data;

            $scope.totalItems = data.total;
            $scope.currentPage = data.current_page;
            $scope.maxSize = 10;

        });

        $scope.pageChanged = function() {
            $location.path('/instagramposts/' + $scope.currentPage);
        };

        $scope.orderProp = 'id';

    }]);

adminControllers.controller('InstagramPostsDetailController', ['$scope', '$http', '$routeParams', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $httpParamSerializerJQLike) {
        $scope.igId = $routeParams.igId;
        $http.get('/admin/api/instagramaccounts/' + $routeParams.igId).success(function(data) {
            $scope.ig = data;
        });
    }]);