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
    $module->creatoruserid = $currentUser->id;
    $module->save();

    return redirect('/home')->with('success', ' Modul erfolgreich angelegt :-)');
  }

  public function editShow($id){
    $currentModule = Module::all()->where('id', $id)->first();
    if(Auth::user()->id == $currentModule->id){
        return view('forms.editModule')->with('currentModule', $currentModule);
    }
    return redirect('/home')->with('error', 'Du hast keine Berechtigungen für diese Aktion!');
  }

  public function edit(Request $request, $id){
    $currentModule = Module::all()->where('id', $id)->first();

    $currentModule->name = $request->name;
    $currentModule->save();

    return redirect('/home')->with('Modul erfolgreich bearbeitet!');
  }

  public function delete(Request $request, $id){
    $currentModule = Module::all()->where('id', $id)->first();
    if(Auth::user()->id == $currentModule->creatoruserid){
      $currentModule->delete();
      return redirect('/home')->with('success', 'Modul erfolgreich gelöscht!');
    }
    return redirect('/home')->with('error', 'Du hast keine Berechtigungen für diese Aktion!');
  }
}
