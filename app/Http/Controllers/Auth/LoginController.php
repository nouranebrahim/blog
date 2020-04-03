<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Socialite;
use Illuminate\Support\Facades\Auth;



  









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
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
          //dd($user);
        // $user->token;
        $newUser=User::where('name',$user->nickname)->where('email',$user->email)->first();
        // dd($check);
        if(!$newUser){
            User::create([
                'id'=>$user->id,
                'name'=>$user->nickname,
                'email'=>$user->email,
                'password'=>$user->token
            ]);
        }
         Auth::login($newUser,true);
        return redirect()->route('posts.index');
    }
    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

      

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

            $user = Socialite::driver('google')->user();
            dd($user);
            $newUser=User::where('name',$user->nickname)->where('email',$user->email)->first();
            // dd($check);
            if(!$newUser){
                User::create([
                    'id'=>$user->id,
                    'name'=>$user->nickname,
                    'email'=>$user->email,
                    'password'=>$user->token
                ]);
            }
             Auth::login($newUser,true);
            return redirect()->route('posts.index');

     

            

    }


}
