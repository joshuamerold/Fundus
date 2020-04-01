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

class ProfileController extends NavbarController
{
    public function showProfile($username){
        $currentUser = Auth::user();
        $user = User::all()->where('username', $username)->first();
        $course = Course::all()->where('id', $user->courseid)->first();

        return view('profile')->with('currentUser', $currentUser)->with('user', $user)->with('course', $course->name);
    }

    public function updateProfile(Request $request, $username){

        $user = Auth::user();
        $filename = $request->profileIMG;
        if(empty($filename)){
          $user->firstname = $request->firstname;
          $user->lastname = $request->lastname;
          $user->save();
          return redirect('/home')->with('success', 'Dein Profil wurde erfolgreich aktualisiert!');
        }
        else{
          $file = $filename->getClientOriginalName();
          $extension = $filename->getClientOriginalExtension();

          $arr_extensions=Array('png', 'jpg', "jpeg", 'gif');
          foreach ($arr_extensions as $goodExtension) {
            if($goodExtension == $extension){
              $file_path = public_path() . "/profilePictures/" .$file;

              $public_path = "/profilePictures/" .$file;


              $user->firstname = $request->firstname;
              $user->lastname = $request->lastname;

              $user->imageURL = $public_path;
              $user->save();

              move_uploaded_file($_FILES["profileIMG"]["tmp_name"], $file_path);

              return redirect('/home')->with('success', 'Dein Profil wurde erfolgreich aktualisiert!');
            }
          }

          return redirect('/profile/'.$username)->with('error', 'Es sind nur Bilder gestattet!');


        }
    }
}
