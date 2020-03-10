<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    public function render(){
        return '对不起，您的权限不足请向超级管理申请更过权限';
    }
}
