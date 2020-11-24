<?php

namespace App\Http\Controllers;

use App\CandidatHistory;
use App\Diplome;
use App\Mail\ResetPassword;
use App\Message;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Candidat;
use App\Date_cloture;
use App\Notes;
use DB;
use Alert;
use Auth;
use Config;
use Session;
use Illuminate\Session\Store;

class scoreController extends Controller
{
    public function authorize()
    {
        return true;
    }

    public
    function calculateFirstScore($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $score = 0;
        if ($candidat) {
            if (in_array($candidat->post()->first()->reference, ['C01/2019', 'C02/1/2019', 'C02/2/2019', 'C03/2019', 'C04/1/2019', 'C04/2/2019', 'C04/3/2019'])) {
                if ($candidat->preparatory_study == 'yes') {
                    $score = ($candidat->Bachelor_degree * 1.5) + ($candidat->last_year_degree_without_pfe * 1.1);
                } else {
                    $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                }
            } else if (in_array($candidat->post()->first()->reference, ['C05/1/2019', 'C05/2/2019', 'C06/1/2019', 'C06/2/2019', 'C06/3/2019', 'C06/4/2019', 'C06/5/2019', 'C06/6/2019', 'C06/7/2019', 'C06/8/2019', 'C06/9/2019', 'C08/2019'])) {
                $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
            } else if (in_array($candidat->post()->first()->reference, ['C07/2019'])) {
                if ($candidat->diplome->qualification == 'technicien') {
                    if ($candidat->diplome_id == 39) {
                        $score = $candidat->last_year_degree_without_pfe;
                    } else if ($candidat->diplome_id == 29) {
                        $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                    }
                } else {
                    $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                }
            } else if (in_array($candidat->post()->first()->reference, ['C09/2019'])) {
                if ($candidat->diplome->qualification == "technicien") {
                    if ($candidat->diplome_id == 32) {
                        $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                    } else {
                        $score = $candidat->last_year_degree_without_pfe;
                    }
                }
            } else if (in_array($candidat->post()->first()->reference, ['C10/2019'])) {
                $score = $candidat->last_year_degree_without_pfe;
            } else if (in_array($candidat->post->reference, ['C11/2019'])) {
                $age = DB::select("SELECT TIMESTAMPDIFF(DAY, birthday, CURDATE()) as age from candidats where id = " . $id);
                $premis = DB::select("SELECT TIMESTAMPDIFF(DAY, date_of_obtaining_a_driving_license, CURDATE()) as permis from candidats where id = " . $id);
                $score = ((($age[0]->age / 365) * 0.67) + ($premis[0]->permis / 365) * 0.33);
                //$candidat->score_2 = $score;
                //$candidat->score_1 = $score;
                //$candidat->save();
            } else if (in_array($candidat->post->reference, ['C12/2019', 'C13/2019'])) {
                $age = DB::select("SELECT TIMESTAMPDIFF(DAY, birthday, CURDATE()) as age from candidats where id = " . $id);
                //$candidat->score_2 = $score;
                // $candidat->score_1 = $score;
                //  $candidat->save();
                $score = ($age[0]->age / 365);
            } else {
                return response()->json(['candidat' => 'found', 'score' => 'choose a post first']);
            }
            $candidat->score_1 = $score;
            $candidat->save();
            return response()->json(['candidat' => 'found', 'score' => round($score, '2')]);
        } else {
            return response()->json(['candidat' => 'not found', 'score' => '']);
        }
    }

    public
    function CalculateAge($date)
    {
        $age = date('Y') - date('Y', strtotime($date));
        if (date('md') < date('md', strtotime($date))) {

        }

        return $age;
    }

    public function calculateSecondScore($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $score = 0;

        if ($candidat) {
            if (in_array($candidat->post->reference, ['C11/2019'])) {
               // $age = DB::select("SELECT TIMESTAMPDIFF(DAY, birthday, CURDATE()) as age from candidats where id = " . $id);
                //$premis = DB::select("SELECT TIMESTAMPDIFF(DAY, date_of_obtaining_a_driving_license, CURDATE()) as permis from candidats where id = " . $id);
                $score = $candidat->notes->first()->note_psychotechnique;
                $candidat->score_2 = $score;
                $candidat->save();
            } else if (in_array($candidat->post->reference, ['C12/2019', 'C13/2019'])) {
                $score =  $candidat->notes->first()->note_psychotechnique;
                $candidat->score_2 = $score;
                $candidat->save();
            } else {
                $score = ($candidat->notes->first()->note_dossier * 4 + $candidat->notes->first()->note_psychotechnique * 5 + $candidat->notes->first()->note_question_ecrite) / 10;
                $candidat->score_2 = $score;
                $candidat->save();
            }
            return response()->json(['candidat' => 'found', 'score' => round($score, '2')]);
        } else {
            return response()->json(['candidat' => 'not found', 'score' => '']);
        }
    }

