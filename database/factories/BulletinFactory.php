<?php

namespace Database\Factories;

use App\Models\Bulletin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BulletinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bulletin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'meta_info' => Str::random(6),
            'description' => Str::random(40),
            'user_id' => 1,
        ];
    }
}
