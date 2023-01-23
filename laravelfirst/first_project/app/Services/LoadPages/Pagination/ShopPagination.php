<?php

namespace App\Services\LoadPages\Pagination;

use App\Http\Controllers\Support\CookieClass;
use App\Services\LoadPages\BasePage;

class ShopPagination extends BasePage
{
    public function consturctView($view)
    {
        $this->attributes['some_table'] = $this->some_model->orderBy('price', 'ASC')->paginate($this->attributes['count']);
        $this->attributes['cookie'] = CookieClass::getCookie($this->request, 'basked');
        return $this->fillArrViews($view);
    }
}
