/**
 * Author : Shehan Fernando
 * Module : Common application javascripts
 * Date   : 2017-11-03
 */
var app = angular.module('yukon', ['ngRoute','controllers']);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});