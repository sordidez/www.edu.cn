@extends('layout.main')

@section('content')
<article class="page-container">
    <form action="{{route('admin.auth.store')}}" method="post" class="form form-horizontal" id="form-admin-role-add">
        @csrf
        <div class="row cl">
            <label class="form-label col-sm-2">父级权限：</label>
            <div class="formControls col-sm-10">
                <span class="select-box">
                    <select name="pid" class="select">
                        <option value="0">父级权限列表</option>
                        @foreach ($data as $item)                                       
                        <option value="{{$item->id}}">{{$item->auth_name}}</option> 
                        @endforeach    
                        {{-- pid={{$item->id}} --}}
                    </select>
                </span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-sm-2"><span class="c-red">*</span>子级权限名称：</label>
            <div class="formControls col-sm-10">
                <input type="text" class="input-text" value="" placeholder="" name="auth_name">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-sm-2">路由别名：</label>
            <div class="formControls col-sm-10">
                <input type="text" class="input-text" value="" placeholder="" name="route_name">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label  col-sm-2">是否为菜单：</label>
            <div class="formControls col-sm-10 skin-minimal">
                <div class="check-box">
                    <input type="checkbox" value="1" name="is_menu">
                    <label for="checkbox-pinglun">&nbsp;</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <div class="  col-sm-0 col-sm-offset-11">
                <button type="submit" class="btn btn-success radius"><i class="icon-ok"></i>确定添加</button>
            </div>
        </div>
    </form>
</article>
@endsection

@section('js')
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script>
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#form-admin-role-add").validate({
        rules: {
            auth_name: {
                required: true,
            },
            // route_name: {
            //     required: true,
            // },
        },
        message: {
            auth_name: {
                required: '权限名字不能为空',
            },
            // toute_name:{
            //     required:'路由别名不能为空',
            // },
        },
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function (form) {
            form.submit();
        }
    });

</script>
@endsection
