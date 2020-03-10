<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthException;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle($request, Closure $next, $params)
    {
        // 获取当前url的路由别名
        $CurrentRouteName = $request->route()->getName();
        if ($CurrentRouteName == $params) {
            // 不需要检测的路由，直接到控制器
            return $next($request); // $next($request) Response对象
        }
        //------------------------------------------判断用户是否有对应的权限--------------------------------
        if (auth()->check()) {
            // 获取当前用户的所有权限
            $CurrentAuth = array_column(auth()->user()->role->auths->toArray(), 'route_name');
            // 添加一些不用验证的权限
            $CurrentAuth[] = 'admin.index';
            $CurrentAuth[] = 'admin.welcome';
            $CurrentAuth[] = 'admin.loginout';
            // 判断路由当前路由是否在用户的权限之中
            if (auth()->user()->username != 'admin' && !in_array($CurrentRouteName, $CurrentAuth)) {
                throw new AuthException();
            }
            // dump(auth()->user()->role->auths->toArray());
        // ------------------------------------------判断用户是否有对应的权限--------------------------------
            // 需要检测，且已登入，继续到最终的控制器
            return $next($request);
        }
        // 需要检测的路由，但未登入。跳转到登入页面
        session()->flush();
        return redirect()->route('admin.login')->withErrors(['error' => '请登入']);
    }
}

/*// 获取当前url的路由别名
$CurrentRouteName=$request->route()->getName();
if($CurrentRouteName!=$params){
if(!auth()->check()){
session()->flush();
return redirect()->route('admin.login')->withErrors(['error'=>'请登入']);
}
}
return $next($request);*/
