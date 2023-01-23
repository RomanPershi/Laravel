<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AjaxPaginate\AdminProductPaginationController;
use Illuminate\Http\Request;

class TrashController extends BaseController
{
    public function __invoke(Request $request)
    {
        $this->service->trashData($request);
    }
}
