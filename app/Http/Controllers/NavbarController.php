<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\User;
use App\Course;
use App\Date;

class NavbarController extends Controller
{
  public function __construct()
  {
    $dates = Date::all();
    // Sharing is dates
    View::share('dates', $dates);

  }
}
