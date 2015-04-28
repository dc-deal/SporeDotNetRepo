/**
 * Created by Franky on 09.04.2015.
 * angular written core module fore thespore.net
 */
(function() {
	'use strict';
	angular.module('mainApp', ['ngRoute'])
	.directive('wrapperMain', function(){
            return {
                restrict: 'E',
                templateUrl: 'templates/wrapper.html',
                scope: {
                	genres: '='
                }
            };
    });
})();
