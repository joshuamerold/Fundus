<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as LaraFile;

use App\User;
use App\Course;
use App\Module;
use App\Lesson;
use App\File;

class ProfileController extends Controller
{
    public function showProfile($username){
        $currentUser = Auth::user();
        $user = User::all()->where('username', $username)->first();
        $course = Course::all()->where('id', $user->courseid)->first();

        return view('profile')->with('currentUser', $currentUser)->with('user', $user)->with('course', $course->name);
    }

    public function updateProfile(Request $request, $username){
        $user = Auth::user();
        if(){

        }
    }
}