    public
    function showNoteAdd($id)
    {
        $user = User::where('cin', $id)->first();
        $candidat = $user->candidat->first();
        $note = Notes::where('candidat_id', $candidat->id)->first();
        if (is_null($note)) {
            $note = Notes::create([
                'candidat_id' => $candidat->id,
                'note_dossier' => 0,
                'note_psychotechnique' => 0,
                'note_question_ecrite' => 0,
            ]);
        }
        return view("notes.notes-add", [
            'notes' => $note,
        ])->with('candidat', $candidat);
    }

    public
    function handleNoteAdd()
    {
        $data = Input::all();

        $note = Notes::where('candidat_id', $data['candidat_id'])->first();

        $candidat = Candidat::where('id', $data['candidat_id'])->first();
        if ($note) {
            $note->delete();
        }

        $NoteData = new Notes(
            array(
                'candidat_id' => $data['candidat_id'],
                'note_dossier' => $data['note_dossier'],
                'note_psychotechnique' => $data['note_psychotechnique'],
                'note_question_ecrite' => $data['note_question_ecrite'],

            )
        );
        $NoteData->save();

        $this->calculateSecondScore($data['candidat_id']);
        Alert::success('Bien !', 'Note ajoutée avec succés !')->persistent('Fermer');
        return back();
    }

    public
    function showConformityAdd($id, Request $request)
    {
        $res = 0;
        $user = User::where('cin', $id)->first();
        $candidat = Candidat::where('user_id', $user->id)->first();

        if ($candidat->state_sending_mail_prev) {
            $data = Message::where('id', $candidat->state_sending_mail_prev)->first();
            $res = 1;
        } else {
            $data = "Ce candidat n'est pas encore notifiée par mail";
            $res = 0;
        }

        return view('notes.conformite-add', [
            'res' => $res,
            'candidat' => $candidat,
            'data' => $data,]);
    }

    public
    function handleConformityAdd()
    {

        $data = Input::all();
        $permis = '';
        if (empty($data['conformite_permis'])) {
            $permis = null;
        } else {
            $permis = $data['conformite_permis'];
        }
        $message = 0;
        Candidat::where('id', $data['candidat_id'])->update([
            'conformite_age' => empty($data['conformite_age']) ? null : $data['conformite_age'],
            'conformite_cin' => empty($data['conformite_cin']) ? null : $data['conformite_cin'],
            'conformite_diplome' => empty($data['conformite_diplome']) ? null : $data['conformite_diplome'],
            'conformite_permis' => empty($data['conformite_permis']) ? null : $data['conformite_permis'],
            'conformite_note' => empty($data['conformite_note']) ? null : $data['conformite_note'],
            'dossier_complet' => empty($data['dossier_complet']) ? null : $data['dossier_complet'],

            'conformite_etude_prepa' => empty($data['conformite_etude_prepa']) ? null : $data['conformite_etude_prepa'],
            'conformite_attestation_inscription' => empty($data['conformite_attestation_inscription']) ? null : $data['conformite_attestation_inscription'],
            'conformite_diplome_mecanique' => empty($data['conformite_diplome_mecanique']) ? null : $data['conformite_diplome_mecanique'],
            'conformite_attestation_scolarite' => empty($data['conformite_attestation_scolarite']) ? null : $data['conformite_attestation_scolarite'],


            'remarque' => $data['remarque'],
        ]);

        Alert::success('Conformité Vérifiée !')->persistent('Fermer');
        return back()->with([
            'res' => 1,
        ]);
    }

    public function improperCandidate()
    {
        $postes_id = DB::select("SELECT id, postname, reference from posts");
        $candidats = [];
        $order = "DESC";
        foreach ($postes_id as $post_id) {
            if (in_array($post_id->id, ['24', '25'])) {
                $order = "ASC";
            } else {
                $order = "DESC";
            }
            $candidats[$post_id->id]['poste'][] = $post_id;
            $cs = Candidat::where('poste_id', $post_id->id)
                ->whereNotNull('score_1')
                ->where(function ($query) {
                    $query->orWhere('conformite_age', 'no')
                        ->orWhere('conformite_cin', 'no')
                        ->orWhere('conformite_permis', 'no')
                        ->orWhere('conformite_note', 'no')
                        ->orWhere('conformite_etude_prepa', 'no')
                        ->orWhere('conformite_attestation_inscription', 'no')
                        ->orWhere('conformite_diplome_mecanique', 'no')
                        ->orWhere('conformite_attestation_scolarite', 'no');
                })
                ->orderBy('score_1', $order)
                ->limit(8)
                ->get();
            foreach ($cs as $candidat) {
                $candidats[$post_id->id]['candidat'][] = $candidat;
            }
        }
        //    dd($candidats);
        return view('concours.improper', ['candidats' => $candidats,
            'postes' => Post::all(),
            'diplomes' => Diplome::all(),
            'messages' => Message::all(),]);
    }

