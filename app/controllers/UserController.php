<?php

class UserController extends BaseController {


    public function getRegisterUser()
    {
        return View::make('users.register');
    }

    public function postRegisterUser() {

        $validatorMessages = array(
            'username.required' => 'Morate uneti korisničko ime',
            'first_name.required' => 'Morate uneti ime',
            'last_name.required' => 'Morate uneti prezime',
            'email.required' => 'Morate uneti email adresu',
            'password.required' => 'Morate uneti lozinku'
        );

        $validator = Validator::make(
            array(
                "first_name" => Input::get('first_name'),
                "last_name" => Input::get('last_name'),
                "email" => Input::get('email'),
                "username" => Input::get('username'),
                "password" => Input::get('password'),
                "password_confirmation" => Input::get('password_confirmation')
            ),
            array(
                "first_name" => "required|max:30",
                "last_name" => "required|max:30",
                "email" => "required|email|unique:users|max:255",
                "username" => "required|unique:users",
                "password" => "required|confirmed"
            ),
            $validatorMessages
        );

        if ($validator->fails()) {
            return Redirect::to('/register')->withInput()->withErrors($validator);
        } else {

            $user = new User;
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));

            $user->type_id = 1; //OBICAN USER TYPE PROMENI

            $user->save();

            Auth::login($user);

            $message = "Uspesna registacija!";

            return Redirect::to('/')->with('message', $message);
        }

        return View::make('users.register');
    }

    public function getLoginUser() {
        return View::make('users.login');
    }

    public function postLoginUser() {

        $username = Input::get('username');
        $password = Input::get('password');

        if (Auth::attempt(array('username' => $username, 'password' => $password)))
        {
            //return View::make('home', array('message' => "Uspesan login!"));
            return Redirect::to('/')->with('message', "Uspesan login!");
        } else {
            if (Auth::attempt(array('email' => $username, 'password' => $password)))
            {
                //return View::make('home', array('message' => "Uspesan login!"));
                return Redirect::to('/')->with('message', "Uspesan login!");
            } else {
                return View::make('users.login', array('error' => 'Username / E-mail ili lozinka nisu tačni.'));
            }
        }

    }

    public function getLogoutUser() {
        Auth::logout();
        //return View::make('home', array('message' => 'Uspesno ste se izlogovali!'));
        //Redirect::to('/register');
        return Redirect::to('/')->with('message', "Uspesan logout!");
    }

    public function getProfile() {

        if (Auth::guest()) return Redirect::to('/login');

        $user = Auth::user();

        $startedPaths = array();
        $completedPaths = array();

        foreach($user->paths as $path) {
            if ($path->pivot->completed == 1) {
                $completedPaths[] = $path;
            } else {
                $startedPaths[] = $path;
            }
        }

        return View::make('users.profile', array('user' => $user, 'completedPaths' => $completedPaths, 'startedPaths' => $startedPaths));
    }

}
