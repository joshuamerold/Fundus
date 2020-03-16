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
      $year = Str::substr($dateComplete, 8, 2);
      $datecalc = $year.$month.$day;


      $newDate = new Date;
      $newDate->date = $day.".".$month.".".$year;
      $newDate->name = $request->name;
      $newDate->day = $day;
      $newDate->month = $month;
      $newDate->year = $year;
      $newDate->creatoruserid = Auth::user()->id;
      $newDate->datecalc = $datecalc;
      $newDate->yeargang = Auth::user()->coursename;

      $newDate->save();

      return redirect('/home')->with('success', "Datum erfolgreich angelegt!");
    }

    public function delete(Request $request, $id){
      $date = Date::all()->where('id', $id)->first();
      $date->delete();

      return redirect($request->currentURL)->with('success', 'Datum erfolgreich gelöscht!');

    }
}
