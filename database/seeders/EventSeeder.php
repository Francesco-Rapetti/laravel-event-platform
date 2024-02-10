<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Generator as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // $events = config("events");
        // foreach ($events as $event) {
        //     $newEvent = new Event();
        //     $newEvent->fill($event);
        //     $newEvent->save();
        // }

        for ($i = 0; $i < 6; $i++) {
            $newEvent = new Event();
            $newEvent->fill([
                "name" => $faker->sentence(3),
                "description" => $faker->sentence(10),
                "date" => $faker->dateTime(),
                "available_tickets" => $faker->numberBetween(1, 100),
            ]);
            $newEvent->save();
        }
    }
}
