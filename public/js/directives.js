angular.module('ois.directives', [])
    .directive('yukonDataTable', ['$timeout', function (timeout) {
            return {
                link: function (scope, element, attr, model) {
                    
                    if (!jQuery().DataTable()) {
                        return;
                    }

                    $(element).DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': false,
                        'ordering': true,
                        'info': true,
                        'autoWidth': false
                    })
                }
            };
    }]);