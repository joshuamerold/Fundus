<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

use App\User;
use App\Course;
use App\Date;

class NavbarController extends Controller
{
  public function __construct()
  {

    $ldate = date('Y-m-d H:i:s');
    $year =   Str::substr($ldate, 2, 2);
    $month = Str::substr($ldate, 5, 2);
    $day = Str::substr($ldate, 8, 2);
    $currentDate = $year.$month.$day;

    $allDates = Date::all();

    foreach ($allDates as $date) {
      if ($date->datecalc < $currentDate) {
        $date->delete();
      }
    }

    $dates = Date::all()->sortBy('datecalc');


    // Sharing is dates
    View::share('dates', $dates);

  }
}
