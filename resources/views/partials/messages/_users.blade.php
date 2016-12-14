<div class="users ">
	<h2>Friends List</h2>

	@if (count($users))
		<ul class="friend-list">
			@foreach ($users as $user)
				<li><a href="#" ng-click="chooseUser($event)">{{ $user->name }}</a></li>
			@endforeach
		</ul>
	@endif
</div>