var app=angular.module("admin",["ui.bootstrap","ngRoute","ngSanitize","ui.select","adminControllers","ngFileUpload"]);app.config(function(e){e.theme="bootstrap"});var adminControllers=angular.module("adminControllers",[]);app.config(["$interpolateProvider","$routeProvider",function(e,t){e.startSymbol("<%"),e.endSymbol("%>"),t.when("/stats",{templateUrl:"/build/assets/js/partials/admin/stats.html",controller:"StatsController"}).when("/publishers/create",{templateUrl:"/build/assets/js/partials/admin/publishers/create.html",controller:"PublisherCreateController"}).when("/publishers/:page?",{templateUrl:"/build/assets/js/partials/admin/publishers/index.html",controller:"PublisherListController"}).when("/publishers/show/:userId",{templateUrl:"/build/assets/js/partials/admin/publishers/show.html",controller:"PublisherDetailController"}).when("/publishers/edit/:userId",{templateUrl:"/build/assets/js/partials/admin/publishers/edit.html",controller:"PublisherEditController"}).when("/socialaccounts/:page?",{templateUrl:"/build/assets/js/partials/admin/socialaccounts/index.html",controller:"SocialAccountListController"}).when("/contests/create/",{templateUrl:"/build/assets/js/partials/admin/contests/create.html",controller:"ContestCreateController"}).when("/socialaccounts/show/:socialId/",{templateUrl:"/build/assets/js/partials/admin/socialaccounts/show.html",controller:"SocialAccountDetailController"}).when("/contests/:page?",{templateUrl:"/build/assets/js/partials/admin/contests/index.html",controller:"ContestListController"}).when("/contests/show/:contestId",{templateUrl:"/build/assets/js/partials/admin/contests/show.html",controller:"ContestDetailController"}).when("/contests/edit/:contestId",{templateUrl:"/build/assets/js/partials/admin/contests/edit.html",controller:"ContestEditController"}).when("/reports/:page?",{templateUrl:"/build/assets/js/partials/admin/reports/index.html",controller:"ReportListController"}).when("/campaigns/gallery/:id?",{templateUrl:"/build/assets/js/partials/admin/campaigns/gallery.html",controller:"CampaignGalleryController"}).when("/campaigns/create",{templateUrl:"/build/assets/js/partials/admin/campaigns/create.html",controller:"CampaignCreateController"}).when("/campaigns/:page?",{templateUrl:"/build/assets/js/partials/admin/campaigns/index.html",controller:"CampaignListController"}).when("/reports/show/:reportId",{templateUrl:"/build/assets/js/partials/admin/reports/show.html",controller:"ReportDetailController"}).when("/campaigns/show/:campaignId",{templateUrl:"/build/assets/js/partials/admin/campaigns/show.html",controller:"CampaignDetailController"}).when("/campaigns/edit/:campaignId",{templateUrl:"/build/assets/js/partials/admin/campaigns/edit.html",controller:"CampaignEditController"}).otherwise({redirectTo:"/stats"})}]),adminControllers.controller("CampaignListController",["$scope","$http","$routeParams","$location",function(e,t,o,r){e.page=1,e.getRecords=function(o,r,a,n,s){e.page="undefined"!=typeof o?o:e.page,e.search="undefined"!=typeof r?r:"",e.search_by="undefined"!=typeof a?a:"id",e.order="undefined"!=typeof s?s:"asc",e.order_by="undefined"!=typeof n?n:"active",t.get("/api/admin/campaigns/?page="+e.page+"&search="+e.search+"&search_by="+e.search_by+"&order_by="+e.order_by+"&order="+e.order).then(function(t){e.campaigns=t.data.data,e.totalItems=t.data.total,e.currentPage=t.data.current_page,e.maxSize=10},function(t){e.message="Something goes wrong. For more info check console logs."})},e.getRecords(e.page),e.pageChanged=function(){e.page=e.currentPage,e.getRecords(e.page,e.search,e.search_by,e.order_by,e.order)},e.searchRecords=function(t,o,r,a){e.search="undefined"!=typeof t?t:"",e.search_by="undefined"!=typeof o?o:"id",e.order="undefined"!=typeof a?a:"dsc",e.order_by="undefined"!=typeof r?r:"id",e.getRecords(e.page,e.search,e.search_by,e.order_by,e.order)}}]),adminControllers.controller("CampaignDetailController",["$scope","$http","$routeParams",function(e,t,o){e.contestId=o.contestId,t.get("/api/admin/contests/"+o.contestId).success(function(t){e.contest=t.contest,e.reports=t.reports})}]),adminControllers.controller("CampaignCreateController",["$scope","$http","$filter","$location",function(e,t,o,r){t.get("/api/admin/campaigns/create").then(function(t){e.campaign_categories=t.data.campaign_categories,e.countries=t.data.countries,e.networks=t.data.networks},function(t){e.message="Something goes wrong. For more info check console logs."}),e.contest={type:"top_earner",start_at:new Date,end_at:new Date},e.targets=[{position:1,name:"",description:""},{position:2,name:"",description:""},{position:3,name:"",description:""}],e.addTarget=function(){var t=e.rewards.length;e.rewards[t]={position:t+1,name:"",description:""}},e.removeTarget=function(){e.rewards.pop()},e.create=function(o,r){var a={campaign:o,targets:r};t.post("/api/admin/campaigns",a,{"Content-Type":"application/x-www-form-urlencoded"}).then(function(t){e.message="Success"},function(t){e.message="Something goes wrong. For more info check console logs."})}}]),adminControllers.controller("CampaignEditController",["$scope","$http","$routeParams","$filter","$httpParamSerializerJQLike","$location",function(e,t,o,r,a,n){e.contestId=o.contestId,t.get("/api/admin/campaigns/"+o.contestId+"/edit").success(function(t){t.start_at=new Date(t.start_at),t.end_at=new Date(t.end_at),e.contest=t,e.rewards=t.rewards}),e.addReward=function(){var t=e.rewards.length;e.rewards[t]={position:t+1,name:"",description:""}},e.removeReward=function(){e.rewards.pop()},e.update=function(r,a){var s={contest:r,rewards:a};t.put("/api/admin/campaigns/"+o.contestId,s,{"Content-Type":"application/x-www-form-urlencoded"}).then(function(t){e.message="Success",n.path("campaigns/show/"+s.contest.id)},function(t){e.message="Something goes wrong. For more info check console logs."})}}]),adminControllers.controller("CampaignGalleryController",["$scope","Upload","$routeParams",function(e,t,o){e.submit=function(){e.form.files.$valid&&e.files&&e.uploadFiles(e.files)},e.uploadFiles=function(e){if(e&&e.length)for(var r=0;r<e.length;r++)t.upload({url:"/api/admin/campaigns/gallery",method:"PUT",data:{file:e[r],campaignId:o.id}})}}]),adminControllers.controller("ContestListController",["$scope","$http","$routeParams","$location",function(e,t,o,r){e.page=o.page;var a=function(){t.get("/api/admin/contests/?page="+o.page).success(function(t){e.contests=t.data,e.totalItems=t.total,e.currentPage=t.current_page,e.maxSize=10})};a(),e.pageChanged=function(){r.path("/contests/"+e.currentPage)},e.orderProp="id",e["delete"]=function(o){t["delete"]("/api/admin/contests/"+o.id).success(function(t){e.message=t,a()})}}]),adminControllers.controller("ContestDetailController",["$scope","$http","$routeParams",function(e,t,o){e.contestId=o.contestId,t.get("/api/admin/contests/"+o.contestId).success(function(t){e.contest=t.contest,e.reports=t.reports})}]),adminControllers.controller("ContestCreateController",["$scope","$http","$routeParams","$filter","$httpParamSerializerJQLike","$location",function(e,t,o,r,a,n){e.contestId=o.contestId,e.contest={type:"top_earner",start_at:new Date,end_at:new Date},e.rewards=[{position:1,name:"",description:""},{position:2,name:"",description:""},{position:3,name:"",description:""}],e.addReward=function(){var t=e.rewards.length;e.rewards[t]={position:t+1,name:"",description:""}},e.removeReward=function(){e.rewards.pop()},e.create=function(o,r){var a={contest:o,rewards:r};t.post("/api/admin/contests",a,{"Content-Type":"application/x-www-form-urlencoded"}).then(function(t){e.message="Success",n.url("contests")},function(t){e.message="Something goes wrong. For more info check console logs."})}}]),adminControllers.controller("ContestEditController",["$scope","$http","$routeParams","$filter","$httpParamSerializerJQLike","$location",function(e,t,o,r,a,n){e.contestId=o.contestId,t.get("/api/admin/contests/"+o.contestId+"/edit").success(function(t){t.start_at=new Date(t.start_at),t.end_at=new Date(t.end_at),e.contest=t,e.rewards=t.rewards}),e.addReward=function(){var t=e.rewards.length;e.rewards[t]={position:t+1,name:"",description:""}},e.removeReward=function(){e.rewards.pop()},e.update=function(r,a){var s={contest:r,rewards:a};t.put("/api/admin/contests/"+o.contestId,s,{"Content-Type":"application/x-www-form-urlencoded"}).then(function(t){e.message="Success",n.path("contests/show/"+s.contest.id)},function(t){e.message="Something goes wrong. For more info check console logs."})}}]),adminControllers.controller("PublisherListController",["$scope","$http","$routeParams","$location",function(e,t,o,r){e.page=1,e.getRecords=function(r,a,n,s,i){e.page="undefined"!=typeof r?r:e.page,e.search="undefined"!=typeof a?a:"",e.search_by="undefined"!=typeof n?n:"id",e.order="undefined"!=typeof i?i:"dsc",e.order_by="undefined"!=typeof s?s:"id","my"==o.page?e.my=!0:e.my=!1,"status"==o.page?e.status=!0:e.status=!1,t.get("/api/admin/publishers/?status="+e.status+"&page="+e.page+"&my="+e.my+"&search="+e.search+"&search_by="+e.search_by+"&order_by="+e.order_by+"&order="+e.order).success(function(t){e.publishers=t.data,e.totalItems=t.total,e.currentPage=t.current_page,e.maxSize=10})},e.getRecords(e.page),e.pageChanged=function(){e.page=e.currentPage,e.getRecords(e.page,e.search,e.search_by,e.order_by,e.order)},e.searchRecords=function(t,o,r,a){e.search="undefined"!=typeof t?t:"",e.search_by="undefined"!=typeof o?o:"id",e.order="undefined"!=typeof a?a:"dsc",e.order_by="undefined"!=typeof r?r:"id",e.getRecords(e.page,e.search,e.search_by,e.order_by,e.order)}}]),adminControllers.controller("PublisherDetailController",["$scope","$http","$routeParams","$httpParamSerializerJQLike",function(e,t,o,r){e.userId=o.userId,t.get("/api/admin/publishers/"+o.userId).success(function(t){e.user=t}),e.approval=function(a){t({method:"POST",url:"/api/admin/publishers/approval/"+o.userId,data:r({approve:a}),headers:{"Content-Type":"application/x-www-form-urlencoded"}}).success(function(t){e.user.user.approved=a})}}]),adminControllers.controller("PublisherEditController",["$scope","$http","$routeParams","$httpParamSerializerJQLike",function(e,t,o,r){e.userId=o.userId,t.get("/api/admin/publishers/"+o.userId+"/edit").success(function(t){e.user=t}),e.update=function(o){t({method:"PUT",url:"/api/admin/publishers/"+o.user.id,data:r(o),headers:{"Content-Type":"application/x-www-form-urlencoded"}}).success(function(t){e.message=t})}}]),adminControllers.controller("PublisherCreateController",["$scope","$http","$routeParams","$httpParamSerializerJQLike",function(e,t,o,r){e.userId=o.userId,e.user={},e.user.socialAccounts={},e.create=function(o){t({method:"POST",url:"/api/admin/publishers/",data:r(o),headers:{"Content-Type":"application/x-www-form-urlencoded"}}).success(function(t){e.message=t})}}]),adminControllers.controller("ReportListController",["$scope","$http","$routeParams","$location",function(e,t,o,r){e.page=1,e.getRecords=function(o,r,a,n,s){e.page="undefined"!=typeof o?o:e.page,e.search="undefined"!=typeof r?r:"",e.search_by="undefined"!=typeof a?a:"reports.id",e.order="undefined"!=typeof s?s:"dsc",e.order_by="undefined"!=typeof n?n:"reports.id",t.get("/api/admin/reports/?page="+e.page+"&search="+e.search+"&search_by="+e.search_by+"&order_by="+e.order_by+"&order="+e.order).success(function(t){e.reports=t.data,e.totalItems=t.total,e.currentPage=t.current_page,e.maxSize=10,e.itemsPerPage=t.per_page})},e.getRecords(e.page),e.pageChanged=function(){e.page=e.currentPage,e.getRecords(e.page,e.search,e.search_by,e.order_by,e.order)},e.searchRecords=function(t,o,r,a){e.search="undefined"!=typeof t?t:"",e.search_by="undefined"!=typeof o?o:"id",e.order="undefined"!=typeof a?a:"dsc",e.order_by="undefined"!=typeof r?r:"id",e.getRecords(e.page,e.search,e.search_by,e.order_by,e.order)},e.update=function(o,r){var a={status:r};t.put("/api/admin/reports/"+o,a,{"Content-Type":"application/x-www-form-urlencoded"}).then(function(t){e.message="success";for(var r=0;r<e.reports.length;r++)if(e.reports[r].id===o)return e.reports[r].status=parseInt(t.data),!0},function(t){e.message="Something goes wrong. For more info check console logs."})},e.destroy=function(o){t["delete"]("/api/admin/reports/"+o).then(function(t){if("success"==t.data)for(var r=0;r<e.reports.length;r++)if(e.reports[r].id===o)return e.getRecords(e.page),!0},function(t){e.message="Something goes wrong. For more info check console logs."})}}]),adminControllers.controller("ReportDetailController",["$scope","$http","$routeParams","$location",function(e,t,o,r){e.reportId=o.reportId,t.get("/api/admin/reports/"+o.reportId).success(function(t){e.report=t}),e.update=function(o,r){var a={status:r};t.put("/api/admin/reports/"+o,a,{"Content-Type":"application/x-www-form-urlencoded"}).then(function(t){e.message="success",e.report.status=parseInt(t.data)},function(t){e.message="Something goes wrong. For more info check console logs."})},e.destroy=function(o){t["delete"]("/api/admin/reports/"+o).then(function(e){"success"==e.data&&r.url("reports")},function(t){e.message="Something goes wrong. For more info check console logs."})}}]),adminControllers.controller("SocialAccountListController",["$scope","$http","$routeParams","$location","$httpParamSerializerJQLike",function(e,t,o,r,a){e.page=o.page,t.get("/api/admin/socialaccounts/?page="+o.page).success(function(t){e.socialaccounts=t.data,e.totalItems=t.total,e.currentPage=t.current_page,e.maxSize=10}),e.pageChanged=function(){r.path("/socialaccounts/"+e.currentPage)},e.orderProp="id",e.approval=function(o,r){t({method:"POST",url:"/api/admin/socialaccounts/approval/"+o,data:a({approve:r}),headers:{"Content-Type":"application/x-www-form-urlencoded"}}).success(function(t){for(var a=0;a<e.socialaccounts.length;a++)if(e.socialaccounts[a].account_id===o)return e.socialaccounts[a].approved=r,!0})}}]),adminControllers.controller("SocialAccountDetailController",["$scope","$http","$routeParams","$httpParamSerializerJQLike",function(e,t,o,r){e.socialId=o.socialId,t.get("/api/admin/socialaccounts/"+o.socialId).success(function(t){e.socialAccount=t}),e.approval=function(a){t({method:"POST",url:"/api/admin/socialaccounts/approval/"+o.socialId,data:r({approve:a}),headers:{"Content-Type":"application/x-www-form-urlencoded"}}).success(function(t){e.socialAccount.approved=a})}}]),adminControllers.controller("SocialPostsListController",["$scope","$http","$routeParams","$location","$httpParamSerializerJQLike",function(e,t,o,r,a){e.page=o.page,t.get("/api/admin/socialposts/?page="+o.page).success(function(t){e.socialaccounts=t.data,e.totalItems=t.total,e.currentPage=t.current_page,e.maxSize=10}),e.pageChanged=function(){r.path("/socialposts/"+e.currentPage)},e.orderProp="id"}]),adminControllers.controller("SocialPostsDetailController",["$scope","$http","$routeParams","$httpParamSerializerJQLike",function(e,t,o,r){e.igId=o.igId,t.get("/api/admin/socialaccounts/"+o.igId).success(function(t){e.ig=t})}]),adminControllers.controller("StatsController",["$scope","$http","$interval","$routeParams","$rootScope",function(e,t,o,r,a){function n(){e.getStats()}e.getStats=function(){t.get("/api/admin/stats").then(function(t){e.stats=t.data},function(t){e.stats=t.data})},e.getStats(),e.stop=o(n,1e4);var s=a.$on("$locationChangeSuccess",function(){o.cancel(e.stop),s()})}]);