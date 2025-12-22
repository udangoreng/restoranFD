<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TableSeeder extends Seeder
{
    public function run()
    {
        // Membuat variasi kapasitas untuk testing logika reservasi
        $tables = [
            [
                'table_number' => '01', // Meja Couple
                'capacity' => 2,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '02', // Meja Keluarga Kecil
                'capacity' => 4,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '03', // Meja Keluarga Besar
                'capacity' => 6,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '04', // Meja Group/Meeting
                'capacity' => 10,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'table_number' => '05', // Meja Couple Lainnya
                'capacity' => 2,
                'is_occupied' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('cust_tables')->insert($tables);
    }
}