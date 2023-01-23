<?php

namespace App\Http\Controllers\Admin\LoadPage;

use App\Services\LoadPages\AdminProductLoadPage;
use App\Services\LoadPages\BaseLoadPage;
use App\Services\LoadPages\BasePage;
use DB;
use Illuminate\Http\Request;

class AdminPageController
{
    public function __invoke($define,Request $request)
    {
        $attributes = new BaseLoadPage($request,$define);
        return view('/admin/manufacturer', $attributes->getPageData());
    }
}

