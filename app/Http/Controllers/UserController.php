<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function authenticate(Request $request){
        
        $credentials= $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

       if (Auth::attempt($credentials)){
           $request->session()->regenerate();
           return redirect()->back()->with('status','Login Success');
       }
       return back()->with('status','Login failed');
    }
    
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
    public function register(Request $request){
        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required|email:dns',
            'password'=>'required|min:8'
        ]);
        
        $user=User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password'])
        ]);
        Auth::login($user);
        return redirect()->back();
    }

    #istnragram auth
    public function redirectToProvider()
    {
        $client_id = env('INSTAGRAM_CLIENT_ID');
        $redirect_uri = env('INSTAGRAM_REDIRECT_URI');
        return redirect()->away("https://api.instagram.com/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_uri&scope=user_profile,user_media&response_type=code");

        
        
    }


    public function handleProviderCallback()
    {
        return view('landing');
        // $reponse= Http::post('https://api.instagram.com/oauth/access_token',[
        //     'client_id'=>env('INSTAGRAM_CLIENT_ID'),
        //     'client_secret'=>env('INSTAGRAM_CLIENT_SECRET'),
        //     'grant_type'=>'authorization_code',
        //     'redirect_uri'=>env('INSTAGRAM_REDIRECT_URI'),
        //     'code'=>$_GET['code']
        // ]);
        // $user=Socialite::driver('instagram')->userFromToken($reponse['access_token']);
        // dd($user);
        


 

    }

}
