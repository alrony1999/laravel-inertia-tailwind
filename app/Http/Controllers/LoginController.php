<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->dr();
        }

        return back()->with('alert', ['type'=>'danger','message'=>'Login details are not valid']);
    }

    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('alert', ['type'=>'success','message'=>'Logout successfully!']);
    }

    protected function dr()
    {
        session()->flash('success', 'Signed in');
        
        $user=auth()->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard.index');
        }else {
            session()->flush();
            session()->flash('failed', 'Sorry!');
            return to_route('/')->with('alert', ['type'=>'danger','message'=>'Sorry']);
        }
    }
}
