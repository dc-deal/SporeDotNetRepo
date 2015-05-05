(function() {
	angular.module('mainApp')
	.controller('showAllArticlesController', function($http){		
		// news holen...
		var controller = this; 
		$http.get('/api/public/api/news/newspage/')
		.success(function(data, status, headers, config) {
		    controller.articles = data; // controller sonst meint er die funktion selbst...
			console.log(data);
		});	
	})
    // animation zum home controller
    // Direktive	Unterstützte Animationen
// ngRepeat	enter, leave and move
// ngView	enter and leave
// ngInclude	enter and leave
// ngSwitch	enter and leave
// ngIf	enter and leave
// ngClass	add and remove
// ngShow & ngHide	add and remove
//     
 	.animation('.list-item', function() {
	    return {
	    	///leave/move
	      enter : function(element, done) {
	        // Die eigentliche Animation wird hier gestartet.
	        // done() muss nach Beenden aufgerufen werden
	      		    var em = $(element).find('.list-item-under');
	      		    console.log(em);
	      		    em.hide();
	    			em.fadeIn('fast',function() { 
        			console.log('donefadein');
        			done(); 
        		});  
	      },
	      leave: function(element, done) {
	        // Die eigentliche Animation wird hier gestartet.
	        // done() muss nach Beenden aufgerufen werden
	      },	      	
	      // Animation, die vor Hinzufügen/Entfernen der Klassen
	      // ausgeführt werden soll
	      beforeAddClass: function(element, className, done) { 

	      	},
	      beforeRemoveClass: function(element, className, done) { 
	      	},
	      // Animation, die nach Hinzufügen/Entfernen der Klassen
	      // ausgeführt werden soll
	      addClass: function(element, className, done) { 	      	
	      	},
	      removeClass: function(element, className, done) { 
	      	}
	    };
    })
	
	
	.controller('showArticleController', function($http,$routeParams) {
		var controller = this; 
		console.log($routeParams);
		$http.get('/api/public/api/news/newspage/'+$routeParams.articleid)
		.success(function(data, status, headers, config) {
			controller.singleArticle = data; // controller sonst meint er die funktion selbst...
			console.log(data);
		});
	});
})();	
