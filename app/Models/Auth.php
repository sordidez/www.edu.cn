<?php

namespace App\Models;

/**
 * App\Models\Auth
 *
 * @property int $id
 * @property string $name 权限名字
 * @property string $routename 路由名字
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth whereRoutename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Auth extends BaseModel
{
    //
}
