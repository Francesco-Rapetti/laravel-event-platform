<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config("technologies");
        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->fill($technology);
            $newTechnology->save();
        }
    }
}
