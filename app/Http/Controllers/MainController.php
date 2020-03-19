<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\CourseRight;
use App\Module;
use App\Lesson;
use App\File;

class MainController extends NavbarController
{

    public function add(Request $request, $coursename){
        $course = CourseRight::all()->where('coursepartition', $coursename)->first();

        $course->representative1 = $request->adminuser1;
        $course->representative2 = $request->adminuser2;
        $course->save();

        $adminuser1 = User::all()->where('id', $request->adminuser1)->first();
        $adminuser1->rights = "admin";
        $adminuser1->save();

        $adminuser2 = User::all()->where('id', $request->adminuser2)->first();
        $adminuser2->rights = "admin";
        $adminuser2->save();

        return redirect('/home')->with('success', 'Sie haben erfolgreich die Kursesprecher bestimmt!');
    }



    public function showContent(){
      $user = Auth::user();
      $userid = $user->id;
      $courseid = $user->courseid;

      $allCourseUsers = User::all()->where('coursename', $user->coursename);
      $currentCourse = Course::all()->where('id', $courseid)->first();
      $currentCourseName = $currentCourse->studycoursename;

      $modules = Module::all()->where('courseid', $currentCourse->id);
      $lessons = Lesson::all();
      $files = File::all();

      $valCourserights = CourseRight::all()->where('coursepartition', $user->coursename)->first();

      $boolRepresentitive = true;

      if($valCourserights->representative1=='none' && $valCourserights->representative2=='none'){
        $boolRepresentitive = false;
      }

      return view('home')->with('user',$user)->with('course', $currentCourse)->with('modules', $modules)->with('lessons', $lessons)->with('files', $files)->with('alreadyAdmins', $boolRepresentitive)->with('allCourseUsers', $allCourseUsers);
      // $modules = Modules::all()->where('')
      // $users = User::all();
      // return view('test')->with('users', $users);
    }
}
