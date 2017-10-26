var app = angular.module('yukon', [
    'ngResource',
    'ois.directives',
    'ois.instructors',
], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

//injecting headers for ajax requests
app.config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    }]);