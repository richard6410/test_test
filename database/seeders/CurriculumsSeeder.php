<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサードのインポート
use Carbon\Carbon; // Carbonをインポートすることで、日時操作が簡単になる

class Delivery_timesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_times')->insert([
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'curriculums_id' => 1,
                'delivery_from' => Carbon::now(),
                'delivery_to' => Carbon::now()->addDays(1),
            ],
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'curriculums_id' => 2,
                'delivery_from' => Carbon::now()->addDays(2),
                'delivery_to' => Carbon::now()->addDays(3),
            ],
        ]);
    }
}