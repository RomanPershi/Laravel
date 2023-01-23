<?php

namespace App\Http\Controllers\Shop\LoadPage;


use App\Http\Controllers\Support\CookieClass;
use App\Services\LoadPages\BasePage;
use Illuminate\Http\Request;

class ProductController
{
    public function __invoke($id, Request $request)
    {
        $attributes = new BasePage($request, 'Product');
        $result = $attributes->loadElementPage($id) +
            ['cookie' => CookieClass::getCookie($request, 'basked')];
        return view('/shop/product',$result);
    }
}
