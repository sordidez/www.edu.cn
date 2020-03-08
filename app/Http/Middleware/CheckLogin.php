<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$params)
   {
        // 获取当前url的路由别名
        $CurrentRouteName=$request->route()->getName();

        if($CurrentRouteName==$params){
            // 不需要检测的路由，直接到控制器
            return $next($request);// $next($request) Response对象
        }

        if(auth()->check()){
            // 需要检测，且已登入，继续到最终的控制器
            return $next($request);
        }

        // 需要检测的路由，但未登入。跳转到登入页面
        session()->flush();
        return redirect()->route('admin.login')->withErrors(['error'=>'请登入']);
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



