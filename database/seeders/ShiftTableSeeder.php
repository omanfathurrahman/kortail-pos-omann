<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shift = [
            [
                'hari' => 'senin',
                'sesi_ke' => 1,
                'jam_mulai' => '08.00',
                'jam_selesai' => '12.30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'hari' => 'senin',
                'sesi_ke' => 2,
                'jam_mulai' => '12.30',
                'jam_selesai' => '18.00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'hari' => 'selasa',
                'sesi_ke' => 1,
                'jam_mulai' => '08.00',
                'jam_selesai' => '12.30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'hari' => 'selasa',
                'sesi_ke' => 2,
                'jam_mulai' => '12.30',
                'jam_selesai' => '18.00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        Shift::insert($shift);
    }
}
