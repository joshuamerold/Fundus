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


  public function edit(Request $request, $id){
    if($request->name === "happy easter"){
      return view('happyEaster');
    }
    $currentModule = Module::all()->where('id', $id)->first();

    $currentModule->name = $request->name;
    $currentModule->semester = $request->semester;
    $currentModule->save();

    return redirect('/home')->with('Das wurde Modul erfolgreich bearbeitet!');
  }

  public function delete(Request $request, $id){
    $currentModule = Module::all()->where('id', $id)->first();
    if(Auth::user()->id == $currentModule->creatoruserid || Auth::user()->rights == "admin"){
      $currentModule->delete();
      return redirect('/home')->with('success', 'Das Modul wurde erfolgreich gelöscht!');
    }
    return redirect('/home')->with('error', 'Du hast keine Berechtigungen für diese Aktion!');
  }
}
