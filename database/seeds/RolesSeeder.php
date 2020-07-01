<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [];
        $roles[] = [
          'name' => 'admin'
        ];
        $roles[] = [
            'name' => 'super'
        ];

        DB::table('roles')->insert($roles);
    }
}
