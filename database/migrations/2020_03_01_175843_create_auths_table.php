<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthsTable extends Migration
{
    /**
     *权限表
     * @return void
     */
    public function up()
    {   // 权限表
        Schema::create('auths', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid')->default(1)->comment('父级权限id');
            $table->string('is_menu')->default(0)->comment('是否为菜单');
            $table->string('auth_name',100)->dafault('')->comment('权限名字');
            $table->string('route_name',100)->nullable()->comment('路由名字');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auths');
    }
}
