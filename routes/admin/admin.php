<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['checklogin:admin.login']],function(){
    // 用户登入页面
    Route::get('login','LoginController@index')->name('admin.login');
    // 用户登入处理
    Route::post('login','LoginController@login')->name('admin.login');

    // 用户首页
    Route::get('index','IndexController@index')->name('admin.index');
    // 用户欢迎页
    Route::get('welcome','IndexController@welcome')->name('admin.welcome');
    // 用户退出
    Route::get('logout','IndexController@logout')->name('admin.logout');
});
