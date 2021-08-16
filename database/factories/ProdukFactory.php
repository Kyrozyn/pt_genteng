<?php

namespace Database\Factories;

use App\Models\produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = produk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'deskripsi' => $this->faker->text(100),
            'jenis' => $this->faker->randomElement(['Aksesoris','Genteng']),
            'stok' => $this->faker->randomNumber(3)
        ];
    }
}
