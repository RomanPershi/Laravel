<?php

namespace App\Http\Controllers\Support;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieClass
{
    public function setCookie($name, $value)
    {
        $response = new Response('Set Cookie');
        $response->withCookie($name, json_encode($value),86400 * 30 * 12);
        return $response;
    }

    public function getCookie(Request $request, $key)
    {
        return json_decode($request->cookie($key));
    }

    public function deleteCookie(Request $request, $key, $value)
    {
        $cookie_arr = self::getCookie($request, $key);
        foreach (array_keys($cookie_arr) as $part) {
            if ($cookie_arr[$part] == $value)
                unset($cookie_arr[$part]);
        }
        return self::setCookie($key, array_merge($cookie_arr, $arr = array()));
    }
}
