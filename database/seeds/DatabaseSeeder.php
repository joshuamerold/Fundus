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
          'username' =>'admin.admin.18',
          'email' => 'admin@admin.de',
          'password' => Hash::make('admin'),
          'imageURL' => '/profilePictures/chase-jiggiemon-wilson-tu_uBj2_oTQ-unsplash.jpg',
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
          'username' =>'admin1.holzer.20',
          'email' => 'admin@holzer.de',
          'password' => Hash::make('admin'),
          'courseid' => 2,
          'coursename' => 'HH20'
        ]);
        App\User::create([
          'username' =>'admin2.holzer.20',
          'email' => 'admin2@holzer.de',
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
          'name' =>'WebUsability 2',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 3
        ]);
        App\Module::create([
          'id' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9XfvfghzdsssssfQpVVPdGgYEZhBva',
          'name' =>'WebTech 3',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 3
        ]);
        App\Module::create([
          'id' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzdsdkjui8fQpVVPdGgYEZhBva',
          'name' =>'WebDesign 1',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 1
        ]);
        App\Module::create([
          'id' => 'M$2y$10$s,dljuwh1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'name' =>'Recht',
          'courseid' => 1,
          'creatoruserid' => 1,
          'semester' => 4
        ]);

        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'lessonname' =>'PHP / Webanwendungen mit PHP',
          'professorname' => 'Herr Albert',
          'moduleid' =>  'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9XfvfghzdsssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdG22222222',
          'lessonname' =>'Bootstrap',
          'professorname' => 'Herr Dietrich',
          'moduleid' =>  'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9XfvfghzdsssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfdfggds',
          'lessonname' =>'CSS Preprocessing',
          'professorname' => 'Herr Dietrich',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9XfvfghzdsssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfsddfggds',
          'lessonname' =>'Laravel',
          'professorname' => 'Herr Schäffer',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9XfvfghzdsssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);

        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfsddfggds',
          'lessonname' =>'Statistik',
          'professorname' => 'Herr Prof. Dr. Wirth',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6ussdsdsdsdssssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfdccdddds',
          'lessonname' =>'HTML/CSS',
          'professorname' => 'Herr Albert',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);

        App\Lesson::create([
          'id' => 'L$2y$10$q.LpusdsdffggffRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGdsfsddfggds',
          'lessonname' =>'Typografie',
          'professorname' => 'Herr Grossmann',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzdsdkjui8fQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'id' => 'L$2y$10$q.LpuWRa1ITL2ofXsdvfghhi7Pzr4rIIH3pfdccdddds',
          'lessonname' =>'Formen und Linien',
          'professorname' => 'Herr Starzmann',
          'moduleid' => 'M$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzdsdkjui8fQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);

        App\Lesson::create([
          'id' => 'L$2y$10$q.LpsadsdasasdauWRa1ITL2ofXsdvfghhi7Pzr4rIIH3pfdccdddds',
          'lessonname' =>'Onlinerecht',
          'professorname' => 'Frau Dietz-Roth',
          'moduleid' => 'M$2y$10$s,dljuwh1ITL2ofXRPYe6us9Xi7PzssssssssfQpVVPdGgYEZhBva',
          'creator_userid' =>1
        ]);



        App\File::create([
          'id' => 'F$2y$10$q.LpuWRasaTL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'name' =>'PHP_Zusammenfassung.pdf',
          'extension' => 'pdf',
          'path' => '/files/PHP_Zusammenfassung.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'id' => 'F$2y$10$q.LpuWRasaTL2ofXRPYe6us9Xi7Pzr4rIIsdsdH3pfQpVVPdGgYEZhBva',
          'name' =>'superduper_PHP_Zusammenfassung.pdf',
          'extension' => 'pdf',
          'path' => '/files/superduper_PHP_Zusammenfassung.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'id' => 'F$2y$10sddf$q.LpuWRasaTL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'name' =>'PHP_albert_alteklausur_ON.pdf',
          'extension' => 'pdf',
          'path' => '/files/PHP_albert_alteklausur_ON.pdf',
          'type' => 'altklausur',
          'lessonid' => 'L$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfQpVVPdGgYEZhBva',
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'id' => 'F$2y$10$q.LpuWRa1ITL2ofXRPYe6us9Xi7Pzr4rIIH3pfsdsQpVV11111111Bva',
          'name' =>'Onlinerecht_Karteikarten.jpg',
          'extension' => 'jpg',
          'path' => '/files/Onlinerecht_Karteikarten.jpg',
          'type' => 'karteikarte',
          'lessonid' => 'L$2y$10$q.LpsadsdasasdauWRa1ITL2ofXsdvfghhi7Pzr4rIIH3pfdccdddds',
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
          'representative1' => 1,
          'representative2' => 1
        ]);

    }
}
