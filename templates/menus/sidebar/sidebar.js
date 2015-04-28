/**
 * Created by Franky on 13.04.2015.
 * angular module
 */

    
    angular.module('mainApp')
    .controller('sidebarController', function () {
			

        
    })
    .directive('mainSidebar', function(){
            return {
                restrict: 'E',
                templateUrl: 'templates/menus/sidebar/sidebar.html',
                scope: {
                	genres: '='
                }
            };
    });

