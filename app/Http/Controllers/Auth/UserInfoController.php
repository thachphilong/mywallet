<?php

namespace Lavavel\Http\Controllers\Auth;

use Lavavel\User;
use Illuminate\Http\Request;
use Lavavel\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'o_password' => ['required', 'string', 'min:6', 'confirmed'],
            'n_password' => ['required', 'string', 'min:6', 'confirmed'],
            'cn_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    /**
     *
     *
     * @param  array  $data
     * @return \Lavavel\User
     */
    protected function update(array $data)
    {
        return User::where('active', 1)
                    ->where('destination', 'San Diego')
                    ->update(['delayed' => 1]);
    }
    public function info () {
        return View('auth/userinfo');
    }
}
