var app = angular.module('admin', [
        'ui.bootstrap',
        'chart.js',
        'ngRoute',
        'ngSanitize',
        'ui.select',
        'adminControllers',
        'ngFileUpload'
    ]
);


app.config(function(uiSelectConfig) {
    uiSelectConfig.theme = 'bootstrap';
});

var adminControllers = angular.module('adminControllers', []);


app.config(['$interpolateProvider', '$routeProvider',
    function($interpolateProvider, $routeProvider) {

        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');

        $routeProvider.
            when('/stats', {
                templateUrl: '/build/assets/js/partials/admin/stats.html',
                controller: 'StatsController'
            }).
            when('/publishers/:page?', {
                templateUrl: '/build/assets/js/partials/admin/publishers/index.html',
                controller: 'PublisherListController'
            }).
            when('/publishers/show/:userId', {
                templateUrl: '/build/assets/js/partials/admin/publishers/show.html',
                controller: 'PublisherDetailController'
            }).
            when('/publishers/edit/:userId', {
                templateUrl: '/build/assets/js/partials/admin/publishers/edit.html',
                controller: 'PublisherEditController'
            }).
            when('/instagramaccounts/:page?', {
                templateUrl: '/build/assets/js/partials/admin/instagramaccounts/index.html',
                controller: 'InstagramAccountListController'
            }).
            when('/contests/create/', {
                templateUrl: '/build/assets/js/partials/admin/contests/create.html',
                controller: 'ContestCreateController'
            }).
            when('/instagramaccounts/show/:igId/', {
                templateUrl: '/build/assets/js/partials/admin/instagramaccounts/show.html',
                controller: 'InstagramAccountDetailController'
            }).
            when('/contests/:page?', {
                templateUrl: '/build/assets/js/partials/admin/contests/index.html',
                controller: 'ContestListController'
            }).
            when('/contests/show/:contestId', {
                templateUrl: '/build/assets/js/partials/admin/contests/show.html',
                controller: 'ContestDetailController'
            }).
            when('/contests/edit/:contestId', {
                templateUrl: '/build/assets/js/partials/admin/contests/edit.html',
                controller: 'ContestEditController'
            }).
            when('/reports/:page?', {
                templateUrl: '/build/assets/js/partials/admin/reports/index.html',
                controller: 'ReportListController'
            }).
            when('/campaigns/gallery/:id?', {
                templateUrl: '/build/assets/js/partials/admin/campaigns/gallery.html',
                controller: 'CampaignGalleryController'
            }).
            when('/campaigns/create', {
                templateUrl: '/build/assets/js/partials/admin/campaigns/create.html',
                controller: 'CampaignCreateController'
            }).
            when('/campaigns/:page?', {
                templateUrl: '/build/assets/js/partials/admin/campaigns/index.html',
                controller: 'CampaignListController'
            }).
            when('/reports/show/:reportId', {
                templateUrl: '/build/assets/js/partials/admin/reports/show.html',
                controller: 'ReportDetailController'
            }).
            when('/campaigns/show/:campaignId', {
                templateUrl: '/build/assets/js/partials/admin/campaigns/show.html',
                controller: 'CampaignDetailController'
            }).
            when('/campaigns/edit/:campaignId', {
                templateUrl: '/build/assets/js/partials/admin/campaigns/edit.html',
                controller: 'CampaignEditController'
            }).
            otherwise({
                redirectTo: '/stats'
            });
    }]);
//# sourceMappingURL=app.js.map

