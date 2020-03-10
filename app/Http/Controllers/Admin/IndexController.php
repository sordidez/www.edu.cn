<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\Role;
use App\Models\User;

class IndexController extends Controller
{   // 后台主页
    public function index(){
        // 得到闪存并设置闪存给下一个http请求的页面使用
        session()->flash('msg',session('msg'));
     
        // 得到当前用户的权限
        if(auth()->user()->username=='admin'){
            // 针对admin，它有所有的权限
            $auth=new Auth();
        }else{                 // 闭包
            // 当前 '用户' 所对应的 '角色' 有的 '权限'
            $auth=auth()->user()->role->auths();
        }
        $auth=$auth->where('is_menu',1)->get()->toArray();
        $auth=subTree($auth);

        return view('admin.index.index',compact('auth'));
    }
    // 后台欢迎页
    public function welcome(){
        return view('admin.index.welcome');
    }
    // 退出后台
    public function logout(){
        auth()->logout();
        return redirect(route('admin.login'))->with(['msg'=>'成功退出']);
    }
}
