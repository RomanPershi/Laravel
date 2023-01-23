<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = false;
    use HasFactory;
    public function TypeKeyboard()
    {
        return $this->belongsTo(TypeKeyboard::class);
    }
    public function InterfaceConnect()
    {
        return $this->belongsTo(InterfaceConnect::class);
    }
    public function KeyboardColor()
    {
        return $this->belongsTo(KeyboardColor::class);
    }
    public function ColorKey()
    {
        return $this->belongsTo(ColorKey::class,'color_keys_id');
    }
    public function Manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }


}
