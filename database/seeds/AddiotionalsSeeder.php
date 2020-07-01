<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddiotionalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $additionals = [];

        $additionals[] = [
            'name' => 'Холодильник',
            'price' => 500,
            'is_hourly'=> false,
            'is_active' => true
        ];
        $additionals[] = [
            'name' => 'Целый холодильник',
            'price' => 1000,
            'is_hourly'=> false,
            'is_active' => true
        ];
        $additionals[] = [
            'name' => 'Электронный чайник',
            'price' => 100,
            'is_hourly'=> true,
            'is_active' => true
        ];
        $additionals[] = [
            'name' => 'Бассейн',
            'price' => 200,
            'is_hourly'=> false,
            'is_active' => true,

        ];
        $additionals[] = [
            'name' => 'Кальян (чаша с табаком + 3 угля)',
            'price' => 1000,
            'is_hourly'=> false,
            'is_active' => true
        ];
        $additionals[] = [
            'name' => 'Кальян',
            'price' => 500,
            'is_hourly'=> false,
            'is_active' => true
        ];
        $additionals[] = [
            'name' => 'Настольный теннис',
            'price' => 200,
            'is_hourly'=> true,
            'is_active' => true
        ];
        DB::table('additionals')->insert($additionals);
    }
}
