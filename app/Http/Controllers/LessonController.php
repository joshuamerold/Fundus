<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\Module;
use App\Lesson;
use App\File;

class LessonController extends Controller
{
  public function showContent($id){

    $files = File::all()->where('lessonid', $id)->where('type', 'Zusammenfassungen');
    $creators = User::all();
    $currentLesson = Lesson::all()->where('id', $id)->first();
    
    return view('lessons.lesson')->with('files', $files)->with('creators', $creators)->with('currentLesson', $currentLesson);
  }
}
