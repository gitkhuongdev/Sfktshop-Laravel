<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registerValidate;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\loginValidate;
use App\Models\User;
class UserController extends Controller
{
    public function login(){
        return view('user/login');
    }


    function handleLogin(loginValidate $request){
        if(auth()->guard('web')
            ->attempt(['email'=>$request['email'],'password'=>$request['password']])){
            $userser = auth()->guard('web')->user();
            return redirect()->intended('/');
        }
        else return back()->with('error','Email, Password Incorrect');
    }

    function logout(){
        auth()->guard('web')->logout();
        return redirect('/login')->with('success','Logout Success');
    }

    //=========================================================================================================
    public function register(){
        return view('user/register');
    }

    public function handleRegister(registerValidate $request){
        $user = new User;
        $user->email = strtolower(trim(strip_tags($request['email'])));
        $user->name = trim(strip_tags($request['name']));
        $user->password = trim(strip_tags( \Hash::make($request['password_1'])));
        $user->address = trim(strip_tags($request['address']));
        $user->phone = trim(strip_tags($request['phone'])); 
        $user->save();
        $id = $user->id;
        if(auth()->guard('web')->attempt(['email'=>$request['email'],'password'=>$request['password_1']])){
            $user = auth()->guard('web')->user();
            event(new Registered($user)); 
            return redirect('/verifyAccount')->with('success',"Register Success, Please go to your email to activate your account!"); 
        }
        else return back()->with('warn','Register Fail!');
    }

    function verifyAccount(){ 
        return view('user/verifyAccount'); 
    }
}