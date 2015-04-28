(function() {
	angular.module('mainApp')
	.controller('showAllArticlesController', function($http){
		// news holen...
		var controller = this; // WICHTIG WEGEN DEM SCOPE... 
		APICall(
			$http,
			'home',
			{},
			function(articlesCall) { 
				// what now???
				// controller zuweisen...
				controller.articles = articlesCall; // controller sonst meint er die funktion selbst...
				console.log(articlesCall);
			}
		);
	})
	.controller('showArticleController', function($http,$routeParams) {
		var controller = this; 
		console.log($routeParams);
		APICall(
			$http,
			'home',
			{id : $routeParams.articleid},
			function(singleArticleCall) { 
				// what now???
				// controller zuweisen...
				controller.singleArticle = singleArticleCall; // controller sonst meint er die funktion selbst...
				console.log(singleArticleCall);
			}
		);		
	});
})();	
