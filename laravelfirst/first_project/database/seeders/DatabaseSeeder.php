<?php

namespace Database\Seeders;

use App\Models\ColorKey;
use App\Models\InterfaceConnect;
use App\Models\KeyboardColor;
use App\Models\Manufacturer;
use App\Models\Roles;
use App\Models\TypeKeyboard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $manufacturer = ['2E', 'A4Tech', 'Acelin', 'Acer', 'AKKO', 'AOC', 'Apple', 'ASUS', 'AULA', 'Canyon', 'Corsair', 'Cougar'];
        $color_key = ['Without','White', 'Red', 'Blue', 'Yellow', 'Green', 'RGB', 'Manycolors', 'Orange', 'Purple', 'Lilac'];
        $interface_connet = ['Bluetooth', 'Lightning', 'PS/2', 'USB'];
        $type_keoboard = ['Analog optical', 'Membranous', 'Mechanical', 'Optomechanical'];
        $keyboard_color = ['White', 'Red', 'Blue', 'Yellow', 'Green', 'RGB', 'Manycolors', 'Orange', 'Purple', 'Lilac'];
        $roles = ['user', 'moderator', 'admin','worker'];
        $this->createData(new Manufacturer(), $manufacturer);
        $this->createData(new ColorKey(), $color_key);
        $this->createData(new InterfaceConnect(), $interface_connet);
        $this->createData(new TypeKeyboard(), $type_keoboard);
        $this->createData(new KeyboardColor(), $keyboard_color);
        $this->createData(new KeyboardColor(), $keyboard_color);
        $this->createData(new Roles(), $roles);
    }

    function createData($model, $data)
    {
        foreach ($data as $part) {
            $model->create(['title' => $part]);
        }
    }
}
