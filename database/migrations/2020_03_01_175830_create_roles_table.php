<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {   // 角色表
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name',100)->default('')->comment('角色名');
            $table->timestamps();
            $table->softDeletes();
        });
        // 角色表和权限表的中间表
        Schema::create('auth_role', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->default(0)->comment('角色id');
            $table->unsignedInteger('auth_id')->default(0)->comment('权限id');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('auth_role');
    }
}
