<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $locations = [
            [
                'id' => 1,
                'state' => 'KIGALI CITY',
                'slug' => 'kigali_city',

            ], [
                'id' => 2,
                'state' => 'SOUTHERN PROVINCE',
                'slug' => 'southern-province',

            ], [
                'id' => 3,
                'state' => 'EASTERN PROVINCE',
                'slug' => 'eastern-province',

            ], [
                'id' => 4,
                'state' => 'NORTHERN PROVINCE',
                'slug' => 'northern-province',

            ], [
                'id' => 5,
                'state' => 'WESTERN PROVINCE',
                'slug' => 'western-province',

            ],
        ];

        Location::insert($locations);
    }
}
