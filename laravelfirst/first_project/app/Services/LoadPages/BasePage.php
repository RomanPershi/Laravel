<?php

namespace App\Services\LoadPages;

use App\Http\Controllers\Support\SupportClass;
use App\Models\Product;

class BasePage
{
    protected $request;
    protected $some_model;
    protected $attributes;

    public function loadElementPage($id)
    {
        $this->attributes['field'] = $this->some_model->find($id);
        $this->attributes['define'] = 'SomeField';
        return $this->attributes;
    }

    public function __construct($request, $define)
    {
        $this->request = $request;
        $all = $request->all();
        $this->some_model = (isset($all['withfilter'])) ? $this->getFilter($all, $define) : SupportClass::getType($define);
        $this->attributes = [
            'count' => 10,
            'define' => $define];
        $this->fillAttributes();
    }

    protected function getFilter($all, $define)
    {
        $some_model = SupportClass::getType($define)::query();
        $result = array();
        foreach (array_keys($all) as $part) {
            if (strpos($part, '-list') && $all[$part] != '') {
                $sub = substr($part, 0, strpos($part, '-list'));
                $result[$sub] = (!isset($result[$sub])) ? [$sub, '=', $all[$part], 'or'] : [[$sub, '=', $all[$part], 'or'], $result[$sub]];
            }
            $some_model = $this->filterValidate($part, $some_model, $all, '-countmin', '>=', $all[$part]);
            $some_model = $this->filterValidate($part, $some_model, $all, '-countmax', '<=', $all[$part]);
            $some_model = $this->filterBoolValidate($part, $some_model, $all, '-bool', '=', $all[$part]);
            $some_model = $this->filterValidate($part, $some_model, $all, '-model', 'like', '%' . $all[$part] . '%');
        }
        foreach (array_keys($result) as $part_result) {
            if (!is_array($result[$part_result][0]))
                $result[$part_result] = [$result[$part_result]];
            $some_model = $some_model->Where($result[$part_result]);
        }
        return $some_model;
    }

    protected function filterBoolValidate($part, $some_model, $all, $sign, $operator, $value)
    {
        return (strpos($part, $sign) && ($all[$part] != 'any')) ? $some_model->Where(substr($part, 0, strpos($part, $sign)), $operator, $value) : $some_model;
    }

    protected function filterValidate($part, $some_model, $all, $sign, $operator, $value)
    {
        return (strpos($part, $sign) && ($all[$part] != '')) ? $some_model->Where(substr($part, 0, strpos($part, $sign)), $operator, $value) : $some_model;
    }

    protected function fillAttributes()
    {
    }

    protected function fillArrViews($view)
    {
        $result = array();
        foreach ($view as $part_view)
            $result[] = view($part_view, $this->attributes)->render();
        return $result;
    }
}
