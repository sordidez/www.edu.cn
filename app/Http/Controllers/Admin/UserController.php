<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // 列表页，列表页有搜索
    public function index(Request $request)
    {
        // $data=User::get();
        // return view('admin.user.index',compact('data'));
        // 日期初始化
        $count = User::count();
        $dateData = ['datemin' => date("Y-m-d", time() - 31536000), 'datemax' => date('Y-m-d'), 'count' => $count];
        return view('admin.user.index', $dateData);
    }

    // 客户端进行ajax请求,然后在服务端分页，实际就是控制获取数据的条数
    public function list(Request $request)
    {
        // $order=$request->get('order')[0];
        // $dir=$request->columns;
        // print_r($order);
        // print_r($dir);
        return (new User())->search($request, 'username');
    }

    // 给用户分配角色
    public function role(User $user){
        // dump($user->role()->get()->toArray());
        // 读取全部的角色
        $role=Role::get();
        // 知道自己当前的角色
        return view('admin.user.role',compact('user','role'));
        // dump($role);
    }

    // 添加显示
    public function add()
    {
    }

    // 添加处理
    public function addSave(Request $request)
    {
    }

    // 修改
    public function edit(Request $request)
    {
    }

    // 修改的处理
    public function editsave(Request $request)
    {
    }

    // 删除                                隐式传参,传的参数不是int是对象
    public function del(Request $request, User $user)
    {
        //删除
        $user->delete();
        return ['status' => 0, 'msg' => '删除成功'];
    }
}
