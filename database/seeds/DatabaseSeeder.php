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
          'name' =>  'Onlinemedien'
        ]);
        App\Course::create([
          'name' =>  'Holzhandel'
        ]);
        App\Course::create([
          'name' =>  'Wirtschaftsinformatik'
        ]);
        App\Course::create([
          'name' =>  'Baustoffe'
        ]);


        App\Module::create([
          'name' => 'WebTech 1',
          'courseid' => '1',
          'creatoruserid' => '1'
        ]);
        App\Module::create([
          'name' =>'WebUsability1',
          'courseid' => '1',
          'creatoruserid' => '1'
        ]);

        App\Lesson::create([
          'lessonname' =>'Datenbanksysteme und Integration',
          'professorname' => 'Herr Seith',
          'moduleid' => 1,
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'lessonname' =>'Katastrophale Java-Vorlesung',
          'professorname' => 'Herr Schadt',
          'moduleid' => 1,
          'creator_userid' =>1
        ]);
        App\Lesson::create([
          'lessonname' =>'Statistik und BlaBla',
          'professorname' => 'Herr Weird',
          'moduleid' => 2,
          'creator_userid' =>1
        ]);

        App\File::create([
          'name' =>'Web Usability Semester3 zusammendfa.pdf',
          'extension' => 'pdf',
          'path' => '/files/Web Usability Semester3 zusammendfa.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 3,
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'name' =>'Ajax.pdf',
          'extension' => 'pdf',
          'path' => '/files/Ajax.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 1,
          'creatoruserid' => 1,
          'courseid' => 1,
          'voting' => 0
        ]);
        App\File::create([
          'name' =>'Java.pdf',
          'extension' => 'pdf',
          'path' => '/files/Java.pdf',
          'type' => 'zusammenfassung',
          'lessonid' => 1,
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

    }
}