adminControllers.controller('CampaignListController', ['$scope', '$http', '$routeParams', '$location',
    function ($scope, $http, $routeParams, $location) {
        $scope.page = 1;

        $scope.getRecords = function(page, search, search_by, order_by, order){
            $scope.page = typeof page !== 'undefined' ? page : $scope.page;
            $scope.search = typeof search !== 'undefined' ? search : '';
            $scope.search_by = typeof search_by !== 'undefined' ? search_by : 'id';
            $scope.order = typeof order !== 'undefined' ? order : 'asc';
            $scope.order_by = typeof order_by !== 'undefined' ? order_by : 'active';

            $http.get('/admin/api/campaigns/?page=' + $scope.page + '&search=' + $scope.search + '&search_by=' + $scope.search_by + '&order_by=' + $scope.order_by + '&order=' + $scope.order)
                .then(function successCallback(response) {
                    //console.log('successCallback: ');
                    //console.log(response);
                    $scope.campaigns = response.data.data;
                    $scope.totalItems = response.data.total;
                    $scope.currentPage = response.data.current_page;
                    $scope.maxSize = 10;
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
            });

        };

        $scope.getRecords($scope.page);

        $scope.pageChanged = function() {
            $scope.page = $scope.currentPage;
            $scope.getRecords($scope.page, $scope.search, $scope.search_by, $scope.order_by, $scope.order);
        };

        $scope.searchRecords = function(query, search_by, order_by, order) {
            $scope.search = typeof query !== 'undefined' ? query : '';
            $scope.search_by = typeof search_by !== 'undefined' ? search_by : 'id';
            $scope.order = typeof order !== 'undefined' ? order : 'dsc';
            $scope.order_by = typeof order_by !== 'undefined' ? order_by : 'id';

            $scope.getRecords($scope.page, $scope.search, $scope.search_by, $scope.order_by, $scope.order);
        };


    }]);
adminControllers.controller('CampaignDetailController', ['$scope', '$http', '$routeParams',
    function ($scope, $http, $routeParams) {
        $scope.contestId = $routeParams.contestId;
        $http.get('/admin/api/contests/' + $routeParams.contestId).success(function(data) {
            $scope.contest = data.contest;
            $scope.reports = data.reports;
        });
    }]);
adminControllers.controller('CampaignCreateController', ['$scope', '$http', '$filter', '$location',
    function ($scope, $http, $filter, $location) {

        $http.get('/admin/api/campaigns/create')
            .then(function successCallback(response) {
                //console.log('successCallback: ');
                //console.log(response);
                $scope.campaign_categories = response.data.campaign_categories;
                $scope.countries = response.data.countries;
                $scope.networks = response.data.networks;
            }, function errorCallback(response) {
                console.log('errorCallback: ');
                console.log(response);
                $scope.message = "Something goes wrong. For more info check console logs.";
            });

        $scope.contest = {
            type: "top_earner",
            start_at: new Date(),
            end_at: new Date()
        };
        $scope.targets =  [
            { position: 1, name: '', description: '' },
            { position: 2, name: '', description: '' },
            { position: 3, name: '', description: '' }
        ];
        $scope.addTarget = function(){
            var position = $scope.rewards.length;
            $scope.rewards[position] = { position: position + 1, name: '', description: '' };
        };
        $scope.removeTarget = function(){
            $scope.rewards.pop();
        };
        $scope.create = function(campaign, targets) {
            var data = { campaign: campaign, targets: targets };

            $http.post('/admin/api/campaigns',
                data,
                { 'Content-Type': 'application/x-www-form-urlencoded' }
            ).then(function successCallback(response) {
                    console.log('successCallback: ');
                    console.log(response);
                    $scope.message = "Success";
                    //$location.url('campaigns');
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
                });

        };
    }]);
