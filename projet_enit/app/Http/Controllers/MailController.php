<?php

namespace App\Http\Controllers;

use App\Diplome;
use App\Http\Controllers\activation_admin_two;
use App\Mail\DynamicMailSend;
use App\Message;
use App\Post;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\SendContact;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\activation_admin;
use App\Candidat;
use DB;


class MailController extends Controller
{
    public function authorize()
    {
        return true;
    }

    public function ListeAttenteSendMail($post)
    {
        $data = Message::where('id', 3)->first();

        $candidats = Candidat::where('poste_id', $post)
            ->orderBy('score_2', 'DESC')
            ->offset(5)
            ->limit(3)
            ->get();
        foreach ($candidats as $candidat) {
            Mail::to($candidat->user->email)->send(new DynamicMailSend($candidat, $data));

            Candidat::where('id', $candidat->id)->update(['state_sending_mail' => 3]);
        }
        return back();
    }

    public function sendToOne($id)
    {
        $data = Message::where('id', 2)->first();
        $candidat = Candidat::where('id', $id)->first();
        $pos = stristr($data->msg, '%poste%');
        Candidat::where('id', $id)->update(['state_sending_mail' => 2]);


        Mail::to($candidat->user->email)->send(new DynamicMailSend($candidat, $data, $pos));
        return back();
    }

    public function sendMail($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $data = $candidat->id;
        if ($candidat->state_sending_mail == 0) {
            Mail::to($candidat->user->email)->send(new activation_admin_two($data));
        }

    }

    public function rejectedSendMail($id)
    {
        $data = Message::where('id', 6)->first();

        $postes_id = DB::select("SELECT id, postname, reference from posts where id = " . $id);
        $candidats = [];
        foreach ($postes_id as $post_id) {

            $candidats[] = Candidat::where('poste_id', $post_id->id)
                ->orderBy('score_2', 'DESC')
                ->skip(8)
                ->take(PHP_INT_MAX)
                ->get();
        }

        foreach ($candidats as $candidat) {
            foreach ($candidat as $c) {
                if ($c->user->email) {
                    Mail::to($c->user->email)->send(new DynamicMailSend($c, $data));
                    Candidat::where('id', $c->id)->update(['state_sending_mail' => 6]);
                }

            }
        }
        return back();
    }

    public function rejetectedList()
    {
        $postes_id = DB::select("SELECT id, postname, reference from posts");
        $candidats = [];
        foreach ($postes_id as $post_id) {
            $candidats[$post_id->id]['poste'][] = $post_id;
            $candidats[$post_id->id]['candidat'][] = Candidat::where('poste_id', $post_id->id)
                ->orderBy('score_1', 'DESC')
                ->skip(8)
                ->take(PHP_INT_MAX)
                ->get();
        }

        return view('concours.rejected', [
            'candidats' => $candidats,
            'postes' => Post::all(),
            'diplomes' => Diplome::all(),
        ]);
    }


    public function sendGlobalMail()
    {
        $data_input = Input::all();
        $data = Message::where('id', $data_input['id'])->first();

        foreach (explode(',', $data_input['selectionn']) as $candidat_id) {
            $candidat = Candidat::where('id', $candidat_id)->first();
            if ($candidat->user->email) {
                Mail::to($candidat->user->email)->send(new DynamicMailSend($candidat, $data));
            }
            Candidat::where('id', $candidat->id)->update(['state_sending_mail' => $data_input['id']]);

        }
        return response()->json(['succes' => 1]);
    }

    public function sendPrevMail()
    {
        $data_input = Input::all();
        $data = Message::where('id', $data_input['id'])->first();
       // dd(explode(',', $data_input['selectionn']));
        foreach (explode(',', $data_input['selectionn']) as $candidat_id) {
            $candidat = Candidat::where('id', $candidat_id)->first();
            Candidat::where('id', $candidat->id)->update(['state_sending_mail_prev' => $data_input['id']]);
        }
        return response()->json(['succes' => 1]);
    }
}
