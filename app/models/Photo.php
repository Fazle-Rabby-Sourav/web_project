<?php

class Photo extends Eloquent {

	protected $table = 'photos';

	public function uploader()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function likes()
	{
		return $this->hasMany('Like', 'photo_id');
	}

}
