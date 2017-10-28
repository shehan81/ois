/**
 * Author : Shehan Fernando
 * Module : Instructor
 * Date   : 2017-10-27
 */
(function ($) {
    var Instructor = {
        init: function () {
            var self = this;
            self.list();
        },
        list: function () {
            //init data table
            var tbl = $('#instructors-table');
            tbl.DataTable({
                processing: true,
                serverSide: true,
                ajax: 'instructor',
                columns: [
                    {data: 'instructor_id', name: 'instructor_id', visible:false},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            
            //delete confirm deligation
            tbl.delegate(".confirmation-callback", "click", function ($e) {
                if (!confirm(trans_del)) {
                    $e.preventDefault();
                    return false;
                }
            });
        }
    }

    Instructor.init();
    
})(jQuery);





    