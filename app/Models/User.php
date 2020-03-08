<?php

namespace App\Models;

use App\Models\traits\Query;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as UserModel;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int $role_id 角色id
 * @property string $username 用户名
 * @property string $password 密码
 * @property string $eamil 邮箱
 * @property string $openid openid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $remember_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEamil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends UserModel
{
    use Query,SoftDeletes;
    protected $datas=['deleted_at'];
    
    protected $guarded = [];
    // 获取器  get+字段名大写+Attribute($value)  $value是对应的值
    public function getCreatedAtAttribute($value)
    {
        // 因为是获取器所以一定要return出去
        return date('Y年m月d日 H时i分s秒', strtotime($value));
    }
    public function role(){
        // 把用户和表和角色表关联起来
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
