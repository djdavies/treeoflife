<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/11/2014
 * Time: 23:22
 */
	class UserController extends BaseController {

		public function getCreateUser(){
			return View::make('user.register');
		}

		public function getLogin(){
			return View::make('user.login');
		}

		public function postCreateUser(){
			$validate = Validator::make(Input::all(),
                    [
	                    'username' => 'required|unique:users|min:4',
	                    'password' => 'required|min:7',
	                    'confirm_password' => 'required|same:password',
	                ]);
			if($validate->fails()){
				return Redirect::route('getCreate')->withErrors($validate)->withInput();
			}else{
				$user = new User;
				$user->username = Input::get('username');
				$user->password = Hash::make(Input::get('password'));
				$user->save();

				if($user){
					return Redirect::route('treeView')->with('message', 'You have Register Successfully!');
				}else{
					return Redirect::route('treeView')->with('fail', 'Error while creating user please try again');
				}
			}
		}

		public function postLogin(){

			$validator = Validator::make(Input::all(),
				[
					'username' => 'required',
					'password' => 'required',
				]);

			if($validator->fails()){
				return Redirect::route('getLogin')->withErrors($validator)->withInput();
			}else{
				$remember = Input::has('remember')
					? true
					: false;
				if(Auth::attempt(Input::only('username', 'password'), $remember)) {
					return Redirect::intended('/');
				} else {
					return Redirect::route('getLogin')
						->withInput()
						->with('error', "Invalid credentials, please try again");
				}
			}
		}

		public function getLogout(){
			Auth::logout();
			return Redirect::route('home')
				->with('message', 'You are now logged out');
		}
	}