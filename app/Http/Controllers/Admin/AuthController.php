<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::get();
        return view('admin.auth.index', compact('data'));
    }

    /**
     * 添加权限页面
     */
    public function create()
    {    
        $data=Auth::where('pid',0)->orWhere('pid',1)->get();
        return view('admin.auth.create',compact('data'));
    }

    /**
     *添加权限时执行的控制器
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthRequest $request)
    {   // 当添加权限的表单提交时，先到这，并且先执行AuthObserver中的方法
        $model=Auth::create($request->all());        // dump($request->all()); 
        return redirect()->route('admin.auth.index')->with(['msg'=>'【'.$model->auth_name.'】'.'添加成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
