<?php

namespace App\Http\Controllers\Admin\LoadPage;


use App\Http\Controllers\Cart\BaseController;
use App\Services\LoadPages\AdminOrderLoadPage;
use App\Services\LoadPages\AdminProductLoadPage;
use App\Services\LoadPages\BaseLoadPage;
use App\Services\LoadPages\BasePage;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function __invoke($id, Request $request)
    {
        $attributes = new BaseLoadPage($request, 'Order');
        return view('/admin/order', $attributes->loadElementPage($id));
    }
}
