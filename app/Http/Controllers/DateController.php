<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\Date;
use App\User;


class DateController extends NavbarController
{
    public function show(){
      return view('forms.addDate');
    }


    public function add(Request $request){
      $dateComplete = $request->date;

      $day = Str::substr($dateComplete, 0, 2);
      $month = Str::substr($dateComplete, 3, 2);
      $year = Str::substr($dateComplete, 6, 4);


      $newDate = new Date;
      $newDate->date = $request->date;
      $newDate->name = $request->name;
      $newDate->day = $day;
      $newDate->month = $month;
      $newDate->year = $year;
      $newDate->creatoruserid = Auth::user()->id;
      $newDate->courseid = Auth::user()->courseid;

      $newDate->save();

      return redirect('/home')->with('success', "Datum erfolgreich angelegt!");
    }
}
