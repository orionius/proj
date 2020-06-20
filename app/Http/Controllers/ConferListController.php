<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ConferenceModel;
use App\CommentModel;

class ConferListController extends Controller
{
    
    public function confer_list ()
    {
        $conference_list = ConferenceModel::all();
        return view('confer_list', compact('conference_list')); 
      }

      
    public function confer_delete ()
    {
        ConferenceModel::destroy(1);
      }

    public function confer_edit ()
    {
        $conference_list = ConferenceModel::all();
        return view('confer_list', compact('conference_list')); 
      }
          public function confer_submit (request $req)
      {
            $id=             $req->input('id');        
            $edit=           $req->input('edit');
            $del=            $req->input('del');
      
        if ($del == 2 )
        {
            ConferenceModel::destroy([$id]);
            $conference_list = ConferenceModel::all();
            return view('confer_list', compact('conference_list')); 
         }
        if ($edit == 5 )
           $conference_list = ConferenceModel::where('id', $id)->get(); 
           return view('confer_edit', compact('conference_list')); 
        }

    public function coment_submit (request $req)
    {
        $id=             $req->input('id');  
        $name=           $req->input('name');  
        $email=          $req->input('email');  
        $comment=        $req->input('comment');  

        $comments  = new CommentModel ;
        $comments->name = $name;
        $comments->email = $email;
        $comments->comment = $comment;
        $comments->save();

        $conference_list = ConferenceModel::where('id', $id)->get(); 
        return view('confer_edit', compact('conference_list')); 
      }

      public function confer_admin ()
      {
          $conference_list =    ConferenceModel::all();
          $Comment =       CommentModel::all();
          return view('confer_list', [сompact('conference_list'),compact('Comment')]);
        }

}
