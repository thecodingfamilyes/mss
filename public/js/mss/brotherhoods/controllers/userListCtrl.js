;(function(window, ng, $, undefined) {
	"use strict";

	MSS.controller('Brotherhoods.UserListCtrl', ['$scope', 'api', '$modal', function($scope, api, $modal) {
		var brotherhoods = api.all('brotherhoods');
		var slots = {
			slot1: null,
			slot2: null,
			slot3: null
		};

		$scope.remaining = 3;
		$scope.slots = slots;

		$scope.openForm = function(size) {
			var modalInstance = $modal.open({
				templateUrl: '/templates/mss/brotherhoods/form.html',
				//controller: ModalInstanceCtrl,
				size: size/*,
				resolve: {
					items: function () {
						return $scope.items;
					}
				}*/
			});
		};

		brotherhoods.getList().then(function(data) {
			if (data.length) {
				ng.forEach(data, function(item, idx) {
					slots['slot'+(idx+1)] = item.plain();
					$scope.remaining--;
				});
			}
		});
	}]);

	MSS.config(function($routeProvider) {
		$routeProvider
			.when('/brotherhoods', {
				templateUrl: '/templates/mss/brotherhoods/base.html',
				controller: 'Brotherhoods.UserListCtrl'
			});
	});

})(window, angular, jQuery);