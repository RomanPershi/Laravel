<?php

namespace App\Http\Controllers\Shop\LoadPage;

use App\Http\Controllers\Controller;
use App\Models\ColorKey;
use App\Models\InterfaceConnect;
use App\Models\KeyboardColor;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\TypeKeyboard;
use App\Services\LoadPages\Service;

class PagesShopController extends Controller
{
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
