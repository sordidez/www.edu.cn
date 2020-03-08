<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth;

class RoleController extends Controller
{
    /**
     * 角色列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // 在服务器端分页（没有用datatables，所以不用ajax请求）
        $data = Role::paginate(2);
        return view('admin.role.index', compact('data'));
    }

    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // 获取自己的权限    多对多方法
        $my_auth = $role->auths()->get()->toArray();
        $my_auth = count($my_auth) > 0 ? array_column($my_auth, 'id') : [];

        // 显示所有的权限
        // 取顶级
        $auth = Auth::where('pid', 0)->orwhere('pid', 1)->get()->toArray();
        foreach ($auth as $key => $value) {
            $auth[$key]['sub'] = Auth::where('pid', $value['id'])->get()->toArray();
        }
        return view('admin.role.show',compact('my_auth','auth','role'));
        // dump($my_auth);
    }
    // 给角色分配权限
    public function add_auth(Request $request,Role $role){
         $ids=$request->get('ids');
         $role->auths()->sync($ids);
         return redirect()->route('admin.role.index')->with(['msg'=>'分配成功']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
