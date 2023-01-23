<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CountRequest;

class CountController extends BaseController
{
    public function countup(CountRequest $request)
    {
        $this->service->count(true, $request->validated());
    }

    public function countdown(CountRequest $request)
    {
        $this->service->count(false, $request->validated());
    }
}
