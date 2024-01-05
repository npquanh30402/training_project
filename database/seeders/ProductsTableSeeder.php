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
                [
                    'name' => 'NAUGHTY AND NAVY CAGED BABYDOLL SET',
                    'size' => 'OS/L/XL',
                    'color' => 'Navy',
                    'description' => 'Lose all your inhibitions in this sexy lace babydoll set featuring sheer scalloped lace cups with strappy bust detailing, a cage style underbust with a hook and eye back closure, a sheer mesh bodice, and a matching cage and lace panty with a cheeky cut back.',
                    'brand' => 'Fantasy',
                    'price' => '30.95',
                    'image' => '1.jpg',
                ],
                [
                    'name' => 'I KID YOU NET BODYSTOCKING',
                    'size' => 'ONE SIZE FITS MOST',
                    'color' => 'Dark/Red/White',
                    'description' => 'Prove your seduction. Give your lover a taste of your night to come in this sexy bodystocking featuring a high keyhole neckline, sheer lace cups, a sheer mesh bodice with a netted center panel, slashed attached garters, a netted mesh and lace back with a cheeky cut bottom, and attached mesh stockings with lace tops. (Panty not included.)',
                    'brand' => 'None',
                    'price' => '14.95',
                    'image' => '2.jpg',
                ],
                [
                    'name' => 'OPEN CUP FLUTTERED LACE ROMPER',
                    'size' => 'ONE SIZE FITS MOST',
                    'color' => 'Dark',
                    'description' => 'Put yourself on display in this sexy lingerie romper featuring open underwire cups, adjustable spaghetti straps, a sheer lace and mesh bodice with piping details, satin bow accents, an opaque waistband with faux buckle detail, a hook and eye back closure, an open back panel, a fluttered waist, and a cheeky cut back.',
                    'brand' => 'None',
                    'price' => '33.95',
                    'image' => '3.jpg',
                ],
            ]
        );
    }
}
