<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $user = new User;
        $users = $user->users();

        return view('messages.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User;
        $result = $user->sendMessage($request);

        return response()->json(['success' => true]);
    }

    public function show(Message $message)
    {
        return 'ur here';
        return $message;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
