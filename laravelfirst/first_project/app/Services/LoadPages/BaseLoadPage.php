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

class BaseLoadPage extends BasePage
{
    public function getPageData()
    {
        $some_table = $this->some_model->paginate($this->attributes['count']);
        $this->attributes['some_table'] = $some_table;
        return $this->attributes;
    }
}
