@extends('layouts.app')

@section ('content')

	<div class="wrapper" ng-controller="MessageController">
		<h2 class="text-center text-uppercase">let's chat</h2>
		<p class="text-center">send to: <b><em>nothing</em></b></p>

		@include ('partials.messages._users')

		<div class="chat">
			{{-- @include ('errors._list') --}}
			{{-- @if (count($messages)) --}}
				{{-- @foreach ( as )
					
				@endforeach --}}
				{{-- Messages Sender --}}
				<div class="row">
					<div class="chat-sender col-xs-6 col-sm-6 col-md-6 col-lg-6 pull-right">
						<p>Lorem ipsum dolor sit amet.</p>
					</div>
				</div>

				{{-- Messages Reciever --}}
				<div class="row">
					<div class="chat-reciever col-xs-6 col-sm-6 col-md-6 col-lg-6 pull-left">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
					</div>
				</div>
			{{-- @endif --}}
			

			{{-- Chat Box --}}
			<form id="form-chat">
				<div class="form-group">
					<textarea id="body" class="form-control" rows="3" ng-model="message.body"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary pull-right" ng-click="sendMessage(message)">Send Message</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section ('footer')
	<script src="{{ asset('js/controllers/MessageController.js') }}"></script>
@endsection
