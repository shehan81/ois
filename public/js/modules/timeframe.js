/**
 * Author : Shehan Fernando
 * Module : Subject
 * Date   : 2017-10-28
 */
(function ($) {
    var Timeframe = {
        init: function () {
            var self = this;
            self.list();
            
            if(is_edit)
                self.create();
        },
        list: function () {
            //init data table
            var tbl = $('#time-table');
            tbl.DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: 'timeframe',
                columns: [
                    {data: 'timeframe_id', name: 'timeframe_id', visible: false},
                    {data: 'from', name: 'from'},
                    {data: 'to', name: 'to'},
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
            //init time picker
            $('.timepicker').timepicker({
                showInputs: false,
                showMeridian: true,
                minuteStep : 30,
                defaultTime : '08:00 AM'
            })
        }
    }

    Timeframe.init();

})(jQuery);

    