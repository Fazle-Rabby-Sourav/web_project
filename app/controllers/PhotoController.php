<?php

class PhotoController extends BaseController {

	public function start()
	{
		/*$photos = Photo::all()
			->orderBy('created_at', 'desc')
			->get();*/

		return View::make('photos.start')
						->with('title', 'Home');
	}

	public function index()
	{
		$photos = Photo::orderBy('created_at', 'desc')->get();
		
		//$allphotos->latest()->get();
					/*->orderBy('created_at');
					->get();*/


		return View::make('photos.index')
						->with('title', 'Home')
						->with('photos', $photos );
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
			$photo->category_id = Input::get('optionsRadios');
			
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
		$numOfPhotos= count(Photo::all());
		
		$categoryID = $photo->category_id;
		$cat_name = DB::table('categories')->where('id', $categoryID)->pluck('cat_name');

		$isAuth = false;
		$x=$photo->user_id;
		
		


		$uploader_name= User::where('id', '=', $x)->pluck('name');

		if($photo->user_id == Auth::id() )
		{
			$isAuth = true;
		}
		
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
						->with('isLiked', $isLiked)
						->with('numOfPhotos', $numOfPhotos)
						->with('isAuth', $isAuth)
						->with('name', $uploader_name)
						->with('x', $x)
						->with('cat_name', $cat_name);
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

	public function category()
	{
		//return 'ok';
		return View::make('photos.categoryList')
							->with('title', 'Category');
									
	}

	public function categoryShow($id)
	{
		$photos = Photo::where('category_id', '=',  $id)->get();

		return View::make('photos.index')
						->with('title', 'Home')
						->with('photos', $photos);
	}

	public function doRemove($id)
	{
		$photo = Photo::where('user_id', '=', Auth::id())
						->where('id', '=', $id)
						->delete();
		return Redirect::route('home');
	}

}
