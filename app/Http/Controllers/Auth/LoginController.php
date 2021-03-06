<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Twitterの認証ページへユーザーをリダイレクト
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectToTwitterProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }
    
    
    
    /**
     * Twitterからユーザー情報を取得
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleTwitterProviderCallback(){

       try {
           $user = Socialite::with("twitter")->user();
       } 
       catch (\Exception $e) {
           return redirect('/login')->with('oauth_error', 'ログインに失敗しました');
           // エラーならログイン画面へ転送
       }
       
       $myinfo = User::firstOrCreate(['token' => $user->token ],
                 ['name' => $user->nickname,'email' => $user->getEmail()]);
                 Auth::login($myinfo);
                 //return redirect()->route('residents.index');
                 return redirect()->to('/'); // homeへ転送
    
    }
}

