app.controller('MessageController', ['$scope', '$http', function($scope, $http){
	
	$scope.userId = 0;

	var getUserId = function(name) {
		$http
			.get('/user/getUserName/' + name)
			.then(function(response) {
				$scope.userId = response.data.id;

				displayMessage($scope.userId);

				// console.log($scope.userId);
			});
	};

	$scope.chooseUser = function($event) {
		var name =  $event.target.innerHTML;

		$('em').text(name); // send to

		getUserId(name.toLowerCase());
	};

	$scope.sendMessage = function(message) {
		var isMessageEmpty = ($('textarea').val().length > 0) ? true : false;

		if ($scope.userId > 0 && isMessageEmpty) {
			message.receiver_id = $scope.userId;

			$http
				.post('message', message)
				.then(function(response) {
					console.log(response.data);
				}, function(error) {
					console.log(error);
				});
		} else alert('Error Occured: Make sure you select user to chat and message must not empty.');
	};

	var displayMessage = function(userId) {
		if (userId > 0) {
			$http
				.get('/message/' + userId)
				.then(function(response) {
					console.log(response.data);
				}, function(error) {
					console.log(error);
				});
		}
		
	};

	/*=============== Pusher ===============*/ 
	var pusher;

	var initPusher = function() {
		pusher = new Pusher('416be529c9760ba448bc', {
			encrypted: true
		});
	}; //initPusher();

	var displayMessageRealTime = function(channelName) {
		var channel = pusher.subscribe(channelName);

		channel.bind('App\\Events\\ChatMessage', function(data) {
			console.log(data);
		});
	}; //displayMessageRealTime('dislay-message');


}]);