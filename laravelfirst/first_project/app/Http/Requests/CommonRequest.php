<?php

namespace App\Http\Requests;

use App\Models\Manufacturer;
use Illuminate\Foundation\Http\FormRequest;
use function Sodium\add;

class CommonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arr = $this->enumeration();
        return $arr;
    }

    public function enumeration()
    {
        $arr = array();

        foreach (Manufacturer::all() as $manufacturer) {
            $arr[$manufacturer->id] = "string";
            $arr['define'] = "string";
        }
        return $arr;
    }
}
