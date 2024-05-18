<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processes = [
            ['processname' => 'Part description', 'price' => 0.00],
            ['processname' => 'Width', 'price' => 0.00],
            ['processname' => 'Length', 'price' => 0.00],
            ['processname' => 'Quantity', 'price' => 0.00],
            ['processname' => 'Bar', 'price' => 1.00],
            ['processname' => 'Press', 'price' => 1.06],
            ['processname' => 'Saw', 'price' => 1.00],
            ['processname' => 'Drilling', 'price' => 1.00],
            ['processname' => 'Cleaning', 'price' => 1.00],
            ['processname' => 'Painting', 'price' => 1.00],
            ['processname' => 'Pipe Thread', 'price' => 1.00],
            ['processname' => 'Pipe Engage', 'price' => 1.00],
            ['processname' => 'Press Setup', 'price' => 1.00],
        ];
        DB::table('processes')->insert($processes);
    }
}
