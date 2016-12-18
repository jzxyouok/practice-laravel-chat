<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
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

        event(new ChatMessage());

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $message = new Message();
        $messages = $message->conversation($id);
      
        return response()->json(['messages' => $messages]);
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
