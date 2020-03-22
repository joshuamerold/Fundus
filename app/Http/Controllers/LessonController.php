<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
    $fileZcount = File::all()->where('lessonid', $id)->where('type', "zusammenfassung")->count();
    $fileAcount = File::all()->where('lessonid', $id)->where('type', "altklausur")->count();
    $fileKcount = File::all()->where('lessonid', $id)->where('type', "karteikarte")->count();

    $creators = User::all();
    $currentLesson = Lesson::all()->where('id', $id)->first();
    $courses = Course::all();

    return view('lessons.allCategories')->with('files', $files)->with('creators', $creators)->with('currentLesson', $currentLesson)->with('user', $user)->with('courses', $courses)->with('allUsers', $allUsers)->with('fileZcount', $fileZcount)->with('fileAcount', $fileAcount)->with('fileKcount', $fileKcount);
  }

  public function show($semester){

    $user = Auth::user();
    $userid = $user->id;
    $courseid = $user->courseid;
    $courses = Course::all()->where('id', $courseid);
    $currentCourse = $courses->first();

    $modules = Module::all()->where('courseid', $currentCourse->id)->where('semester', $semester);
    return view('forms.addLesson')->with('modules', $modules)->with('semester', $semester);
  }

  public function add(Request $request, $semester, $type){
    $userid = Auth::user()->id;
    $currentLessonCounter = Lesson::all()->last()->counter;
    $idEntry =  'L'.Hash::make($currentLessonCounter+1);
    $idEntry = Str::replaceArray('/', ['I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I'], $idEntry);

    if($type == "lesson"){
      //hier wenn Lesson mit bereits existierenden MOdules angelegt wird
      $lesson = new Lesson;
      $lesson->lessonname = $request->lessonname;
      $lesson->id = $idEntry;
      $lesson->professorname = $request->sex." ".$request->professorname;
      $lesson->moduleid = $request->module;
      $lesson->creator_userid = $userid;
      $lesson->save();


      return redirect('/home')->with('success', ' Vorlesung erfolgreich angelegt :-)');
    }

    else{
      //hier, wenn neues Modul angelegt wurde
      $currentCourse = Course::all()->where('id', Auth::user()->courseid)->first();
      $currentModuleCounter = Module::all()->last()->counter;
      $idEntry2 =  'M'.Hash::make($currentModuleCounter+1);
      $idEntry2 = Str::replaceArray('/', ['I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I'], $idEntry2);

      $module = new Module;
      $module->id = $idEntry2;
      $module->name = $request->newModule;
      $module->semester = $semester;
      $module->courseid = $currentCourse->id;
      $module->creatoruserid = $userid;
      $module->save();


      $lesson = new Lesson;
      $lesson->lessonname = $request->lessonname;
      $lesson->id = $idEntry;
      $lesson->professorname = $request->sex." ".$request->professorname;
      $lesson->moduleid = $request->module;
      $lesson->creator_userid = $userid;
      $lesson->save();

      $newModuleId = Module::all()->where('id', $idEntry2)->first()->id;
      $newLesson = Lesson::all()->where('id', $idEntry)->first();
      $newLesson->moduleid = $newModuleId;
      $newLesson->save();


      return redirect('/home')->with('success', ' Vorlesung erfolgreich angelegt :-)');
    }


  }
}
