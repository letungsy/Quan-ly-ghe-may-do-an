<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('webdang.login');
    }
    public function postLogin(Request $request){
        $user=User::where('email',$request->email)->get();
        $mangemail=[];
        $mangpassword=[];
        foreach ($user as $u){
       $mangemail[]=$u['email'];
       $mangpassword[]=$u['password'];
        }

        // $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required',
            'password'=>'required|min:8'
        ]);
     if (in_array($request->email,$mangemail,true)) {
        return redirect()->route('ghemay');
        }
       else {
        return back()->withErrors([
            'tieude' => 'co the email hoac password sai.',
            ]);
       }
    }
  
    public function getRegister(){
        return view('webdang.register');
    }
    public function postRegister(Request $request){
    $user= new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password'=>'required|min:8',
        're-password'=>'required|min:8'
    ]);
    $user->save();
    if ($user->id) {
        return redirect()->route('getLogin');
    }
    }
}
