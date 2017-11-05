/**
 * Author : Shehan Fernando
 * Module : Instructor
 * Date   : 2017-10-27
 */
(function ($) {
    var Student = {
        init: function () {
            var self = this;
            self.list();
        },
        list: function () {
            //init data table
            var tbl = $('#student-table');
            tbl.DataTable({
                processing: true,
                serverSide: true,
                ajax: 'student',
                columns: [
                    {data: 'student_id', name: 'student_id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
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

    Student.init();
    
})(jQuery);





    