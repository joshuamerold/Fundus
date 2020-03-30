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


class ModuleController extends NavbarController
{
  public function show($semester){
    return view('forms.addModule')->with('semester', $semester);
  }

  public function add(Request $request, $semester){

    $currentUser = Auth::user();
    $currentCourse = Course::all()->where('id', $currentUser->courseid)->first();

    $currentModuleCounter = Module::all()->last()->counter;
    $idEntry =  'M'.Hash::make($currentModuleCounter+1);
    $idEntry = Str::replaceArray('/', ['I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I'], $idEntry);

    $module = new Module;
    $module->id = $idEntry;
    $module->name = $request->form_modulename;
    $module->semester = $semester;
    $module->courseid = $currentCourse->id;
    $module->creatoruserid = $currentUser->id;
    $module->save();

    return redirect('/home')->with('success', ' Modul erfolgreich angelegt :-)');
  }

  public function editShow($id){
    $currentModule = Module::all()->where('id', $id)->first();
    if(Auth::user()->id == $currentModule->id || Auth::user()->rights == "admin"){
        return view('forms.editModule')->with('currentModule', $currentModule);
    }
    return redirect('/home')->with('error', 'Du hast keine Berechtigungen für diese Aktion!');
  }

  public function edit(Request $request, $id){
    if($request->name === "happy easter"){
      return view('happyEaster');
    }
    $currentModule = Module::all()->where('id', $id)->first();

    $currentModule->name = $request->name;
    $currentModule->semester = $request->semester;
    $currentModule->save();

    return redirect('/home')->with('Modul erfolgreich bearbeitet!');
  }

  public function delete(Request $request, $id){
    $currentModule = Module::all()->where('id', $id)->first();
    if(Auth::user()->id == $currentModule->creatoruserid || Auth::user()->rights == "admin"){
      $currentModule->delete();
      return redirect('/home')->with('success', 'Modul erfolgreich gelöscht!');
    }
    return redirect('/home')->with('error', 'Du hast keine Berechtigungen für diese Aktion!');
  }
}
