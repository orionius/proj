<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ConferenceModel;
use App\CommentModel;
use App\User;


class ConferListController extends Controller
{


    public function confer_admin()
    {
        $user = auth()->user();
        $hash = User::select('password')->where('id', '1')->first();

        if ($user->password == $hash->password) {

            /*   var_dump($conference_list); */
            $conference_list = ConferenceModel::all();
            $comments = CommentModel::all();

            return view('admin', compact('comments', 'conference_list'));
        }
    }


    public function confer_list()
    {
        $conference_list = ConferenceModel::all();
        return view('confer_list', compact('conference_list'));
    }


    public function admin_commentdelallow(request $req)
    {


        $id = $req->input('id');

        if ($req->input('allow') == 10) {
            $comments = CommentModel::where('id', $id)->first();
            $comments->allowed = 1;
            $comments->save();

        }
        if ($req->input('del') == 10) {
            CommentModel::destroy($id);
        }

        $conference_list = ConferenceModel::all();
        $comments = CommentModel::all();
        return view('admin', compact('comments', 'conference_list'));
    }


    public function admin_delconfer(request $req)
    {
        $id = $req->input('id');
        ConferenceModel::destroy($id);

        $conference_list = ConferenceModel::all();
        $comments = CommentModel::all();
        return view('admin', compact('comments', 'conference_list'));
    }

    public function confer_edit()
    {
        $conference_list = ConferenceModel::all();
        $comments = CommentModel::all();
        return view('confer_list', compact('conference_list', 'comments'));
    }


    public function confer_submit(request $req)
    {
        $id = $req->input('id');
        $edit = $req->input('edit');
        $del = $req->input('del');


        if ($edit == 5)
            $conference_list = ConferenceModel::where('id', $id)->get();
        $comments = CommentModel::all();
        $comments = CommentModel::whereRaw('id_confer = ? and allowed = 1', [$id])->get();
        return view('confer_edit', compact('conference_list', 'comments'));
    }

    public function coment_submit(request $req)
    {
        /*
                $request->validate([
                    'id' =>  'required|numeric|max:10',
                    'name' => 'required',
                    'email' => 'required',
                    'comment' => 'required',


                ]);

        */
        $id = $req->input('id');

        $comments = new CommentModel;
        $comments->id_confer = $req->input('id');
        $comments->name = $req->input('name');
        $comments->email = $req->input('email');
        $comments->comment = $req->input('comment');
        $comments->save();

        $conference_list = ConferenceModel::where('id', $id)->get();
        $comments = CommentModel::whereRaw('id_confer = ? and allowed = 1', [$id])->get();
        return view('confer_edit', compact('conference_list', 'comments'));
    }


    public function admin_download(Request $request)
    {

        $validate = $request->validate([
            'image' => 'image | required',
            'topic_name' => 'required',
            'start_date' => 'required',
            'location' => 'required',
        ]);


        $photo_link = $request->file('image')->store('uploads', 'public');


        $Conference = new ConferenceModel;
        $Conference->photo_link = $photo_link;
        $Conference->conference_name = $request->input('topic_name');
        $Conference->dates = $request->input('start_date');
        $Conference->venue = $request->input('location');
        $Conference->save();


        $conference_list = ConferenceModel::all();
        $comments = CommentModel::all();
        flash('Данные успешно добавлены')->success();
        return view('admin', compact('comments', 'conference_list'));

    }

    public function admin_commentsubmit(Request $request)
    {
        $conference_list = ConferenceModel::all();
        $comments = CommentModel::all();
        return view('admin', compact('comments', 'conference_list'));
    }
}
