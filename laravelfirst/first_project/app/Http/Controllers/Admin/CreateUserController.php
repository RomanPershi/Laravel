<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AjaxPaginate\AdminProductPaginationController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $this->service->createUser($data);
        return redirect()->route('admin.user.main');
    }
}
