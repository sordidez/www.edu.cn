<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as UserModel;
class User extends UserModel
{
    //
    protected $guarded=[];
    protected $table='Users';
}
