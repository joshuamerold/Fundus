<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\Module;
use App\Lesson;


class ModuleController extends NavbarController
{
  public function show(){
    return view('forms.addModule');
  }

  public function add(Request $request){

    $currentUser = Auth::user();
    $currentCourse = Course::all()->where('id', $currentUser->courseid)->first();

    $module = new Module;
    $module->name = $request->form_modulename;
    $module->courseid = $currentCourse->id;
    $module->save();

    return redirect('/home')->with('success', ' Modul erfolgreich angelegt :-)');
  }
}
