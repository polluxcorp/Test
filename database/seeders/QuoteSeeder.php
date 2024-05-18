<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $quote = [
            ['name' => 'Quote 1', 'client' => 'Cliente 1', 'date' => '2020/01/02', 'description' => 'description for quote', 'laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 2', 'client' => 'Cliente 2', 'date' => '2020/01/02', 'description' => 'description for quote', 'laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 3', 'client' => 'Cliente 3', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 4', 'client' => 'Cliente 4', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 5', 'client' => 'Cliente 5', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 6', 'client' => 'Cliente 6', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 7', 'client' => 'Cliente 7', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 8', 'client' => 'Cliente 8', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 9', 'client' => 'Cliente 9', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 10', 'client' => 'Cliente 10', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 11', 'client' => 'Cliente 11', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 12', 'client' => 'Cliente 12', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 13', 'client' => 'Cliente 13', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 14', 'client' => 'Cliente 14', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 15', 'client' => 'Cliente 15', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 16', 'client' => 'Cliente 16', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
            ['name' => 'Quote 17', 'client' => 'Cliente 17', 'date' => '2020/01/02', 'description' => 'description for quote','laser' => 0.08, 'weld' => 0.44, 'press' => 1.06, 'saw' => 1.00, 'drilling' => 1.00, 'cleaning' => 1.00, 'painting' => 1.00, 'pipe_thread' => 1.00, 'pipe_engage' => 1.00, 'press_setup' => 1.00],
        ];
        DB::table('quotations')->insert($quote);
    }
}
