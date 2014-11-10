<?php

class Like extends Eloquent {

	protected $table = 'likes';

	public function liker()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function photo()
	{
		return $this->belongsTo('Photo', 'photo_id');
	}

}
