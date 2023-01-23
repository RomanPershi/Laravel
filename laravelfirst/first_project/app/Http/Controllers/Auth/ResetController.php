<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetController extends BaseController
{
    public function __invoke(Request $request)
    {
        $all = $request->except('_token');
        if (Hash::check($all['old_pass'], auth()->user()->password)) {
            $this->service->modelUpdate(['password' => Hash::make($all['new_pass'])], auth()->user()->id, new User());
            dd(1);
        }
    }
}
