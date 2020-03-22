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
          'courseid' => 1,
          'coursename' => 'ON18'
        ]);
        App\User::create([
          'username' =>'noadmin',
          'email' => 'noadmin@noadmin.de',
          'password' => Hash::make('noadmin'),
          'courseid' => 1,
          'coursename' => 'ON18'
        ]);
        App\User::create([
          'username' =>'ON17',
          'email' => 'ON17@admin.de',
          'password' => Hash::make('admin'),
          'courseid' => 1,
          'coursename' => 'ON17'
        ]);
        App\User::create([
          'username' =>'ON16',
          'email' => 'ON16@admin.de',
          'password' => Hash::make('admin'),
          'courseid' => 1,
          'coursename' => 'ON16'
        ]);
        App\User::create([
          'username' =>'holzer',
          'email' => 'admin@holzer.de',
          'password' => Hash::make('admin'),
          'courseid' => 2,
          'coursename' => 'HH20'
        ]);

        App\Course::create([
          'name' =>  'Onlinemedien',
          'shortcut' => 'ON'
        ]);
        App\Course::create([
          'name' =>  'Holzhandel',
          'shortcut' => 'HH'
        ]);
        App\Course::create([
          'name' =>  'Wirtschaftsinformatik',
          'shortcut' => 'WI'
        ]);
        App\Course::create([
          'name' =>  'Baustoffe',
          'shortcut' => 'BA'
        ]);


        App\Module::create([
          'id' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'name' => 'WebTech 1',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 1
        ]);
        App\Module::create([
          'id' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6ussdsdsdsdssssssfQpVVPdGgYEZhBva',
          'name' =>'WebUsability1',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 1
        ]);
        App\Module::create([
          'id' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9XfvfghzdsssssfQpVVPdGgYEZhBva',
          'name' =>'WebScience2',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 2
        ]);
        App\Module::create([
          'id' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzdsdkjui8fQpVVPdGgYEZhBva',
          'name' =>'Webshit1',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 2
        ]);
        App\Module::create([
          'id' => 'M$2y$10$s,dljuwh1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'name' =>'WebMan1',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 5
        ]);

        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'lessonname' =>'Datenbanksysteme und Integration',
          'professorname' => 'Herr Seith',
          'moduleid' =>  'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdG22222222',
          'lessonname' =>'Katastrophale Java-Vorlesung',
          'professorname' => 'Herr Schadt',
          'moduleid' =>  'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfdfggds',
          'lessonname' =>'Statistik und BlaBla',
          'professorname' => 'Herr Weird',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzdsdkjui8fQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);

        App\File::create([
          'id' => 'F$2y$10$q.LpuWRasaTL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'name' =>'Web Usability Semester3 zusammendfa.pdf',
          'extension' => 'pdf',
          'path' => '/files/Web Usability Semester3 zusammendfa.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'id' => 'F$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rI55555555VPdGgYEZhBva',
          'name' =>'Ajax.pdf',
          'extension' => 'pdf',
          'path' => '/files/Ajax.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfdfggds',
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'id' => 'F$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVV11111111Bva',
          'name' =>'Java.pdf',
          'extension' => 'pdf',
          'path' => '/files/Java.pdf',
          'type' => 'altklausur',
          'lessonid' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfdfggds',
          'creatoruserid' => 2,
          'courseid' => 1,
          'voting' => 0
        ]);

        App\Comment::create([
          'content' =>'Das ist Post NR.1',
          'userid' => 1,
          'fileid' => 1,
        ]);
        App\Comment::create([
          'content' =>'Das ist Post NR.2',
          'userid' => 2,
          'fileid' => 1,
        ]);
        App\Comment::create([
          'content' =>'Das ist Post NR.3',
          'userid' => 1,
          'fileid' => 1,
        ]);

        App\Date::create([
          'name' =>'Starzmann Abgabe Redesign',
          'date' => '29.03.20',
          'day' => 29,
          'month' => 03,
          'year' => 2020,
          'creatoruserid' => 1,
          'yeargang' => 'ON18',
          'year' => 20,
          'datecalc'=> 200329
        ]);

        App\CourseRight::create([
          'coursepartition' =>'ON18',
          'representative1' => 'none',
          'representative2' => 'none'
        ]);

    }
}
