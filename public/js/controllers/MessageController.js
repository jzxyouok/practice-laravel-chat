app.controller('MessageController', ['$scope', '$http', function($scope, $http){
	
	$scope.userId = 0;
	$scope.chat = {};
	$scope.message = {};

	var getUserId = function(name) {
		$http
			.get('/user/getUserName/' + name)
			.then(function(response) {
				$scope.userId = response.data.id;

				displayMessage();

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

		$('div.conversation').scrollTop(0,document.body.scrollHeight);


		if ($scope.userId > 0 && isMessageEmpty) {
			message.receiver_id = $scope.userId;

			$http
				.post('message', message)
				.then(function(response) {
					$scope.message.body = '';

					// $scope.chat.push(message);
					displayMessage();
				}, function(error) {
					console.log(error);
				});
		} else alert('Error Occured: Make sure you select user to chat and message must not empty.');
	};

	var displayMessage = function() {
		var userId = $scope.userId;

		if (userId > 0) {
			$http
				.get('/message/' + userId)
				.then(function(response) {
					$scope.chat = response.data.messages;
				}, function(error) {
					console.log(error);
				});
		}
	};

	/*=============== Pusher ===============*/ 
	var pusher;

	var initPusher = function() {
		// Pusher.logToConsole = true;

		pusher = new Pusher('416be529c9760ba448bc', {
			encrypted: true
		});
	}; initPusher();

	var displayMessageRealTime = function(channelName) {
		var channel = pusher.subscribe(channelName);

		channel.bind('App\\Events\\ChatMessage', function() {
			displayMessage();
		});
	}; displayMessageRealTime('dislay-message');


}]);