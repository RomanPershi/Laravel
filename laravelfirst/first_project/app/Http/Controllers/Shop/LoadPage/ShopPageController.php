<?php

namespace App\Http\Controllers\Shop\LoadPage;

use App\Services\LoadPages\ShopLoadPage;
use DB;
use Illuminate\Http\Request;

class ShopPageController
{
    public function __invoke(Request $request)
    {
        $attributes = new ShopLoadPage($request,'Product');
        return view('/shop/shop', $attributes->getPageData());
    }
}

