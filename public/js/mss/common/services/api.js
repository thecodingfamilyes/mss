;(function(window, ng, $, undefined) {
	"use strict";

	MSS.factory('api', ['Restangular', function(Restangular) {
		Restangular.setBaseUrl('/api/');
		Restangular.addResponseInterceptor(function(data) {
			return data.data;
		});

		return Restangular;
	}]);

})(window, angular, jQuery);