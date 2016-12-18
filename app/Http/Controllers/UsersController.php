<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UsersController extends Controller
{
	public function signin(Request $request)
	{
		/*$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		], [
			'email.required' => 'Girequire ni sya. Pls! fil-api.',
			'password.required' => 'Girequire ni sya. Pls! fil-api.'
		]);

		$credentials = [
			'email' => $request->email,
			'password' => $request->password
		];*/

		// login with custom id
		Auth::loginUsingId(13);

		return redirect('message');

		// check if user is authenticated
		/*if (Auth::attempt($credentials)) {
			return redirect('message');
		}

		return back()->withErrors(['errors' => Lang::get('auth.failed')]);*/
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}

	public function getUserId($name)
	{
		$user = new User;
		$id = $user->getId($name);

		return $id;
	}
}
