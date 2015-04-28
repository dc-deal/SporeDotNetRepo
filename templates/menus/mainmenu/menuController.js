/**
 * Created by Franky on 09.04.2015.
 * angular written  module for my routes
 */

	angular.module('mainApp')
	.controller('menuController', function() {
		this.menuitems = menuitems;
		this.dropDowns = dropdownItems;
		this.banner = banner;
		this.dropdownCapt = dropdownCapt;
		this.cssUseBanner = function() {
			// das banner bild auslesen und dieh höhe der navigation danach ausrichten:]
			var jqban = $('#banner');
			jqban.addClass('bannerClass');
			jqban.closest('.navbar-brand').css('height', '130px');
		}();
		// bitte machen.
		//--------------------
		// dropdown machen
		//Stack all menu when collapsed
		//$mensToStack = [$('#bs-example-navbar-collapse-1'),$('#bs-example-navbar-collapse-1')];
		
		$('#bs-example-navbar-collapse-1').on('show.bs.collapse', function() {
			$('.nav-pills').addClass('nav-stacked').removeClass('menu1width');
			
		});
		//Unstack menu when not collapsed
		$('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function() {
			$('.nav-pills').removeClass('nav-stacked').addClass('menu1width');
			
		});		
	})
	.directive('mainMenudir', function() {
		return {
			restrict : 'E',
			templateUrl : 'templates/menus/mainmenu/mainmenu.html',
			scope : {
				genres : '='
			}
		};
   });
   
	/**
	 * DATA!!!
	 **/
	var banner = {
		name : "home",
		showName : "TheSpore.net",
		hint : "Zurück zur Startseite",
		imgTitle : "img/Logo The spore Kopie.png",
		link : "#'+'/home"
	}
	var menuitems = [{
		name : "music",
		showName : "Musik",
		hint : "Höre dir unsere Musik an",
		show : true,
		link : "#/music"
	}, {
		name : "theband",
		showName : "Die Band",
		hint : "Die einzelnen Bandmitglieder stellen sich vor",
		show : true,
		link : "#/band"
	}, {
		name : "thestory",
		showName : "Die Story",
		hint : "Schaue dir die bandgeschichte an",
		show : true,
		link : "#/story"
	}, {
		name : "shop",
		showName : "Mercendise",
		hint : "Alles was ihr braucht in unsere Shop",
		show : true,
		link : "#/shop"
	}];
	var dropdownCapt = " (0 Artikel im Warenkorb)";
	var dropdownItems = [ {
		name : "persdata",
		showName : "persönliche Daten",
		hint : "",
		show : true,
		link : "#/story"
	}, {
		name : "bestdata",
		showName : "meine Bestellungen",
		show : true,
		hint : "",
		link : "#/story"
	},{
		name : "logout",
		showName : "logout",
		hint : "Ausloggen...",
		show : false,
		link : "#/story"
	},{
		name : "login",
		showName : "log dich ein",
		hint : "Log dich in die Members Area an!",
		show : true,
		link : "#/story"
	}];