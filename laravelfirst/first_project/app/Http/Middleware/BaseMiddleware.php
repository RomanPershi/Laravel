<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BaseMiddleware
{

    protected function checkRole(Request $request, Closure $next, $arr_ids)
    {
        return $this->compareForeign($arr_ids, 'role_id') ? $next($request) : redirect('/');
    }

    protected function compareForeign($data, $column)
    {
        if (is_array($data))
            return $this->checkArr($data, $column);
        return auth()->user()->$column == $data;
    }

    protected function checkArr($arr_ids, $column)
    {
        foreach ($arr_ids as $id)
            if (auth()->user()->$column == $id)
                return true;
        return false;
    }
}
