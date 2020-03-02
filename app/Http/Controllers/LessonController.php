<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\Module;
use App\Lesson;
use App\File;

class LessonController extends NavbarController
{
  public function showContent($id, $type){
    $user = Auth::user();
    $allUsers = User::all();
    $files = File::all()->where('lessonid', $id)->where('type', $type);
    $creators = User::all();
    $currentLesson = Lesson::all()->where('id', $id)->first();
    $courses = Course::all();

    return view('lessons.'.$type)->with('files', $files)->with('creators', $creators)->with('currentLesson', $currentLesson)->with('user', $user)->with('courses', $courses)->with('allUsers', $allUsers);
  }

  public function showAllContent($id){
    $user = Auth::user();
    $allUsers = User::all();
    $files = File::all()->where('lessonid', $id);
    $creators = User::all();
    $currentLesson = Lesson::all()->where('id', $id)->first();
    $courses = Course::all();

    return view('lessons.allCategories')->with('files', $files)->with('creators', $creators)->with('currentLesson', $currentLesson)->with('user', $user)->with('courses', $courses)->with('allUsers', $allUsers);
  }

  public function show(){

    $user = Auth::user();
    $userid = $user->id;
    $courseid = $user->courseid;
    $courses = Course::all()->where('id', $courseid);
    $currentCourse = $courses->first();

    $modules = Module::all()->where('courseid', $currentCourse->id);
    return view('forms.addLesson')->with('modules', $modules);
  }

  public function add(Request $request){
    $userid = Auth::user()->id;

    $lesson = new Lesson;
    $lesson->lessonname = $request->lessonname;
    $lesson->professorname = $request->sex." ".$request->professorname;
    $lesson->moduleid = $request->module;
    $lesson->creator_userid = $userid;
    $lesson->save();

    return redirect('/home')->with('success', ' Vorlesung erfolgreich angelegt :-)');

  }
}
