<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Support\SupportClass;
use App\Http\Requests\CommonRequest;

class CreateController extends BaseController
{
    public function __invoke(CommonRequest $request)
    {
        $file = $request->file('mainfile');
        if (isset($file))
            $file->storeAs('img', $request->all()['title'] . '.png');
        $this->service->store($request->except(['_token', 'mainfile', 'url']), SupportClass::getType($request->all()['url']));
    }
}
