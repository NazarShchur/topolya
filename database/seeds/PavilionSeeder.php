<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PavilionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pavilions = [];

        for($i = 1; $i <= 3; $i++) {
            $name = 'Беседка №' . $i;
            $pavilions[] = [
                'name' => $name,
                'places_count' => $i*5 + 5,
                'price' => 2000 + $i*1000
            ];
        }

        DB::table('pavilions')->insert($pavilions);
    }
}
