<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = ['receiver_id', 'message'];

	public function conversation($id)
    {
    	$loginId = auth()->user()->id;

    	// \DB::listen(function($query) { var_dump($query->sql); });

    	// return 'sender_id: ' . $loginId . ' => receiver_id: ' . $id;

        return $this
        	->whereRaw('
        		(sender_id = ' . $loginId . ' AND receiver_id = ' . $id . ')
        		OR 
        		(sender_id = ' . $id . ' AND receiver_id = ' . $loginId . ')
        	')
        	->oldest()
        	->get();
    }
}
