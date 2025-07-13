<?php

namespace Database\Factories;

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use App\Enums\SellRequestStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellRequest>
 */
class SellRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $date = $this->faker->dateTimeBetween('-1 week', 'now');

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone_number' => $this->faker->PhoneNumber(),
            'location' => $this->faker->secondaryAddress(),
            'address' => $this->faker->streetAddress(),
            'description' => $this->faker->paragraph(3, true),
            'property_type' => $this->faker->randomElement(PropertyTypeEnum::values()),
            'status' => $this->faker->randomElement(SellRequestStatusEnum::values()),
            'created_at' => $date,
            'updated_at' => $date,

        ];
    }
}
