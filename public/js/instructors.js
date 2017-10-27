var module = angular.module('ois.instructors', ['ngResource']);
module.factory('instructorService', ['$resource', function (resource) {
        return resource('/instructor/:action', {},
                {
                    list: {
                        method: "GET",
                        params: {
                            action: ''
                        }
                    }
                });

    }]);

module.controller('instuctorListCtrl', ['$scope', 'instructorService', '$http', function (scope, service, $http) {
        
        $('#instructors-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'instructor',
            columns: [
                {data: 'instructor_id', name: 'instructor_id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
                
            ]
        });

    }])