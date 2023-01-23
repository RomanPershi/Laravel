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

class ShopLoadPage extends BaseProductLoadPage
{
    protected function fillAttributes()
    {
        $this->some_model = $this->some_model->orderBy('price', 'ASC');
        $this->attributes['cookie'] = CookieClass::getCookie($this->request,'basked');
        $this->getProductDates();
    }
}
