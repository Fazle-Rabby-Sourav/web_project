<?php

class AuthController extends BaseController {

	public function login()
	{
		return View::make('auth.login')
						->with('title', 'Login');
	}

	public function doLogin()
	{
		$rules = [
			'email'		=>	'required|email',
			'password'	=>	'required'
		];

		$credentials = [
			'email'		=>	Input::get('email'),
			'password'	=>	Input::get('password')
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
			if(Auth::attempt($credentials))
			{
				return Redirect::route('home');
			}
			else
			{
				return Redirect::back()
								->withInput()
								->with('error', 'Error in email address or password!');
			}
		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::route('login')
							->with('success', 'You have logged out successfully.');
	}

	public function registration()
	{
		return View::make('auth.registration')
						->with('title', 'Registration');
	}

	public function doRegistration()
	{
		$rules = [
			'name'		=>	'required',
			'email'		=>	'required|email|unique:users',
			'password'	=>	'required'
		];

		$credentials = [
			'name'		=>	Input::get('name'),
			'email'		=>	Input::get('email'),
			'password'	=>	Input::get('password')
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
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			if($user->save())
			{
				return Redirect::route('login')
									->with('success', 'You have registered successfully.');
			}
			else
			{
				return Redirect::back()
								->withInput()
								->with('error', 'An error occured! Try again!');
			}
		}
	}

}
