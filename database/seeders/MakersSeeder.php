<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('makers')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'str' => 'A',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'str' => 'B',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'str' => 'C',
            ],
        ]);
    }
}
