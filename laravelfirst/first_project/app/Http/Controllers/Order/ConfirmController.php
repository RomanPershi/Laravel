<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Support\CookieClass;
use Illuminate\Http\Request;

class ConfirmController extends BaseOrderController
{
    public function __invoke(Request $request)
    {
        return $this->service->addProductsCart($request,$this->service->createOrder($request)['id']);
    }
}
