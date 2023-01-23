<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Support\SupportClass;
use App\Http\Requests\CommonRequest;

class UpdateController extends BaseController
{
    public function __invoke(CommonRequest $request)
    {
        try {
            $data = $request->except(['_token']);
            $this->service->update($data, SupportClass::getType($data['url']));
            return response()->json(['Success' => 'Success']);
        } catch (\Exception $e) {
            if (strripos($e, 'Cannot delete or update a parent row: a foreign key constraint fails'))
                return response()->json(['error' => 'This is value actuality using']);
        }
    }
}
