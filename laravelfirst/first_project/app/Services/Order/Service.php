<?php

namespace App\Services\Order;


use App\Http\Controllers\Support\CookieClass;
use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Support\Facades\DB;

class Service
{
    public function addProductsCart($request, $order_id)
    {
        try {
            DB::beginTransaction();
            foreach (CookieClass::getCookie($request, 'basked') as $part)
                $arr[] = ['product_id' => $part, 'order_id' => $order_id];
            Order_Product::insert($arr);
            DB::commit();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return CookieClass::setCookie('basked', null);
    }

    public function createOrder($request)
    {
        return Order::Create($request->all());
    }
}
