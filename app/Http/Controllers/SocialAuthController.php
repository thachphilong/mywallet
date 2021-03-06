<?php

namespace Lavavel\Http\Controllers;

use Illuminate\Http\Request;
use Lavavel\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Lavavel\User;
class SocialAuthController extends Controller
{
   /**
     * Chuyển hướng người dùng sang OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        }
        return Socialite::driver($provider)->redirect();
    }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        $user = Auth::login($authUser, true);
        return Redirect::to(Session::get('pre_url'));
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
    }

    /**
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'          => $user->name,
            'email'         => $user->email,
            'password'      => Hash::make($user->id),
            'provider'      => $provider,
            'provider_id'   => $user->id,
            'avatar_url'    => $user->avatar
        ]);
    }
}