    public
    function acceptedCandidate()
    {
        $postes_id = DB::select("SELECT id, postname, reference from posts");
        $candidats = [];
        $order = "DESC";
        foreach ($postes_id as $post_id) {
            if (in_array($post_id->id, ['24', '25'])) {
                $order = "ASC";
            } else {
                $order = "DESC";
            }
            $candidats[$post_id->id]['poste'][] = $post_id;
            $cs = Candidat::where('poste_id', $post_id->id)
                ->whereNotNull('score_1')
                ->orderBy('score_1', $order)
                ->limit(8)
                ->get();

            foreach ($cs as $candidat) {

                if (($candidat->conformite_age == 'no' || $candidat->conformite_cin == 'no' || $candidat->conformite_diplome == 'no' || $candidat->conformite_permis == 'no' || $candidat->conformite_note == 'no'
                    || $candidat->conformite_etude_prepa == 'no' || $candidat->conformite_attestation_inscription == 'no' || $candidat->conformite_diplome_mecanique == 'no' || $candidat->conformite_attestation_scolarite == 'no')
                ) {
                    $candidats[$post_id->id]['candidat_not_confirmed'][] = $candidat;
                } else {
                    $candidats[$post_id->id]['candidat'][] = $candidat;
                }
            }
        }
        return view('concours.accepted', ['candidats' => $candidats,
            'postes' => Post::all(),
            'diplomes' => Diplome::all(),
            'messages' => Message::all(),]);
    }

    public function getLastSelection()
    {
        $postes_id = DB::select("SELECT id, postname, reference from posts");
        $candidats = [];
        $order = "DESC";
        foreach ($postes_id as $post_id) {
            if (in_array($post_id->id, ['24', '25'])) {
                $order = "ASC";
            } else {
                $order = "DESC";
            }
            $candidats[$post_id->id]['poste'][] = $post_id;
            $cs = Candidat::where('poste_id', $post_id->id)
                ->whereNotNull('score_1')
                ->orderBy('score_1', $order)
                ->limit(8)
                ->get();

            foreach ($cs as $candidat) {

                if (($candidat->conformite_age == 'no' || $candidat->conformite_cin == 'no' || $candidat->conformite_diplome == 'no' || $candidat->conformite_permis == 'no' || $candidat->conformite_note == 'no'
                    || $candidat->conformite_etude_prepa == 'no' || $candidat->conformite_attestation_inscription == 'no' || $candidat->conformite_diplome_mecanique == 'no' || $candidat->conformite_attestation_scolarite == 'no')
                ) {
                    $candidats[$post_id->id]['candidat_not_confirmed'][] = $candidat;
                } else {
                    $candidats[$post_id->id]['candidat'][] = $candidat;
                }
            }
        }
        //dd($candidats);
        //    dd($candidats);
        return view('concours.last-selection', ['candidats' => $candidats,
            'postes' => Post::all(),
            'diplomes' => Diplome::all(),
            'messages' => Message::all(),]);
    }


    public
    function acceptedConformeCandidate()
    {
        $postes_id = DB::select("SELECT id, postname, reference from posts");
        $candidats = [];
        foreach ($postes_id as $post_id) {
            $candidats[$post_id->id]['poste'][] = $post_id;
            $candidats[$post_id->id]['candidat'][] = Candidat::where('poste_id', $post_id->id)
                ->orderBy('score_1', 'DESC')
                ->limit(8)
                ->get();
        }
        return view('concours.accepted-conforme', [
            'candidats' => $candidats,
            'postes' => Post::all(),
            'diplomes' => Diplome::all(),
        ]);
    }

    public
    function filtyerAcceptedConformeCandidate()
    {
        $data = Input::all();
        $filter = '';
        $candidats = [];

        if ($data['post_id']) {
            $filter = 2;
            $candidats[$data['post_id']]['poste'][] = DB::select("SELECT id, postname, reference from posts where id=" . $data['post_id']);
            $candidats[$data['post_id']]['candidat'][] = Candidat::where('poste_id', $data['post_id'])
                ->orderBy('score_1', 'DESC')
                ->limit(8)
                ->get();
        }
        return view('concours.filter-accepted-conforme', [
            'candidats' => $candidats,
            'filter' => $filter,
        ]);
    }


