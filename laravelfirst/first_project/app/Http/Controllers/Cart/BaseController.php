<?php

namespace App\Http\Controllers\Cart;

use App\Models\Product;
use App\Services\Cart\Service;

class BaseController
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
