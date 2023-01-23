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

class AdminProductLoadPage extends BaseProductLoadPage
{
    protected function fillAttributes()
    {
        $this->getProductDates();
    }
}
