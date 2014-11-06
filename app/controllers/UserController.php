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
			return 'login page';
		}

		public function postCreateUser(){
			$validate = Validator::make(Input::all(),
                    [
	                    'username' => 'required|unique:users|min:4',
	                    'password' => 'required|min:7',
	                    'confirm_password' => 'required|same:password',
	                ]);
			if($validate->fails()){
				Redirect::route('getCreate')->withErrors($validate)->withInput();
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
			if(Auth::attempt(Input::only('username', 'password'))) {
				return Redirect::intended('/');
			} else {
				return Redirect::intended('/login')
					->withInput()
					->with('error', "Invalid credentials");
			}
		}
	}