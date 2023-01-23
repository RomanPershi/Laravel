<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommonRequest;
use App\Models\Product;

class ProductUpdateController extends BaseController
{
    public function __invoke(CommonRequest $request, $product_id)
    {
        $data = $request->except(['_token', 'mainfile', 'own_title']);
        $file = $request->file('mainfile');
        if (isset($file)) {
            $file->storeAs('img', $data['title'] . '.png');
        } else {
            rename(base_path() . '\public\products\img\\' . $request->all()['own_title'] . '.png', base_path() . '\public\products\img\\' . $data['title'] . '.png');
        }
        $this->service->modelUpdate($data, $product_id,new Product());
        return redirect()->route('admin.product', $product_id);
    }
}
