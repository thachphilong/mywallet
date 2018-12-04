<?php

namespace Lavavel\Http\Controllers\Auth;

use Lavavel\User;
use Illuminate\Http\Request;
use Lavavel\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $messages = [
            'n_password.required' => 'The new password field is required.',
            'cn_password.required' => 'The confirm new password field is required.',
            // 'n_password.string' => 'The new password field is required.',
            // 'cn_password.string' => 'The confirm new password field is required.'
        ];
        $rule = [
            'email'         => 'email',
            'n_password'    => 'required|string|min:6',
            'cn_password'   => 'required|string|min:6|same:n_password'
        ];
        $validate = Validator::make($request->all(),$rule,$messages);
        if ($validate->fails()) 
        {
            // get the error messages from the validator
                $messages = $validate->messages();
            // redirect our user back to the form with the errors from the validator
                $input = $request->except('n_password', 'cn_password');
                $input['password_modal'] = 'true'; //Add the auto open indicator flag as an input.
                return redirect('userinfo/userinfo')
                    ->withErrors($validate)
                    ->withInput($input);
        }
        else
        {
            $input['password_modal'] = 'false';
            $input['change_success'] = 'true';
            User::where('email', $request['email'])
                        ->update([
                            'password' => Hash::make($request['n_password'])
                        ]);
            return redirect('userinfo/userinfo')
                ->withInput($input);
            
        }
        //DB::where('email', '$data["email"]') -> update(['password' => Hash::make($data['n_password'])]);
    }
}
