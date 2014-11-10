<?php

class PhotoController extends BaseController {

	
	public function index()
	{
		$photos = Photo::get();

		return View::make('photos.index')
						->with('title', 'Home')
						->with('photos', $photos);
	}

	public function create()
	{
		return View::make('photos.upload')
						->with('title', 'Upload');
	}

	public function doCreate()
	{
		$rules = [
			'caption'		=>	'required',
			'picture'		=>	'required|mimes:jpeg,jpg,bmp,png'
		];

		$credentials = [
			'caption'		=>	Input::get('caption'),
			'picture'		=>	Input::file('picture')
		];

		$validation = Validator::make($credentials, $rules);

		if($validation->fails())
		{
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		}
		else
		{
			$photo = new Photo;
			$photo->caption = Input::get('caption');
			$photo->details = Input::get('details');
			$photo->user_id = Auth::id();

		    $file = Input::file('picture');

		    $destinationPath = public_path('uploads');
		        
	        // generate random unique name [ timestamp + userId + extn ]
	        $fileName = strtotime(date('Y-m-d H:i:s')).Auth::id().".".$file->getClientOriginalExtension();

	        // original file starts with original_
	        $file->move($destinationPath, "original_".$fileName);

		    // medium resolution starts with medium_
			Image::make($destinationPath."/original_".$fileName)
			        		->resize(300, null, true)
			        		->save($destinationPath."/medium_".$fileName);

			// low resolution starts with thumbnail_
			Image::make($destinationPath."/original_".$fileName)
			        		->resize(null, 100, true)
			        		->save($destinationPath."/thumbnail_".$fileName);

			$photo->file_url = $fileName;

			if($photo->save())
			{
				return Redirect::route('account', ['id' => Auth::id()])
									->with('success', 'Photo has been uploaded!');
			}
			else
			{
				return Redirect::back()
								->withInput()
								->with('error', 'Some error occured! Try again!');
			}
		}
	}

	public function show($id)
	{
		$photo = Photo::find($id);

		$isLiked = false;
		foreach ($photo->likes as $key => $like)
		{
			if($like->user_id == Auth::id())
			{
				$isLiked = true;
				break;
			}
		}

		return View::make('photos.show')
						->with('title', $photo->caption)
						->with('photo', $photo)
						->with('isLiked', $isLiked);
	}

	public function doLike($id)
	{
		$like = new Like;
		$like->user_id = Auth::id();
		$like->photo_id = $id;
		$like->save();

		return Redirect::route('photo.show', ['id' => $id])
									->with('success', 'Photo has been liked!');
	}

	public function doUnlike($id)
	{
		$like = Like::where('user_id', '=', Auth::id())
					->where('photo_id', '=', $id)
					->delete();

		return Redirect::route('photo.show', ['id' => $id])
									->with('success', 'Photo has been unliked!');
	}

}
