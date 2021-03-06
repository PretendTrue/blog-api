<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'markdown' => $this->faker->text(),
            'reply_count' => $this->faker->randomNumber(),
            'view_count' => $this->faker->randomNumber(),
        ];
    }
}
