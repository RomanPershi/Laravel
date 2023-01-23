<?php

namespace App\Http\Controllers\Admin\LoadPage;

use App\Services\LoadPages\AdminProductLoadPage;
use DB;
use Illuminate\Http\Request;

class AdminProductPageController
{
    public function __invoke(Request $request)
    {
        $attributes = new AdminProductLoadPage($request,'Product');
        return view('/admin/manufacturer', $attributes->getPageData());
    }
}

