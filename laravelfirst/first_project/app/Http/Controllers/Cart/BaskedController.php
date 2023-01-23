<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Support\CookieClass;
use Illuminate\Http\Request;

class BaskedController extends Controller
{
    public function __invoke(Request $request)
    {
        $cookie_basked[] = $request->all()['id'];
        if (CookieClass::getCookie($request, 'basked') != NULL)
            $cookie_basked = array_merge($cookie_basked, CookieClass::getCookie($request, 'basked'));
        return CookieClass::setCookie('basked',$cookie_basked);
    }

    public function delete(Request $request)
    {
        return CookieClass::deleteCookie($request, 'basked', $request->all()['id']);
    }
}
