<?php

namespace App\Services\LoadPages\Pagination;

use App\Services\LoadPages\BasePage;

class AdminPagination extends BasePage
{
    public function consturctView($view)
    {
        $this->attributes['some_table'] = $this->some_model->paginate($this->attributes['count']);
        return $this->fillArrViews($view);
    }
}
