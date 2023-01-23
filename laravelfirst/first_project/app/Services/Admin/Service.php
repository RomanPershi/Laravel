<?php

namespace App\Services\Admin;

use App\Http\Controllers\Support\SupportClass;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Service
{
    //ajax_count
    public function count($mode, $data)
    {
        $mode ? Product::find($data['name'])->increment('count') : Product::find($data['name'])->decrement('count');
    }

    //create
    public function store($data, $define)
    {
        $define::firstOrCreate($data);
    }

    public function createUser($data)
    {
        User::insert($data);
    }

    //update
    public function update($data, $some_model)
    {
        try {
            DB::beginTransaction();
            $query = $this->getQuery($data, $some_model);
            $this->updateData($query, $data);
            DB::commit();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function getQuery($data, $some_model)
    {
        $query = $some_model::query();
        foreach (array_keys($data) as $arr_key)
            $query->orWhere("id", "=", $arr_key);
        return $query;
    }

    public function updateData($query, $data)
    {
        foreach ($query->get() as $data_part) {
            if ($data_part->title != $data[$data_part->id]) {
                $data_part->update(['title' => $data[$data_part->id]]);
            }
        }
    }

    //updateProduct
    public function modelUpdate($data, $product_id, $some_model)
    {
        $some_model->find($product_id)->update($data);
    }

    //deleteProduct
    public function deleteData($data, $define)
    {
        $product = $define::find($data);
        $product->delete();
    }

    public function trashData($request)
    {
        $file = base_path() . '\public\products\img\\' . $request->all()['title'] . '.png';
        if ($request['define'] == 'Product' && file_exists($file))
            unlink($file);
        $this->deleteData($request->all()['name'], SupportClass::getType($request->all()['define']));
    }
}
