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
   
//   scope.data = false;
//   var params = {};
//   var promise = service.list(params).$promise;
//        promise.then(function (response) {
//            scope.data = response.data;
//        });

            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'instructor',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        
}])