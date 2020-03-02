@if($errors->any())
    <div class="Huialert Huialert-error">
        <i class="Hui-iconfont">&#xe6a6;</i>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

{{--后台登入验证账号或密码失败时发出--}}
@if(session()->has('error'))
    <div class="Huialert Huialert-danger">
        <i class="Hui-iconfont">&#xe6a6;</i>
        {{ session('error') }}
     </div>
@endif

{{--后台登入成功到后台首页时显示--}}
@if(session()->has('msg'))
    <div class="Huialert Huialert-success">
        <i class="Hui-iconfont">&#xe6a6;</i>
        {{ session('msg') }}
    </div>
@endif
