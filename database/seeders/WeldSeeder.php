<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weld = [
            ['weldtype' => 'Carbon Steel', 'price' => 0.44],
            ['weldtype' => 'Stainless Steel', 'price' => 0.56],
        ];
        DB::table('welds')->insert($weld);
    }
}
