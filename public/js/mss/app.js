;(function(window, ng, $, undefined) {
	"use strict";

	var App = ng.module('mss', ['ngResource', 'ngRoute', 'restangular', 'ui.bootstrap']);

	App.config(function($routeProvider, $locationProvider) {
		$routeProvider
			.when('/', {
				templateUrl: '/templates/mss/base.html'
			})
			.otherwise({
				redirectTo: '/'
			});

		//$locationProvider.html5Mode(true);
	});

	window.MSS = App;

})(window, angular, jQuery);