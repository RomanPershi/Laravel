<?php

namespace App\Http\Controllers\Admin\LoadPage;

use App\Services\LoadPages\AdminOrderLoadPage;
use App\Services\LoadPages\BaseLoadPage;
use App\Services\LoadPages\BasePage;
use Illuminate\Http\Request;

class AdminOrderPageController
{
    public function __invoke(Request $request)
    {
        $attributes = new BaseLoadPage($request, 'Order');
        return view('/admin/manufacturer', $attributes->getPageData());
    }
}

