<?php

namespace App\Http\Controllers\Order;

use App\Services\Order\Service;

class BaseOrderController
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
