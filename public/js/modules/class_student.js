/**
 * Author : Shehan Fernando
 * Module : Instructor
 * Date   : 2017-11-06
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
                ajax: {
                    url : 'student',
                    data : function (d) {
                        d.class_id = _id;
                    }
                },
                columns: [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'student_id', name: 'student_id'},
                    {data: 'student_name', name: 'student_name'},
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





    