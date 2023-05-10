<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        return view('login');
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(!(Auth::attempt($user_data)))
        {
            return back()->with('error', 'Wrong Login Details');
        }
        return redirect('home');
    }

    function successlogin()
    {
        if(Auth::user()->role == Role::ADMIN)
        {
            return view('admin_homepage');
        }
        if(Auth::user()->role == Role::PROFESSOR)
        {
            return view('professor_homepage');
        }
        if(Auth::user()->role == Role::STUDENT)
        {
            return view('student_homepage');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

