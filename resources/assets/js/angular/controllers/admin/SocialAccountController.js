adminControllers.controller('SocialAccountListController', ['$scope', '$http', '$routeParams', '$location', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $location, $httpParamSerializerJQLike) {
        $scope.page = $routeParams.page;
        $http.get('/api/admin/socialaccounts/?page=' + $routeParams.page).success(function(data) {
            $scope.socialaccounts = data.data;

            $scope.totalItems = data.total;
            $scope.currentPage = data.current_page;
            $scope.maxSize = 10;

        });

        $scope.pageChanged = function() {
            $location.path('/socialaccounts/' + $scope.currentPage);
        };

        $scope.orderProp = 'id';

        $scope.approval = function(id, status) {
            $http({
                method  : 'POST',
                url     : '/api/admin/socialaccounts/approval/' + id,
                data    : $httpParamSerializerJQLike({ approve: status }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    // if successful, bind success message to message
                    for(var i = 0; i < $scope.socialaccounts.length; i++) {
                        if($scope.socialaccounts[i].account_id === id) {
                            $scope.socialaccounts[i].approved = status;
                            return true;
                        }
                    }
                });

        };

    }]);

adminControllers.controller('SocialAccountDetailController', ['$scope', '$http', '$routeParams', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $httpParamSerializerJQLike) {
        $scope.socialId = $routeParams.socialId;
        $http.get('/api/admin/socialaccounts/' + $routeParams.socialId).success(function(data) {
            $scope.socialAccount = data;
        });

        $scope.approval = function(status) {
            $http({
                method  : 'POST',
                url     : '/api/admin/socialaccounts/approval/' + $routeParams.socialId,
                data    : $httpParamSerializerJQLike({ approve: status }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    // if successful, bind success message to message
                    $scope.socialAccount.approved = status;
                });

        };
    }]);