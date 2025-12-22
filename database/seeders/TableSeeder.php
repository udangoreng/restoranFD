<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TableSeeder extends Seeder
{
    public function run()
    {
        $tables = [
            [
                'table_number' => '01',
                'capacity' => 2,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '02',
                'capacity' => 4,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '03',
                'capacity' => 6,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '04',
                'capacity' => 10,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '05',
                'capacity' => 2,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('cust_tables')->insert($tables);
    }
}