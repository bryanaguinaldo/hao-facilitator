<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReleasedPatientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bulacan_places = array("Angat", "Balagtas", "Baliuag", "Bocaue", "Bulakan", "Bustos", "Calumpit", "Doña Remedios Trinidad", "Guiguinto", "Hagonoy", "Malolos", "Marilao", "Meycauayan", "Norzagaray", "Obando", "Pandi", "Paombong", "Plaridel", "Pulilan", "San Ildefonso", "San Jose del Monte", "San Miguel", "San Rafael", "Santa Maria");
        return [
            'userid' => auth()->user()->id,
            'patient_name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'age' => rand(15, 85),
            'address' => $bulacan_places[array_rand($bulacan_places)] . ", Bulacan",
            'release_date' => $this->faker->dateTimeBetween('-30 days', '-1 days')->format("Y-m-d H:i:s"),
        ];
    }
}
