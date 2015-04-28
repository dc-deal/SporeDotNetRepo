/**
 * Created by Franky on 09.04.2015.
 * angular written core module fore thespore.net
 */
(function() {
	'use strict';
	angular.module('mainApp', ['ngRoute'])
	.controller('menuController', function() {
	})
	.directive('mainMenudir', function() {
		return {
			restrict : 'E',
			templateUrl : 'templates/menus/mainmenu/mainmenu.html',
			scope : {
				genres : '='
			}
		}
    }).controller('homeController',function() {
    	
	})    
    .config(function($routeProvider) {
		var home = {
			templateUrl : 'templates/home/home.html',
			controller: 'homeController'
		}
		
		$routeProvider
		.when('/home', home)
		.when('/thbandconfig', {
			templateUrl : 'templates/theband/theband.html'})
		.when('/newsconfig', {
			templateUrl : 'templates/news/news.html'})	
		.when('/', home)
		.otherwise({
			redirectTo : '/'})
	});
})();
