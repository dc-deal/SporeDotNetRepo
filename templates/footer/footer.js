/**
 * Created by Franky on 13.04.2015.
 * angular module
 */
angular.module('mainApp')
.controller('footerController', function() {
})
.directive('mainFooter', function() {
	return {
		restrict : 'E',
		templateUrl : 'templates/footer/footer.html',
		scope : {
			genres : '='
		}
	};
});



