<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itiran>
 */
class ItiranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'syouhingazou'=> $this->faker->realText(10),
            'syouhinmei'=> $this->faker->realText(10),
            'kakaku'=> $this->faker->numberBetween($min =100, $max = 150),
            'zaikosuu'=> $this->faker->numberBetween($min =1, $max = 10),
            'maker'=> $this->faker->numberBetween($min =1, $max = 3),
            'created_at'=> date('Y-m-d H:i:s'),
        ];
    }
}
