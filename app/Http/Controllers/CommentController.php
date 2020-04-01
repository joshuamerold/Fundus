<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Comment;
use App\File;
use App\Course;
use App\Vote;

class CommentController extends NavbarController
{
    public function show($lessonId, $id){

      $rating = 0;

      $comments = Comment::all()->where('fileid', $id);
      $fileToShow = File::all()->where('id', $id)->first();
      $users = User::all();
      $courses = Course::all();
      $votes = Vote::all()->where('fileid', $id);

      foreach ($votes as $vote) {
        $rating = $rating + $vote->vote;
      }


      return view('forms.addComment')->with('comments', $comments)->with('fileToShow', $fileToShow)->with('users', $users)->with('courses', $courses)->with('rating', $rating)->with('lessonId', $lessonId);

    }

    public function store(Request $request, $lessonid, $fileid){


      $newComment = new Comment;
      $newComment->content = $request->content;
      $newComment->userid = Auth::user()->id;
      $newComment->fileid = $fileid;
      $newComment->save();
      return redirect($lessonid.'/'.$fileid.'/add/comment');
    }
}
