<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'nama' => 'dayat',
            'nikkaryawan' => '10032861',
            'sid' => '1VLGU',
            'usia' => '26',
            'jabatan' => 'Teknis',
            'perusahaan' => 'PT DYNO',
            'jeniskelamin' => 'Laki-laki',
            'nohp' => '081348112075',
            'induksihr' => 'Sudah',
            'induksishe' => 'Sudah',
            'created_at' => '2025-02-18 01:36:12',
        ]);
    }
}
