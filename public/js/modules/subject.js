/**
 * Author : Shehan Fernando
 * Module : Subject
 * Date   : 2017-10-28
 */
(function ($) {
    var Instructor = {
        init: function () {
            var self = this;
            self.list();
        },
        list: function () {
            //init data table
            var tbl = $('#subject-table');
            tbl.DataTable({
                processing: true,
                serverSide: true,
                ajax: 'subject',
                columns: [
                    {data: 'subject_id', name: 'subject_id', visible:false},
                    {data: 'code', name: 'code'},
                    {data: 'title', name: 'title'},
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





    