adminControllers.controller('CampaignEditController', ['$scope', '$http', '$routeParams', '$filter','$httpParamSerializerJQLike', '$location',
    function ($scope, $http, $routeParams, $filter, $httpParamSerializerJQLike, $location) {
        $scope.contestId = $routeParams.contestId;
        $http.get('/admin/api/campaigns/' + $routeParams.contestId + '/edit').success(function(data) {
            data.start_at = new Date(data.start_at);
            data.end_at = new Date(data.end_at);
            $scope.contest = data;
            $scope.rewards = data.rewards;
        });

        $scope.addReward = function(){
            var position = $scope.rewards.length;
            $scope.rewards[position] = { position: position + 1, name: '', description: '' };
        };
        $scope.removeReward = function(){
            $scope.rewards.pop();
        };

        $scope.update = function(contest, rewards) {
            var data = { contest: contest, rewards: rewards };

            $http.put('/admin/api/campaigns/' + $routeParams.contestId,
                data,
                { 'Content-Type': 'application/x-www-form-urlencoded' }
            ).then(function successCallback(response) {
                    //console.log('successCallback: ');
                    //console.log(response);
                    $scope.message = 'Success';
                    $location.path('campaigns/show/' + data.contest.id);
                    // this callback will be called asynchronously
                    // when the response is available
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        };
    }]);


adminControllers.controller('CampaignGalleryController', ['$scope', 'Upload', '$routeParams', function ($scope, Upload, $routeParams) {
        // upload later on form submit or something similar
        $scope.submit = function() {
            if ($scope.form.files.$valid && $scope.files) {
                $scope.uploadFiles($scope.files);
            }
        };

        // upload on file select or drop
        // $scope.upload = function (file) {
        //     Upload.upload({
        //         url: '/admin/api/campaigns/gallery',
        //         data: {file: file, 'campaignId': $routeParams.id}
        //     }).then(function (resp) {
        //         console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
        //     }, function (resp) {
        //         console.log('Error status: ' + resp.status);
        //     }, function (evt) {
        //         var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
        //         console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        //     });
        // };
        // for multiple files:
        $scope.uploadFiles = function (files) {
            if (files && files.length) {
                for (var i = 0; i < files.length; i++) {
                    Upload.upload({
                        url: '/admin/api/campaigns/gallery',
                        method: 'PUT',
                        data: { file: files[i], 'campaignId': $routeParams.id }
                    });
                }
                // or send them all together for HTML5 browsers:
                // Upload.upload({..., data: {file: files}, ...})...;
            }
        }
    }]);
adminControllers.controller('ContestListController', ['$scope', '$http', '$routeParams', '$location',
    function ($scope, $http, $routeParams, $location) {
        $scope.page = $routeParams.page;

        var getRecords = function () {
            $http.get('/admin/api/contests/?page=' + $routeParams.page).success(function(data) {
                $scope.contests = data.data;

                $scope.totalItems = data.total;
                $scope.currentPage = data.current_page;
                $scope.maxSize = 10;
            });
        };

        getRecords();

        $scope.pageChanged = function() {
            $location.path('/contests/' + $scope.currentPage);
        };

        $scope.orderProp = 'id';

        $scope.delete = function(contest) {
            $http.delete('/admin/api/contests/' + contest.id)
            .success(function(data) {
                $scope.message = data;
                getRecords();
            });
        };
    }]);
adminControllers.controller('ContestDetailController', ['$scope', '$http', '$routeParams',
    function ($scope, $http, $routeParams) {
        $scope.contestId = $routeParams.contestId;
        $http.get('/admin/api/contests/' + $routeParams.contestId).success(function(data) {
            $scope.contest = data.contest;
            $scope.reports = data.reports;
        });
    }]);
adminControllers.controller('ContestCreateController', ['$scope', '$http', '$routeParams', '$filter','$httpParamSerializerJQLike', '$location',
    function ($scope, $http, $routeParams, $filter, $httpParamSerializerJQLike, $location) {
        $scope.contestId = $routeParams.contestId;
        $scope.contest = {
            type: "top_earner",
            start_at: new Date(),
            end_at: new Date()
        };
        $scope.rewards =  [
                { position: 1, name: '', description: '' },
                { position: 2, name: '', description: '' },
                { position: 3, name: '', description: '' }
            ];
        $scope.addReward = function(){
            var position = $scope.rewards.length;
            $scope.rewards[position] = { position: position + 1, name: '', description: '' };
        };
        $scope.removeReward = function(){
            $scope.rewards.pop();
        };
        $scope.create = function(contest, rewards) {
            var data = { contest: contest, rewards: rewards };

            $http.post('/admin/api/contests',
                data,
                { 'Content-Type': 'application/x-www-form-urlencoded' }
            ).then(function successCallback(response) {
                    //console.log('successCallback: ');
                    //console.log(response);
                    $scope.message = "Success";
                    $location.url('contests');
                    // this callback will be called asynchronously
                    // when the response is available
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });

        };
    }]);
adminControllers.controller('ContestEditController', ['$scope', '$http', '$routeParams', '$filter','$httpParamSerializerJQLike', '$location',
    function ($scope, $http, $routeParams, $filter, $httpParamSerializerJQLike, $location) {
        $scope.contestId = $routeParams.contestId;
        $http.get('/admin/api/contests/' + $routeParams.contestId + '/edit').success(function(data) {
            data.start_at = new Date(data.start_at);
            data.end_at = new Date(data.end_at);
            $scope.contest = data;
            $scope.rewards = data.rewards;
        });

        $scope.addReward = function(){
            var position = $scope.rewards.length;
            $scope.rewards[position] = { position: position + 1, name: '', description: '' };
        };
        $scope.removeReward = function(){
            $scope.rewards.pop();
        };

        $scope.update = function(contest, rewards) {
            var data = { contest: contest, rewards: rewards };

            $http.put('/admin/api/contests/' + $routeParams.contestId,
                data,
                { 'Content-Type': 'application/x-www-form-urlencoded' }
            ).then(function successCallback(response) {
                    //console.log('successCallback: ');
                    //console.log(response);
                    $scope.message = 'Success';
                    $location.path('contests/show/' + data.contest.id);
                    // this callback will be called asynchronously
                    // when the response is available
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        };
    }]);
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
adminControllers.controller('PublisherListController', ['$scope', '$http', '$routeParams', '$location',
    function ($scope, $http, $routeParams, $location) {
        $scope.page = 1;

        $scope.getRecords = function(page, search, search_by, order_by, order){
            $scope.page = typeof page !== 'undefined' ? page : $scope.page;
            $scope.search = typeof search !== 'undefined' ? search : '';
            $scope.search_by = typeof search_by !== 'undefined' ? search_by : 'id';
            $scope.order = typeof order !== 'undefined' ? order : 'dsc';
            $scope.order_by = typeof order_by !== 'undefined' ? order_by : 'id';

            if($routeParams.page == 'my'){
                $scope.my = true;
            } else {
                $scope.my = false;
            }
            if($routeParams.page == 'status'){
                $scope.status = true;
            } else {
                $scope.status = false;
            }

            $http.get('/admin/api/publishers/?status=' + $scope.status + '&page=' + $scope.page + '&my=' + $scope.my + '&search=' + $scope.search + '&search_by=' + $scope.search_by + '&order_by=' + $scope.order_by + '&order=' + $scope.order).success(function(data) {
                $scope.publishers = data.data;
                $scope.totalItems = data.total;
                $scope.currentPage = data.current_page;
                $scope.maxSize = 10;
            });

        };

        $scope.getRecords($scope.page);

        $scope.pageChanged = function() {
            $scope.page = $scope.currentPage;
            $scope.getRecords($scope.page, $scope.search, $scope.search_by, $scope.order_by, $scope.order);
        };

        $scope.searchRecords = function(query, search_by, order_by, order) {
            $scope.search = typeof query !== 'undefined' ? query : '';
            $scope.search_by = typeof search_by !== 'undefined' ? search_by : 'id';
            $scope.order = typeof order !== 'undefined' ? order : 'dsc';
            $scope.order_by = typeof order_by !== 'undefined' ? order_by : 'id';

            $scope.getRecords($scope.page, $scope.search, $scope.search_by, $scope.order_by, $scope.order);
        };
    }]);

adminControllers.controller('PublisherDetailController', ['$scope', '$http', '$routeParams', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $httpParamSerializerJQLike) {
        $scope.userId = $routeParams.userId;
        $http.get('/admin/api/publishers/' + $routeParams.userId).success(function(data) {
            $scope.user = data;
        });

        $scope.approval = function(status) {
            $http({
                method  : 'POST',
                url     : '/admin/api/publishers/approval/' + $routeParams.userId,
                data    : $httpParamSerializerJQLike({ approve: status }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    // if successful, bind success message to message
                    $scope.user.user.approved = status;
                });

        };
    }]);
adminControllers.controller('PublisherEditController', ['$scope', '$http', '$routeParams', '$httpParamSerializerJQLike',
    function ($scope, $http, $routeParams, $httpParamSerializerJQLike) {
        $scope.userId = $routeParams.userId;
        $http.get('/admin/api/publishers/' + $routeParams.userId + '/edit').success(function(data) {
            $scope.user = data;
        });

        $scope.update = function(user) {
            $http({
                method  : 'PUT',
                url     : '/admin/api/publishers/' + user.user.id,
                data    : $httpParamSerializerJQLike(user),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    // if successful, bind success message to message
                    $scope.message = data;
                });

        };
    }]);
adminControllers.controller('ReportListController', ['$scope', '$http', '$routeParams', '$location',
    function ($scope, $http, $routeParams, $location) {
        $scope.page = 1;

        $scope.getRecords = function(page, search, search_by, order_by, order){
            $scope.page = typeof page !== 'undefined' ? page : $scope.page;
            $scope.search = typeof search !== 'undefined' ? search : '';
            $scope.search_by = typeof search_by !== 'undefined' ? search_by : 'reports.id';
            $scope.order = typeof order !== 'undefined' ? order : 'dsc';
            $scope.order_by = typeof order_by !== 'undefined' ? order_by : 'reports.id';

            $http.get('/admin/api/reports/?page=' + $scope.page + '&search=' + $scope.search + '&search_by=' + $scope.search_by + '&order_by=' + $scope.order_by + '&order=' + $scope.order).success(function(data) {
                $scope.reports = data.data;
                $scope.totalItems = data.total;
                $scope.currentPage = data.current_page;
                $scope.maxSize = 10;
                $scope.itemsPerPage = data.per_page;
            });

        };

        $scope.getRecords($scope.page);

        $scope.pageChanged = function() {
            $scope.page = $scope.currentPage;
            $scope.getRecords($scope.page, $scope.search, $scope.search_by, $scope.order_by, $scope.order);
        };

        $scope.searchRecords = function(query, search_by, order_by, order) {
            $scope.search = typeof query !== 'undefined' ? query : '';
            $scope.search_by = typeof search_by !== 'undefined' ? search_by : 'id';
            $scope.order = typeof order !== 'undefined' ? order : 'dsc';
            $scope.order_by = typeof order_by !== 'undefined' ? order_by : 'id';

            $scope.getRecords($scope.page, $scope.search, $scope.search_by, $scope.order_by, $scope.order);
        };


        $scope.update = function(id, status) {
            var data = {status: status};

            $http.put('/admin/api/reports/' + id,
                data,
                {'Content-Type': 'application/x-www-form-urlencoded'}
            ).then(function successCallback(response) {
                    $scope.message = 'success';
                    for(var i = 0; i < $scope.reports.length; i++) {
                        if($scope.reports[i].id === id) {
                            $scope.reports[i].status = parseInt( response.data );
                            return true;
                        }
                    }
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
                });
        };


        $scope.destroy = function(id) {
            $http.delete('/admin/api/reports/' + id).then(function successCallback(response) {
                if(response.data == 'success') {
                    for(var i = 0; i < $scope.reports.length; i++) {
                        if($scope.reports[i].id === id) {
                            $scope.getRecords($scope.page);
                            return true;
                        }
                    }
                }
            }, function errorCallback(response) {
                console.log('errorCallback: ');
                console.log(response);
                $scope.message = "Something goes wrong. For more info check console logs.";
            });
        };

    }]);

adminControllers.controller('ReportDetailController', ['$scope', '$http', '$routeParams', '$location',
    function ($scope, $http, $routeParams, $location) {
        $scope.reportId = $routeParams.reportId;
        $http.get('/admin/api/reports/' + $routeParams.reportId).success(function(data) {
            $scope.report = data;
        });

        $scope.update = function(id, status) {
            var data = {status: status};

            $http.put('/admin/api/reports/' + id,
                data,
                {'Content-Type': 'application/x-www-form-urlencoded'}
            ).then(function successCallback(response) {
                    $scope.message = 'success';
                    $scope.report.status = parseInt( response.data );
                }, function errorCallback(response) {
                    console.log('errorCallback: ');
                    console.log(response);
                    $scope.message = "Something goes wrong. For more info check console logs.";
                });
        };

        $scope.destroy = function(id) {
            $http.delete('/admin/api/reports/' + id).then(function successCallback(response) {
                if(response.data == 'success') {
                    $location.url('reports');
                }
            }, function errorCallback(response) {
                console.log('errorCallback: ');
                console.log(response);
                $scope.message = "Something goes wrong. For more info check console logs.";
            });
        };
    }]);
adminControllers.controller('StatsController', ['$scope', '$http', '$interval', '$routeParams', '$rootScope',
    function($scope, $http, $interval, $routeParams, $rootScope) {

        $scope.getStats = function() {
            $http.get('/admin/api/stats').
                then(function (response) {
                    // this callback will be called asynchronously
                    // when the response is available
                    $scope.stats = response.data;
                }, function (response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                    $scope.stats = response.data;
                });
        };

        $scope.getStats(); // Get stats on start of page

        $scope.stop = $interval(operation, 10000);

        // Stop If location is changed
        var dereg = $rootScope.$on('$locationChangeSuccess', function() {
            $interval.cancel($scope.stop);
            dereg();
        });

        function operation() { $scope.getStats(); }

    }]);
//# sourceMappingURL=angular.js.map

//# sourceMappingURL=admin-angular.js.map
