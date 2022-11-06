<?php

namespace Modules\Message\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Modules\Message\Models\Message;

class MessageFactory extends Factory
{
    protected $model = Message::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'    => $this->faker->name,
            'subject' => $this->faker->word,
            'email'   => $this->faker->unique()->safeEmail,
            'photo'   => $this->faker->word,
            'phone'   => $this->faker->phoneNumber,
            'message' => $this->faker->word,
            'read_at' => $this->faker->time,
        ];
    }
}
