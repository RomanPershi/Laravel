<?php

namespace App\Http\Controllers\Shop\AjaxPaginate;

use App\Http\Controllers\Controller;
use App\Services\LoadPages\Pagination\ShopPagination;
use DB;
use Illuminate\Http\Request;

class ShopPaginationController extends Controller
{
    public function fetch_data(Request $request)
    {
        $view_paginate = new ShopPagination($request,$request->all()['define']);
        return $view_paginate->consturctView(['shop/includes/product']);
    }
}

