<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\Module;
use App\Lesson;

class MainController extends Controller
{
    public function showContent(){
      $user = Auth::user();
      $userid = $user->id;
      $courseid = $user->courseid;

      $courses = Course::all()->where('id', $courseid);
      $currentCourse = $courses->first();

      $modules = Module::all()->where('courseid', $currentCourse->id);
      $lessons = Lesson::all();

      return view('home')->with('user',$user)->with('course', $currentCourse)->with('modules', $modules)->with('lessons', $lessons);
      // $modules = Modules::all()->where('')
      // $users = User::all();
      // return view('test')->with('users', $users);
    }

}
