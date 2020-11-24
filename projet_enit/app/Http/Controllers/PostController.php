<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


use App\Http\Requests;
use App\Post;
use App\Date_cloture;
use DataTables;
use Alert;
use DB;

class PostController extends Controller
{ 

    public function authorize()
    {
        return true;
    }
    public function showconcours()
 
    {
        if (session('password_entered')) {
        $date_cloture = Date_cloture::where('id', 1)->first();
        $date_publicaltion = Date_cloture::where('id', 2)->first();
        $current_date = date("Y-m-d");

        return view("concours.page-concours", [
            'posts' => Post::all(),
            'date_pub' => $date_publicaltion,
        ])->with('date_cloture', $date_cloture)->with('current_date', $current_date);
        }

        return view('enter_password_page');
    }

    public function showconcours_fr()

    {
        $date_cloture = DB::table('date_cloture')->orderBy('id', 'DESC')->first();
        $current_date = date("Y-m-d");

        return view("concours.page-concours", [
            'posts' => Post::all(),
        ])->with('date_cloture', $date_cloture)->with('current_date', $current_date);
    }


    public function showPostAdd()
    {
        return view("postes.poste-add", [
            'posts' => Post::all(),
        ]);
    }


    public function handlepostAdd()
    {
        $data = Input::all();

        $PostData = new Post(
            array(

                'postname' => $data['postname'],
                'reference' => $data['reference'],
                'qualification' => $data['qualification'],
                'postnumber' => $data['postnumber'],
                'date_ouverture' => $data['date_ouverture'],

            )
        );

        $PostData->save();


        Alert::success('Bien !', 'Poste ajouté avec succés !')->persistent('Fermer');
        return redirect('/portal/listposts');
    }


    public function showPostList()
    {
        if (request()->ajax()) {
            return datatables()->of(Post::all())
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . Route('updatePost', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="edit" class=" btn btn-success"><i class="fas fa-edit"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class=" btn btn-danger deletepost"><i class="fas fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view("postes.poste-list");
    }

    public function handleAdddate()
    {
        $data = Input::all();
        $dateData = new Date_cloture(
            array(

                'date_cloture' => $data['date_cloture'],
            )
        );

        $dateData->save();

        Alert::success('Bien !', 'Date de clôture ajoutée avec succés !')->persistent('Fermer');
        return redirect()->back();


    }

    public function deletePost($id)
    {

        $post = Post::find($id)->delete();
        return response()->json(['success' => 'Poste supprimé.']);

    }

    public function editPost($id)
    {

        $poste = Post::where('id', $id)->first();
        return view("postes.poste-edit", ['poste' => $poste]);
    }

    public function updatePost($id)
    {

        $data = Input::all();
        $poste = Post::find($data['id']);

        $PostData = [

            'postname' => $data['postname'],
            'reference' => $data['reference'],
            'qualification' => $data['qualification'],
            'postnumber' => $data['postnumber'],
            'date_ouverture' => $data['date_ouverture'],

        ];

        $poste->update($PostData);

        Alert::success('Bien !', 'Poste modifié avec succés !')->persistent('Fermer');
        return redirect('/portal/listposts');
    }


}
