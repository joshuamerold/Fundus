<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Comment;
use App\File;
use App\Course;
use App\Vote;

class VoteController extends NavbarController
{
    public function up($lessonid, $id){

      $userid = Auth::user()->id;
      $voteYet = Vote::all()->where('userid', $userid)->where('fileid', $id);

      if(sizeof($voteYet) != 0){
        return redirect($lessonid.'/'.$id.'/add/comment')->with('error', 'Du hast diese Datei bereits bewertet.');
      }

      $currentFile = File::all()->where('id', $id)->first();

      $currentVote = $currentFile->voting;
      $newVoting = $currentVote +1;
      $currentFile->voting = $newVoting;
      $currentFile->save();

      $currentVote = new Vote;
      $currentVote->userid = $userid;
      $currentVote->fileid = $id;
      $currentVote->vote = 1;
      $currentVote->save();

      return redirect($lessonid.'/'.$id.'/add/comment');
    }

    public function down($lessonid, $id){
      $userid = Auth::user()->id;
      $voteYet = Vote::all()->where('userid', $userid)->where('fileid', $id);

      if(sizeof($voteYet) != 0){
        return redirect($lessonid.'/'.$id.'/add/comment')->with('error', 'Du hast diese Datei bereits bewertet.');
      }

      $currentFile = File::all()->where('id', $id)->first();

      $currentVote = $currentFile->voting;
      $newVoting = $currentVote -1;
      $currentFile->voting = $newVoting;
      $currentFile->save();

      $currentVote = new Vote;
      $currentVote->userid = $userid;
      $currentVote->fileid = $id;
      $currentVote->vote = -1;
      $currentVote->save();

      return redirect($lessonid.'/'.$id.'/add/comment');
    }
}
