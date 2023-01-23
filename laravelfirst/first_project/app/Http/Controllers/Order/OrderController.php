<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Cart\BaseController;
use App\Http\Controllers\Support\CookieClass;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function __invoke(Request $request)
    {
        $cookie = CookieClass::getCookie($request, 'basked');
        if ($cookie == NULL)
            return view('basked/basked', compact('cookie'));
        return view("order/order", $this->service->getCartDates($cookie));
    }
}
