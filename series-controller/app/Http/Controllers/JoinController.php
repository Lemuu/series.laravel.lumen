<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{

    public function index(Request $request)
    {
        return view('join.index');
    }

    public function login(Request $request)
    {
        $attempt = Auth::attempt($request->only(['email', 'password']));

        if (!$attempt) {
            return redirect()
                    ->back()
                    ->withErrors('Email e/ou senha incorretos.');
        }
        
        return redirect()->route('series.index');
    }

}
