<?php

namespace App;

use App\Message;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    /**
     * QUERY SCOPE
     */

    public function users()
    {
        return $this->where('id', '!=', auth()->user()->id)->orderBy('name')->get();
    }

    public function getId($name)
    {
        return $this->where('name', strtolower($name))->first(['id']);
    }

    public function sendMessage($request)
    {
        $user = $request->user();

        return $user->messages()->create([
            'sender_id' => $user->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->body
        ]);
    }

    /**
     * RELATIONSHIP
     */
    
    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
}
