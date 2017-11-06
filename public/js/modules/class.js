/**
 * Author : Shehan Fernando
 * Module : Instructor
 * Date   : 2017-11-02
 */
(function ($) {
    var ClassSchedule = {
        init: function () {
            var self = this;
            self.list();

            if (is_edit)
                self.create();
        },
        list: function () {

            //init data table
            var tbl = $('#class-table');
            tbl.DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: 'class',
                columns: [
                    {data: 'class_id', name: 'class_id', visible: false},
                    {data: 'day', name: 'day'},
                    {data: 'timeframe_id', name: 'timeframe_id'},
                    {data: 'subject_id', name: 'subject_id'},
                    {data: 'instructor_id', name: 'instructor_id'},
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
        },
        create: function () {
            
        }
    }

    ClassSchedule.init();

})(jQuery);





    