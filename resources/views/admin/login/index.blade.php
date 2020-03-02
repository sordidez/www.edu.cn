<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link href="/admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>后台登录</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        @include('layout.msg')
        <form class="form form-horizontal" action="{{ route('admin.login') }}" method="post">
            {{--csrf验证--}}
            @csrf
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="text" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" type="text" name="verifycode" value="" placeholder="验证码" style="width:150px;">
                    <img id="vimg" src="{!! captcha_src('mini') !!}">
                    <a id="kanbuq" href="javascript:;">看不清，换一张</a>
                </div>
            </div>
            {{--<div class="row cl">--}}
            {{--<div class="formControls col-xs-8 col-xs-offset-3">--}}
            {{--<label for="online">--}}
            {{--<input type="checkbox" name="online" id="online" value="">--}}
            {{--使我保持登录状态</label>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 我们是最棒的</div>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script>
    $('#kanbuq').click(() => {
        // 得到图片元素对象
        let vimg = $('#vimg');
        // 获取它的src属性值，并追加内容
        let src = vimg.attr('src')+'&vt='+new Date().getTime();
        // 把内容写入到src属性中
        vimg.attr('src',src);
    });
</script>
</body>
</html>
