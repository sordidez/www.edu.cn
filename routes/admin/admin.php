<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['checklogin:admin.login']], function () {
    // 用户登入页面
    Route::get('login', 'LoginController@index')->name('admin.login');
    // 用户登入处理
    Route::post('login', 'LoginController@login')->name('admin.login');

    // 用户首页
    Route::get('index', 'IndexController@index')->name('admin.index');
    // 用户欢迎页
    Route::get('welcome', 'IndexController@welcome')->name('admin.welcome');
    // 用户退出
    Route::get('logout', 'IndexController@logout')->name('admin.logout');

    // 管理员管理
    // 管理员列表
    Route::get('user/index', 'UserController@index')->name('admin.user.index');
    // 添加
    Route::get('user/add', 'UserController@add')->name('admin.user.add');
    Route::post('user/index', 'UserController@addSave')->name('admin.user.add');
    // 修改
    Route::get('user/edit', 'UserController@edit')->name('admin.user.edit');
    Route::put('user/edit', 'UserController@editSave')->name('admin.user.edit');
    // 删除                 路由隐式转换
    Route::delete('user/del/{user}', 'UserController@del')->name('admin.user.del');

    // ajax 请求数据
    Route::get('user/list', 'UserController@list')->name('admin.user.list');
    
    // 创建角色表的资源路由，资源控制器（一个控制器中包含了全部方法【admin.role.方法名】，不需要再定义一个方法又定义一个路由）
    Route::resource('role','RoleController',['as'=>'admin']);

    // 创建权限列表的资源路由
    Route::resource('auth','AuthController',['as'=>'admin']);
});
