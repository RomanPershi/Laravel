<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Support\CookieClass;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    public function __invoke(Request $request)
    {
        $v = 'basked/basked';
        $cookie = CookieClass::getCookie($request, 'basked');
        if ($cookie == NULL)
            return view($v, compact('cookie'));
        return view($v, $this->service->getCartDates($cookie));
    }
}
