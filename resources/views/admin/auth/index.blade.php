@extends('layout.main')

@section('title')
<title>权限列表</title>
@endsection

@section('navspan')
首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span>权限列表
@endsection

@section('content')
@include('layout.msg')
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
            <a href="{{route('admin.auth.create')}}" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加权限</a>
    </div>  
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
                <tr class="text-c">
                    <th width="80">ID</th>
                    <th width="100">权限名称</th>
                    <th width="100">路由别名</th>
                    <th width="100">是否为菜单</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr class="text-c">
                    <td>{{$item->id}}</td>
                    <td>{{$item->auth_name}}</td>
                    <td>{{$item->route_name}}</td>
                    <td>
                        @if($item->is_menu=='0')
                        不是
                        @else
                        是
                        @endif
                    </td>
                    <td>删除和修改</td>
                </tr>
                @empty
                <tr class='text-c'>
                    <td colspan='5'>暂无数据</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
