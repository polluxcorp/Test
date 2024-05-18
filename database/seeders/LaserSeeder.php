<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laser = [
            ['lasertype' => 'Carbon Steel', 'price' => 0.076],
            ['lasertype' => 'Stainless Steel', 'price' => 0.11],
        ];
        DB::table('lasers')->insert($laser);
    }
}
