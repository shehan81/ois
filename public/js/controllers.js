var app = angular.module('controllers', []);

app.controller('scheduleController', ['$scope', '$http', '$routeParams', '$location', function ($scope, $http, $routeParams, $location) {

        $scope.schedule = {};

        $http.get('/api/schedule/days', {
            params: {
            }
        }).then(function successCallback(response) {
            if (response.data) {
                $scope.weekdays = response.data;
            }
        }, function errorCallback(error) {
            //todo
        });


        //on change event func to get avaialbe timeframes
        $scope.getTimeFrames = function () {
            $http.get('/api/schedule/timeframes', {
                params: {
                    day: $scope.schedule.day
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
                params: {
                    day: $scope.schedule.day,
                    exclude: $scope.schedule.exclude
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
                params: {
                    subject: $scope.schedule.subject_id
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

app.controller('assignController', ['$scope', '$http', '$routeParams', '$location', function ($scope, $http, $routeParams, $location) {

        $scope.schedule = {};

        $http.get('/api/schedule/days', {
            params: {
            }
        }).then(function successCallback(response) {
            if (response.data) {
                $scope.weekdays = response.data;
            }
        }, function errorCallback(error) {
            //todo
        });


        //on change event func to get avaialbe timeframes
        $scope.getTimeFrames = function () {
            $http.get('/api/schedule/get/timeframes', {
                params: {
                    day: $scope.schedule.day
                }
            }).then(function successCallback(response) {
                if (response.data) {
                    $scope.timeframes = response.data;
                }
            }, function errorCallback(error) {
                //todo
            });
        };
        
        //get classes
        $scope.getClasses = function () {
            $http.get('/api/schedule/get/classes', {
                params: {
                    day: $scope.schedule.day,
                    timeframe_id : $scope.schedule.timeframe_id
                }
            }).then(function successCallback(response) {
                if (response.data) {
                    $scope.classes = response.data;
                }
            }, function errorCallback(error) {
                //todo
            });
        };
        
        //get students
        $scope.getStudents = function () {
            if($scope.schedule.class_id){
                $http.get('/api/schedule/get/students', {
                    params: {
                        day: $scope.schedule.day,
                        timeframe_id : $scope.schedule.timeframe_id,
                        class_id : $scope.schedule.class_id
                    }
                    }).then(function successCallback(response) {
                        if (response.data) {
                            $scope.students = response.data;
                        }
                    }, function errorCallback(error) {
                        //todo
                });
            }
        };
        
        //watch on class
        $scope.$watch('schedule.class_id', function() {
            if($scope.schedule.class_id == ''){
                $scope.students = [];
            }
        });
    }]);