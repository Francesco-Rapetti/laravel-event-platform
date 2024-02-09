<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events_tags = [
            ["event_id" => 1, "tag_id" => 1],
            ["event_id" => 1, "tag_id" => 2],
            ["event_id" => 1, "tag_id" => 3],
            ["event_id" => 1, "tag_id" => 4],
            ["event_id" => 2, "tag_id" => 3],
            ["event_id" => 2, "tag_id" => 4],
            ["event_id" => 2, "tag_id" => 5],
            ["event_id" => 2, "tag_id" => 6],
            ["event_id" => 2, "tag_id" => 7],
            ["event_id" => 3, "tag_id" => 1],
            ["event_id" => 3, "tag_id" => 2],
            ["event_id" => 3, "tag_id" => 3],
            ["event_id" => 3, "tag_id" => 4],
            ["event_id" => 4, "tag_id" => 1],
            ["event_id" => 4, "tag_id" => 2],
            ["event_id" => 4, "tag_id" => 4],
            ["event_id" => 4, "tag_id" => 5],
            ["event_id" => 4, "tag_id" => 8],
        ];
        foreach ($events_tags as $event_tag) {
            DB::table('event_tag')->insert($event_tag);
        }
    }
}
