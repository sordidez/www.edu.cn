<?php

namespace App\Observers;
use App\Http\Requests\AuthRequest;
use App\Models\Auth;

class AuthObserver
{   // 监听模型事件
    public function creating(Auth $auth)
    {
        $auth->is_menu = request()->get('is_menu', '0');
    }
}
