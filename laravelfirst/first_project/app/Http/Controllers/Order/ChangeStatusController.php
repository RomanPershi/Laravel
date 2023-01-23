<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Cart\BaseController;
use App\Http\Controllers\Support\CookieClass;
use App\Http\Controllers\Support\SupportClass;
use Illuminate\Http\Request;

class ChangeStatusController extends BaseController
{
    public function __invoke(Request $request)
    {
        $sup = new SupportClass();
        $all = $request->all();
        SupportClass::updateById($sup->getType('Order'), $all['id'], ['status_pay' => $all['status']]);
    }
}
