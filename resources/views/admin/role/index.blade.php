@extends('layout.main')

@section('title')
<title>角色列表</title>
@endsection

@section('navspan')
首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span>角色列表
@endsection

@section('content')
@include('layout.msg')
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()"
                class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;"
                onclick="member_add('添加角色','member-add.html','','510')" class="btn btn-primary radius"><i
                    class="Hui-iconfont">&#xe600;</i> 添加角色</a></span> <span class="r">共有数据：<strong>88</strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
                <tr class="text-c">
                    <th width="80">ID</th>
                    <th width="100">角色名</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr class="text-c">
                    <td>{{$item->id}}</td>
                    <td><u style="cursor:pointer" class="text-primary"
                    onclick="layer_show('{{$item->role_name}}','{{route('admin.role.show',$item)}}','800','500')">{{$item->role_name}}</u>
                    </td>
                    <td>删除和修改</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- 展示数据 --}}
    {{$data->links()}}
</div>
@endsection
