<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenCreateRequest;

class TokenController extends Controller
{
    public function index() 
    {
        return view('pages.tokens.index');
    }

    public function create() 
    {
        return view('pages.tokens.create');
    }

    public function store(TokenCreateRequest $request) 
    {
        $token = auth()->user()->createToken($request->name);
    }
}
