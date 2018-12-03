<?php

namespace Lavavel\Http\Controllers\Auth;

use Lavavel\User;
use Illuminate\Http\Request;
use Lavavel\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function info() {
        return View('auth/userinfo');
    }
    public function change_password(Request $request)
    {
        $this ->validate($request,[
            'n_password'    => ['required', 'string', 'min:6', 'confirmed'],
            'cn_password'   => ['required', 'string', 'min:6', 'confirmed','same:password'],
        ]);
        if ($this->fails()) {

            // get the error messages from the validator
                $messages = $validator->messages();
    
            // redirect our user back to the form with the errors from the validator
                $input = Input::except('password', 'password_confirm'); //Get all the old input except password.
                $input['autoOpenModal'] = 'true'; //Add the auto open indicator flag as an input.
                return Redirect::back()
                ->withErrors($validator)
                ->withInput($input);
        }
        //DB::where('email', '$data["email"]') -> update(['password' => Hash::make($data['n_password'])]);
    }
}
