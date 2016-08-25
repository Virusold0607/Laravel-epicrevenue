adminControllers.controller('InstagramAccountListController', ['$scope', '$http', '$routeParams', '$location', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $location, $httpParamSerializerJQLike) {
        $scope.page = $routeParams.page;
        $http.get('/admin/api/instagramaccounts/?page=' + $routeParams.page).success(function(data) {
            $scope.instagramaccounts = data.data;

            $scope.totalItems = data.total;
            $scope.currentPage = data.current_page;
            $scope.maxSize = 10;

        });

        $scope.pageChanged = function() {
            $location.path('/instagramaccounts/' + $scope.currentPage);
        };

        $scope.orderProp = 'id';

        $scope.approval = function(id, status) {
            $http({
                method  : 'POST',
                url     : '/admin/api/instagramaccounts/approval/' + id,
                data    : $httpParamSerializerJQLike({ approve: status }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    // if successful, bind success message to message
                    for(var i = 0; i < $scope.instagramaccounts.length; i++) {
                        if($scope.instagramaccounts[i].instagram_id === id) {
                            $scope.instagramaccounts[i].approved = status;
                            return true;
                        }
                    }
                });

        };

    }]);

adminControllers.controller('InstagramAccountDetailController', ['$scope', '$http', '$routeParams', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $httpParamSerializerJQLike) {
        $scope.igId = $routeParams.igId;
        $http.get('/admin/api/instagramaccounts/' + $routeParams.igId).success(function(data) {
            $scope.ig = data;
        });

        $scope.approval = function(status) {
            $http({
                method  : 'POST',
                url     : '/admin/api/instagramaccounts/approval/' + $routeParams.igId,
                data    : $httpParamSerializerJQLike({ approve: status }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    // if successful, bind success message to message
                    $scope.ig.approved = status;
                });

        };
    }]);