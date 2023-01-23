<?php

namespace App\Http\Controllers\Support;

use App\Models\ColorKey;
use App\Models\InterfaceConnect;
use App\Models\KeyboardColor;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\TypeKeyboard;

class SupportClass
{
    public function getType($define)
    {
        $define = 'App\Models\\' . $define;
        return new $define();
    }

    public function updateById($some_model, $id, $data)
    {
        $some_model->find($id)->update($data);
    }
}
