<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partnumbers = [
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700100', 'description' => 'HHCS_.375-16UNC X1.50_GR2_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700101', 'description' => 'RUST_PREVENTATIVE', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700102', 'description' => 'PRIMER_GRAY_WATER_BASE', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700103', 'description' => 'HHCS_.250-20UNC X1.00_GR2_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700104', 'description' => 'RIVNUT_.250-20_UNC_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700105', 'description' => 'HHCS_.375-16UNC X1.25_GR5_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700106', 'description' => 'WASHER_NYLON_.375-16_GR6/6', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700107', 'description' => 'WASHER_NYLON_.625-11_GR6/6', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700108', 'description' => 'HHCS_.625-11UNC X1.75_GR2_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700109', 'description' => 'NUT_SQUARE_.375-16UNC_.63SQ', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700110', 'description' => 'GASKET_CHANNEL_.125_NEOPRENE', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700111', 'description' => 'GASKET_CHANNEL_.188_NEOPRENE', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700112', 'description' => 'HHCS_.375-16UNC X1.00_GR2_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700113', 'description' => 'GASKET_NEORPENE_.13X10.13X10.13', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700114', 'description' => 'WELDNUT_WPILOT.375-16UNC_PN', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700115', 'description' => 'HHCS_.625-11X1.50_LG_ZP', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700116', 'description' => 'WELDNUT_M5X0.8_18-8SS', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700117', 'description' => 'WELDNUT_M4X0.7_18-8SS', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700118', 'description' => 'WELDNUT_M6X1.00_18-8SS', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700119', 'description' => 'FLEXMASTER_CPLG_.50_NH1650C050B0225', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700120', 'description' => 'SOCKET_HEAD_SET_SCREW_3/8-16X.50_PLN', 'weight' => 0, 'unitmeasure' => 'units', 'width' => 0, 'length' => 0, 'price' => 0.12],

            ['sheetname' => 'CARBON_RAW_SHEET_PLATE_ #200100', 'partnumber' => '200100', 'description' => '14GA_SHEET_60"X120"_P&O_A1011','weight' => 156.3, 'unitmeasure' => 'Pounds','width' => 60, 'length' => 120, 'price' => 0.70],
            ['sheetname' => 'CARBON_RAW_SHEET_PLATE_ #200201', 'partnumber' => '200201', 'description' => '16GA_SHEET_60"X120"_P&O_A1011','weight' => 100, 'unitmeasure' => 'Pounds','width' => 60, 'length' => 120, 'price' => 0.70],
            ['sheetname' => 'CARBON_RAW_SHEET_PLATE_ #200202', 'partnumber' => '200202', 'description' => '12GA_SHEET_60"X120"_P&O_A1011','weight' => 218.8, 'unitmeasure' => 'Pounds','width' => 60, 'length' => 120, 'price' => 0.70],
            ['sheetname' => 'CARBON_RAW_SHEET_PLATE_ #200203', 'partnumber' => '200203', 'description' => '11GA_SHEET_60"X120"_P&O_A1011','weight' => 250, 'unitmeasure' => 'Pounds','width' => 60, 'length' => 120, 'price' => 0.70],
            ['sheetname' => 'CARBON_RAW_SHEET_PLATE_ #200204', 'partnumber' => '200204', 'description' => '10GA_SHEET_60"X120"_P&O_A1011','weight' => 281.3, 'unitmeasure' => 'Pounds','width' => 60, 'length' => 120, 'price' => 0.70],
        ];
        DB::table('part_numbers')->insert($partnumbers);
    }
}
