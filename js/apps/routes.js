/**
 * Created by Franky on 09.04.2015.
 * angular written  module for my routes
 */
angular.module('mainApp')	
.config(function($routeProvider) {
		var home = {
			templateUrl : 'templates/pages/home/home.html',
			controller: 'showAllArticlesController',
			controllerAs: 'artCtrl'
		};
		
		$routeProvider
		.when('/home', home)
		.when('/home/:articleid',{
			templateUrl : 'templates/pages/home/showarticle.html',
			controller:'showArticleController'
			,controllerAs:'showArtCtrl'
		})
		.when('/band', {
			templateUrl : 'templates/pages/theband/theband.html',
			controller:'bandpanelController'
		}).when('/band/:id', { // route parameter pass in
			templateUrl : 'templates/pages/theband/show.html',
			controller:'bandpanelShowController'
		})	
		.when('/music', {
			templateUrl : 'templates/pages/ourmusic/ourmusic.html'
		}).when('/story', {
			templateUrl : 'templates/pages/thestory/thestory.html'
		}).when('/shop', {
			templateUrl : 'templates/pages/shop/articles.html'
		}).when('/impressum', {
			templateUrl : 'templates/pages/impressum/impressum.html'
		}).when('/philosophy', {
			templateUrl : 'templates/pages/philosophy/philosophy.html'
		}).when('/', home)
		.otherwise({
			redirectTo : '/'
		});
	});
