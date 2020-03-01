<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class LoginController extends Controller
{
         public function index(){
             return view('admin.login.index');
         }
         public function login(LoginRequest $request){
             $user = auth()->attempt($request->only(['username', 'password']));
             if ($user){
                 dd(auth()->user()->toArray());
             }
             return redirect()->back()->withErrors(['error','登入不合法']);

         }
}
