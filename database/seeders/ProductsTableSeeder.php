<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            [
                'name' => 'NAUGHTY AND NAVY CAGED BABYDOLL SET',
                'size' => 'OS/L/XL',
                'color' => 'Navy',
                'description' => 'Lose all your inhibitions in this sexy lace babydoll set featuring sheer scalloped lace cups with strappy bust detailing, a cage style underbust with a hook and eye back closure, a sheer mesh bodice, and a matching cage and lace panty with a cheeky cut back.',
                'brand' => 'Fantasy',
                'price' => '30.95',
                'image' => '1.jpg',
            ]
        );
    }
}
