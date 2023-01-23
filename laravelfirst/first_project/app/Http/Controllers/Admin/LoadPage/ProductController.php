<?php

namespace App\Http\Controllers\Admin\LoadPage;


use App\Services\LoadPages\AdminProductLoadPage;
use App\Services\LoadPages\BasePage;
use Illuminate\Http\Request;

class ProductController
{
    public function __invoke($id, Request $request)
    {
        $attributes = new AdminProductLoadPage($request, 'Product');
        return view('/admin/product', $attributes->loadElementPage($id));
    }
}