    public
    function FinalacceptedCandidate()
    {
        $postes_id = DB::select("SELECT id, postname, reference from posts");
        $candidats = [];
        foreach ($postes_id as $post_id) {
            $candidats[$post_id->id]['poste'][] = $post_id;
            $candidats[$post_id->id]['candidat'][] = Candidat::where('poste_id', $post_id->id)
                ->orderBy('score_2', 'DESC')
                ->limit(5)
                ->get();
        }
        return view('concours.final-accepted', [
            'candidats' => $candidats,
            'postes' => Post::all(),
            'diplomes' => Diplome::all(),
        ]);
    }

    public
    function filtyerAcceptedCandidate()
    {

        $data = Input::all();
        $filter = '';
        $candidats = [];

        if ($data['post_id']) {
            if (in_array($data['post_id'], ['24', '25'])) {
                $order = "ASC";
            } else {
                $order = "DESC";
            }
            $filter = 2;
            $candidats[$data['post_id']]['poste'][] = DB::select("SELECT id, postname, reference from posts where id=" . $data['post_id']);
            $candidats[$data['post_id']]['candidat'][] = Candidat::where('poste_id', $data['post_id'])
                ->whereNotNull('score_1')
                ->orderBy('score_1', $order)
                ->limit(8)
                ->get();
        }
        foreach ($candidats as $cs) {
            foreach ($cs['candidat'] as $ccs) {
                foreach ($ccs as $key => $candidat) {
                    if (($candidat->conformite_age == 'no' || $candidat->conformite_cin == 'no' || $candidat->conformite_diplome == 'no' || $candidat->conformite_permis == 'no' || $candidat->conformite_note == 'no'
                        || $candidat->conformite_etude_prepa == 'no' || $candidat->conformite_attestation_inscription == 'no' || $candidat->conformite_diplome_mecanique == 'no' || $candidat->conformite_attestation_scolarite == 'no')) {
                        $candidats[$data['post_id']]['candidat_not_confirmed'][] = $candidat;
                        unset($ccs[$key]);
                    } else {
                        $candidats[$data['post_id']]['candidat'][] = $candidat;
                    }
                }
            }
        }

        return view('concours.filter-accepted', [
            'candidats' => $candidats,
            'filter' => $filter,
        ]);
    }

    public
    function filtyerFinalAcceptedCandidate()
    {
        $data = Input::all();
        $filter = '';
        $candidats = [];
        if ($data['post_id']) {
            $filter = 2;
            $candidats[$data['post_id']]['poste'][] = DB::select("SELECT id, postname, reference from posts where id=" . $data['post_id']);
            $candidats[$data['post_id']]['candidat'][] = Candidat::where('poste_id', $data['post_id'])
                ->orderBy('score_2', 'DESC')
                ->limit(5)
                ->get();
        }
        return view('concours.filter-final-accepted', [
            'candidats' => $candidats,
            'filter' => $filter,
        ]);

    }

    public
    function filtyerListCandidate()
    {
        $data = Input::all();
        $candidats = [];
        if ($data['post_id']) {
            $candidats = Candidat::where('poste_id', $data['post_id'])->get();

        }
        return view('concours.filter-list', [
            'candidats' => $candidats,
        ]);
    }


    public
    function updateScore()
    {
        $candidats = User::where('role', 'ROLE_CANDIDAT')->get();
        foreach ($candidats as $candidat) {
            $this->calculateSecondScore($candidat->Candidat()->first()->id);
        }
    }

    public
    function ShowResult()
    {
        if (!\Auth::check()) {

            if (Config::get('app.locale') === 'ar') {

                Alert::error('', 'لم تقم بتسجيل الدخول')->persistent('إغلاق');
                return redirect()->route('show.login', Config::get('app.locale'));
            } else {

                Alert::error('', 'Vous n\'êtes pas connecté(e)')->persistent('Fermer');
                return redirect()->route('show.login', Config::get('app.locale'));
            }

        }
        $res = 0;
        $data = '';
        $user = User::where('id', Auth::id())->first();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $date_cloture = Date_cloture::where('id', 1)->first();
        $date_prevesoire = Date_cloture::where('id', 2)->first();
        $date_publicaltion = Date_cloture::where('id', 3)->first();
        $current_date = date("Y-m-d");

        if ($date_publicaltion->date_cloture <= $current_date) {
            $res = 1;
            if ($candidat->state_sending_mail) {
                $data = Message::where('id', $candidat->state_sending_mail)->first();
            } else {
                $data = 'Votre dossier est en cours de traitement';
                $res = 2;
            }
        } else {
            $res = 2;
            $data = 'Votre dossier est en cours de traitement';
        }


        return view('concours.result', [
            'res' => $res,
            'candidat' => $candidat,
            'data' => $data,
        ]);
    }


    public
    function candidatureHistory()
    {
        return view('candidature.history', [
            'historys' => CandidatHistory::all()]);
    }


}
