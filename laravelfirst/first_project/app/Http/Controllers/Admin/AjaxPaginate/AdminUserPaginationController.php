<?php

namespace App\Http\Controllers\Admin\AjaxPaginate;
use App\Http\Controllers\Controller;
use App\Services\LoadPages\Pagination\AdminPagination;
use DB;
use Illuminate\Http\Request;

class AdminUserPaginationController extends Controller
{
    public function fetch_data(Request $request)
    {
        $view_paginate = new AdminPagination($request,$request->all()['define']);
        return $view_paginate->consturctView(['admin/includes/user','admin/includes/title']);
    }
}

