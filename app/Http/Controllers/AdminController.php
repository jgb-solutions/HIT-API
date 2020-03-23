<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
      if (auth()->guest()) {
        return view('login');
      } else {
        return view('login');
      }
    }

    public function login(Request $request)
    {
      auth()->attempt($request->only('email', 'password'));

      return redirect('/');
    }

    public function logout()
    {
      auth()->logout();

      return redirect('/');
    }
}
