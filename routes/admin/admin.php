<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    // 用户登入页面
    Route::get('login','LoginController@index')->name('admin.login');
    // 用户登入处理
    Route::post('login','LoginController@login')->name('admin.login');
});
