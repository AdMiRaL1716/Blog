<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $roles = [
            [
                'name' =>'admin',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'user',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
