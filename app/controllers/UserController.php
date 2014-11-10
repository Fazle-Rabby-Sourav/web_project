<?php

class UserController extends BaseController {

	public function account($id)
	{
		$user = User::find($id);

		


		return View::make('users.account')
						->with('title', 'Account')
						->with('user', $user);
	}

	public function editAccount($id)
	{
		$user = User::find($id);
		
		return View::make('users.editAccount')
						->with('title', 'Edit Account')
						->with('user', $user);
	}

	public function doEditAccount($id)
	{
		$rules = [
			'name'		=>	'required',
			'email'		=>	'required|email'
		];

		$credentials = [
			'name'		=>	Input::get('name'),
			'email'		=>	Input::get('email'),
			'password'	=>	Input::get('password'),
			'address'	=>	Input::get('address'),
			'gear'		=>	Input::get('gear'),
			'contact'	=>	Input::get('contact'),
			'website'	=>	Input::get('website'),
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
			$user = User::find($id);
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->address 	= Input::get('address');
			$user->gear 	= Input::get('gear');
			$user->contact 	= Input::get('contact');
			$user->website 	= Input::get('website');

			if(Input::has('password'))	$user->password = Hash::make(Input::get('password'));

			if($user->save())
			{
				return Redirect::route('account', ['id' => $id]);
			}
			else
			{
				return Redirect::back()
								->withInput()
								->with('error', 'Some error occured! Try again!');
			}
		}
	}


}
