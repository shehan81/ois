var app = angular.module('controllers', []);

app.controller('scheduleController', ['$scope', '$http', '$routeParams', '$location', function ($scope, $http, $routeParams, $location) {
        
        

        $http.get('/api/schedule/days').then(function successCallback(response) {
            if (response.data) {
                $scope.weekdays = response.data;
            }
        }, function errorCallback(error) {
            //todo
        });


        //on change event func to get avaialbe timeframes
        $scope.getTimeFrames = function () {
            $http.get('/api/schedule/timeframes', {
                params : {
                    day : $scope.day
                }
            }).then(function successCallback(response) {
                if (response.data) {
                    $scope.timeframes = response.data;
                }
            }, function errorCallback(error) {
                //todo
            });
        };
        
        //get subjects
        $scope.getSubjects = function () {
            $http.get('/api/schedule/subjects', {
                params : {
                    day : $scope.day,
                    exclude : $scope.exclude
                }
            }).then(function successCallback(response) {
                if (response.data) {
                    $scope.subjects = response.data;
                }
            }, function errorCallback(error) {
                //todo
            });
        };
        
        //get instructors
        $scope.getInstructors = function () {
            $http.get('/api/schedule/instructors', {
                params : {
                    subject : $scope.subject_id
                }
            }).then(function successCallback(response) {
                if (response.data) {
                    $scope.instructors = response.data;
                }
            }, function errorCallback(error) {
                //todo
            });
        };

    }]);