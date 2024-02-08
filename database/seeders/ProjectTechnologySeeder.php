<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectTechnology;
use Illuminate\Support\Facades\DB;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project_technologies = [
            ["project_id" => 1, "technology_id" => 1],
            ["project_id" => 1, "technology_id" => 2],
            ["project_id" => 1, "technology_id" => 3],
            ["project_id" => 1, "technology_id" => 4],
            ["project_id" => 2, "technology_id" => 3],
            ["project_id" => 2, "technology_id" => 4],
            ["project_id" => 2, "technology_id" => 5],
            ["project_id" => 2, "technology_id" => 6],
            ["project_id" => 2, "technology_id" => 7],
            ["project_id" => 3, "technology_id" => 1],
            ["project_id" => 3, "technology_id" => 2],
            ["project_id" => 3, "technology_id" => 3],
            ["project_id" => 3, "technology_id" => 4],
            ["project_id" => 4, "technology_id" => 1],
            ["project_id" => 4, "technology_id" => 2],
            ["project_id" => 4, "technology_id" => 4],
            ["project_id" => 4, "technology_id" => 5],
            ["project_id" => 4, "technology_id" => 8],
        ];
        foreach ($project_technologies as $project_technology) {
            DB::table('project_technology')->insert($project_technology);
        }
    }
}
