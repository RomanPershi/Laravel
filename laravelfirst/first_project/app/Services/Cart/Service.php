<?php

namespace App\Services\Cart;

use App\Models\Manufacturer;
use App\Models\Product;

class Service
{
    public function getCartDates($cookie)
    {
        $some_table = Product::orderBy('price', 'ASC');
        foreach ($cookie as $part)
            $some_table = $some_table->Orwhere('id', '=', $part);
        $view_vars = compact('cookie') + [
                'total_price' => $some_table->sum('price'),
                'some_table' => $some_table->get()];
        return $view_vars;
    }
    public function update($id,$data)
    {

    }
}
