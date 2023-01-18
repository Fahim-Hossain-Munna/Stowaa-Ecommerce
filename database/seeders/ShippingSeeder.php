<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_charges')->insert([
            'shipping_type' => "Inside City",
            'shipping_charge' => '60',
            'created_at' => now(),
        ]);
        DB::table('shipping_charges')->insert([
            'shipping_type' => "Outside City",
            'shipping_charge' => '120',
            'created_at' => now(),
        ]);
    }
}
