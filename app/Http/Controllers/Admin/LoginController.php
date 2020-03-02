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
         // 登入处理，先验证格式，再通过Auth|auth()方法去比对数据库中的数据
         public function login(LoginRequest $request){
             # 如果不写guard则表示默认使用web(config/auth.php里面设置)
             $user = auth('web')->attempt($request->only(['username', 'password']));
             if ($user){
                 return redirect()->route('admin.index')->with(['msg'=>'登入成功']);
             }
             return redirect()->back()->withErrors(['error'=>'登入不合法']);
         }
}
