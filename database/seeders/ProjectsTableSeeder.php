<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    $technologies = ['html','css','js','php','sql','MySQL','Vue','Laravel'];

    for ($i = 0; $i < 50; $i++) {
      $new_project = new Project();

      $new_project->name = str_replace(".", "", $faker->sentence(3));
      $new_project->slug = Project::generateSlug($new_project->name);
      $new_project->description = $faker->text();
      $new_project->used_technologies = implode(" | ", $faker->randomElements($technologies, rand(3, count($technologies))));
      $new_project->start_date = $faker->date();
      $new_project->is_finished = rand(0, 1);
      if($new_project->is_finished === 1) {
        do {
          $new_project->end_date = $faker->date();
        } while($new_project->end_date < $new_project->start_date);
      }

      $new_project->save();
    }
  }
}
