/**
 * Author : Shehan Fernando
 * Module : Common application javascripts
 * Date   : 2017-11-03
 */
var app = angular.module('yukon', ['ngRoute', 'controllers']);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

(function ($) {
    $.fn.loader = function (state) {
        var div = $('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        
        //extending params
        var settings = $.extend({
            show : false, //default value
        }, {show : state});
        
        if(settings.show){
            return this.prepend(div);    
        }else{
            this.find('.overlay').remove();
        }
    };
}(jQuery));

