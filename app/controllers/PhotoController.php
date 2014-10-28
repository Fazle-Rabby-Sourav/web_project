<?php

class PhotoController extends BaseController {

	
	public function index()
	{
		return View::make('photos.index')
						->with('title', 'Home');
	}

}
