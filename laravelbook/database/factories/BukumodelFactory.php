<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bukumodel>
 */
class BukumodelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "kodebuku" => $this->faker->unique()->numerify("####"),
            "judul" => $this->faker->words(2, true),
            "pengarang" => $this->faker->name(),
            "harga" => $this->faker->numerify("##000"),
            "idpenerbit" => $this->faker->numberBetween(1, 2)
        ];
    }
}
