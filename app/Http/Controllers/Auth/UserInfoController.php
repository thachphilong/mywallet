<?php

namespace Lavavel\Http\Controllers\Auth;

use Lavavel\User;
use Illuminate\Http\Request;
use Lavavel\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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
            'n_password.required'   => 'The new password field is required.',
            'cn_password.required'  => 'The confirm new password field is required.',
            'n_password.min'        => 'The new password field must be at least 6 characters.',
            'n_password.max'        => 'The new password may not be greater than 16 characters',
            'n_password.regex'      => 'The new password field must be have \'[a-z],[A-Z],[0-9],[~!@#$%^&*]\' characters.',
            'cn_password.same'      => 'The confirm new password and new password must match.'
        ];
        $rule = [
            'email'         => 'email',
            'n_password'    => 'required|string|min:6|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/',
            'cn_password'   => 'required|string|same:n_password'
        ];
        $validate = Validator::make($request->all(),$rule,$messages);
        if ($validate->fails()) 
        {
            // get the error messages from the validator
                $messages = $validate->messages();
            // redirect our user back to the form with the errors from the validator
                $input['password_modal'] = true;
                return redirect()->back()
                ->withErrors($validate)
                ->withInput($input);
        }
        else
        {
            $input['change_status'] = true;
            User::where('email', $request['email'])
                        ->update([
                            'password' => Hash::make($request['n_password'])
                        ]);
            return redirect() -> back()
                ->withInput($input);
            
        }
    }
    public function change_avatar(Request $request) 
    {
        $avatar = $request -> all();
        $rule = 
        [
            'email'     => 'email',
            'n_avatar'  => 'required|image|mimes:jpeg,png,jpg|dimensions:ratio=5/5'
        ];
        $messages =
        [
            'n_avatar.required'     => 'The new avatar field is required.',
            'n_avatar.image'        => 'The new avatar field must be an image.',
            'n_avatar.mimes'        => 'The new avatar field must be use extension jpeg, png, bmp, gif, or svg.',
            'n_avatar.dimensions'   => 'The new avatar dimension must be ratio 5:5'
        ];
        $validate = Validator::make($avatar,$rule,$messages);
        if ($validate -> fails())
        {
            $messages = $validate -> messages();
            $input['avatar_modal'] = true;
            return redirect()->back()
            ->withErrors($validate)
            ->withInput($input);
        }
        else
        {
            $path = $request -> file('n_avatar') -> store('avatar/'.Hash::make($request['email']),'public');
            User::where('email', $request['email'])
               ->update([
                   'avatar_url' => 'http://localhost:8080/mywallet-master/storage/app/public/'.$path 
               ]);
            return redirect('home');
        }
    }
}
