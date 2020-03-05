@extends('layout.main')

@section('title')
<title>管理员列表</title>
@endsection


@section('navspan')
首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span>管理员列表
@endsection
{{-- { maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' }
{ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' } --}}
@section('content')
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker()" id="datemin" value="{{$datemin}}" class="input-text Wdate"
            style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker()" id="datemax" value="{{$datemax}}" class="input-text Wdate"
            style="width:120px;">
        <input type="text" class="input-text" id="kw" style="width:250px" placeholder="输入关键字" name="">
        <button type="button" class="btn btn-success radius" id="searchbtn" name=""><i class="Hui-iconfont">&#xe665;</i>
            搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()"
                class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;"
                onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius"><i
                    class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>{{$count}}</strong>
            条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="80">ID</th>
                    <th width="100">用户名</th>
                    <th width="130">加入时间</th>
                    <th width="70">状态</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $item)
                <tr class="text-c">
                    <td><input type="checkbox" value="{{$item->id}}" name="ids[]"></td>
                <td>{{$item->id}}</td>
                <td><u style="cursor:pointer" class="text-primary"
                        onclick="member_show('张三','member-show.html','10001','360','400')">{{$item->username}}</u></td>
                <td>{{$item->created_at}}</td>
                <td class="td-status"><span class="label label-success radius">已启用</span></td>
                <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')"
                        href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑"
                        href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5"
                        style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a
                        style="text-decoration:none" class="ml-5"
                        onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;"
                        title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;"
                        onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i
                            class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
                </tr>
                @endforeach --}}

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        // datatables初始化
        var datatable = $('.table-sort').dataTable({
            // 以第二列为初始排序
            'order': [
                [1, 'asc']
            ],
            // 设置第一列和最后一列不排序
            columnDefs: [{
                targets: [0, 5],
                orderable: false
            }],
            // 下拉分页数
            'lengthMenu': [5, 10, 20],
            // 客户端搜索隐藏，不建议开启,因为他只对全部加载过来的数据有效，这个只针对客户端分页，然后搜索就很有用（比如权限管理）。而我们后面是用服务端分页
            'searching': false,
            // 在ajax请求数据时给客户的一个提示
            'processing': true,
            // 开启服务器模式，开启后只接受服务器端分页，客户端不能分页， 
            'serverSide': true,
            // ajax发起请求，在服务器中对数据进行处理
            'ajax': {
                // 请求地址
                'url': '{{route("admin.user.list")}}',
                // 请求方式 get/post

                'type': 'GET',

                // 头信信息 laravel post请求时 csrf
                // 'headers':{ 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                // 请求携带的参数
                data: d => {
                    d.datemin = $('#datemin').val();
                    d.datemax = $('#datemax').val();
                    d.kw = $('#kw').val();
                }
            },

            // 规定ajax请求来的数据的展示格式
            columns: [{
                    'data': 'aaa',
                    "defaultContent": '',
                    'className': 'text-c'
                },
                {
                    'data': 'id',
                    'className': 'text-c'
                },
                {
                    'data': 'username',
                    'className': 'text-c'
                },
                {
                    'data': 'created_at',
                    'className': 'text-c'
                },
                {
                    'data': 'deleted_at',
                    'className': 'text-c'
                },
                {
                    'data': 'bbb',
                    "defaultContent": '',
                    'className': 'text-c'
                }
            ],
            // 渲染每一行时都会调用这个函数
            // createdRow:function(row,data,dataIndex)
            createdRow(row, data) {
                // 全选复选框  es5的语法可以重复定义
                var html = `<input type="checkbox" value="${data.id}" name="ids[]">`;
                $(row).find('td:eq(0)').html(html);

                // 用户是否禁用
                var html = `<span data-id='${data.id}' class="label label-success radius">启用</span>`;
                if (data.deleted_at != null) {
                    html = `<span data-id='${data.id}' class="label label-warning radius">禁用</span>`;
                }
                $(row).find('td:eq(4)').html(html);

                // 修改和删除操作
                var html = `<div class="btn-group">
                            <a href="" class="	btn btn-secondary-outline radius">修改</a>
                            <a href="/admin/user/del/${data.id}" class="btn btn-danger-outline radius delbtn">删除</a>
                          </div>`;
                $(row).find('td:eq(5)').html(html);
            }
        });

        // 点击搜索让datatables加载一次，搜索功能的完成
        $('#searchbtn').click(() => {
            datatable.api().ajax.reload();
        });

        // 给删除添加事件 委托
        $('.table-sort').on('click', '.delbtn', function (evt) {
            // 阻止默认事件
            evt.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url,
                type: 'DELETE',
                data: {
                    _token: '{{csrf_token()}}',
                },
                dataType: 'json',
                success: ret => {
                    $(this).parents('tr').remove();
                    layer.msg('删除成功', {
                        time: 2000,
                        icon: 6
                    });
                }
            });
        });
    });

</script>
@endsection
