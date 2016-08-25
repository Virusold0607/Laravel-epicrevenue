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

