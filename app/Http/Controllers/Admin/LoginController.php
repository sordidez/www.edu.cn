<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class LoginController extends Controller
{
         public function index(){
             // 用户体验问题:如果用户已登入再回退可以直接到后台首页
             if(auth()->check()){
                 return redirect(route('admin.index'));
             }
             return view('admin.login.index');
         }
         // 登入处理，先验证格式，再通过Auth|auth()方法去比对数据库中的数据
         public function login(LoginRequest $request){
             # 如果不写guard则表示默认使用web(config/auth.php里面设置)
             # $user = auth('web')->attempt($request->only(['username', 'password']),true);
             # 添加一个true后，会有记住密码的功能，原理是：退出后会保存一个加密的cookie到本地，
             # 再次登入时，比对的就是本地cookie和数据库的remember_token
             $user = auth('web')->attempt($request->only(['username', 'password']));

             // 如果两个哈希值（输入的密码和数据库密码）匹配，将为该用户建立验证通过的 session。
             if ($user){
                 return redirect()->route('admin.index')->with(['msg'=>'登入成功']);
             }
             return redirect()->back()->withErrors(['error'=>'登入不合法']);
         }
}
