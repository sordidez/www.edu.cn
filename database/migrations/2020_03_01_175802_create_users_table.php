<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->default(0)->comment('角色id');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('password',255)->default('')->comment('密码');
            $table->string('eamil',255)->default('')->comment('邮箱');
            $table->string('openid',255)->default('')->comment('openid');
            # 以后只要是用户表都添加这三个字段，不管用户表叫什么
            # 不是用户表就只要这两个字段
            // 创建 开始和修改时间
            $table->timestamps();
            // 软删除的字段
            $table->softDeletes();
            // 记住密码的字段
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
