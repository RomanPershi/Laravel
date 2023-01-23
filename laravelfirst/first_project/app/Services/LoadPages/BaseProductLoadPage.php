<?php

namespace App\Services\LoadPages;

use App\Http\Controllers\Support\CookieClass;
use App\Http\Controllers\Support\SupportClass;
use App\Models\ColorKey;
use App\Models\InterfaceConnect;
use App\Models\KeyboardColor;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\TypeKeyboard;

class BaseProductLoadPage extends BaseLoadPage
{
    protected function getProductDates()
    {
        $this->attributes = array_merge($this->attributes,
            ['interface_connect' => InterfaceConnect::all(),
                'keyboard_color' => KeyboardColor::all(),
                'type_keyboard' => TypeKeyboard::all(),
                'color_keys' => ColorKey::all(),
                'manufacturer' => Manufacturer::all()]);
    }
}
