<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->insert([
            [
                'company_name' => 'A',
                'street_address' => '1',
                'representative_name' => 'X',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'company_name' => 'B',
                'street_address' => '2',
                'representative_name' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'company_name' => 'C',
                'street_address' => '3',
                'representative_name' => 'Z',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
        ]);
    }
}
