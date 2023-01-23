<?php

namespace App\Http\Controllers\Admin\LoadPage;

use App\Services\LoadPages\AdminProductLoadPage;
use App\Services\LoadPages\AdminUserLoadPage;
use DB;
use Illuminate\Http\Request;

class AdminUserPageController
{
    public function __invoke(Request $request)
    {
        $attributes = new AdminUserLoadPage($request,'User');
        return view('/admin/manufacturer', $attributes->getPageData());
    }
}

