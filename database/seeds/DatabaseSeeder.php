<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'username' =>'admin',
          'email' => 'admin@admin.de',
          'password' => Hash::make('admin'),
          'courseid' => 1
        ]);

        App\Course::create([
          'representativeid' =>1,
          'secondrepresentativeid' => 1,
          'name' => 'ON18'

        ]);

        App\Module::create([
          'name' => 'WebTech 1',
          'courseid' => '1'
        ]);
        App\Module::create([
          'name' =>'WebUsability1',
          'courseid' => '1'
        ]);

        App\Lesson::create([
          'lessonname' =>'Datenbanksysteme und Integration',
          'professorname' => 'Herr Seith',
          'moduleid' => 1
        ]);
        App\Lesson::create([
          'lessonname' =>'Katastrophale Java-Vorlesung',
          'professorname' => 'Herr Schadt',
          'moduleid' => 1
        ]);
        App\Lesson::create([
          'lessonname' =>'Statistik und BlaBla',
          'professorname' => 'Herr Weird',
          'moduleid' => 2
        ]);
    }
}
