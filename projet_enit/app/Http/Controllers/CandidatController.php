<?php

namespace App\Http\Controllers;

use App\CandidatHistory;
use App\Diplome;
use App\Export\ExportFirstSelection;
use App\Export\ExportSelection;
use App\Export\finalListExport;
use App\Export\ListeAttenteExport;
use App\Export\ListeRejectedExport;
use App\Mail\DynamicMailSend;
use App\Mail\ResetPassword;
use App\Mail\sendAttachement;
use App\Message;
use App\passwordHistory;
use App\Post;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Candidat;
use App\City;
use App\Code;
use Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreSubscription;

use niklasravnsborg\LaravelPdf\Pdf;
use  PDFAnony\TCPDF\Facades\AnonyPDF;

use Carbon;
use DataTables;
use Alert;
use DB;
use App\Date_cloture;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\activation_admin_two;
use App\Export\Export;
use Config;


class CandidatController extends Controller
{

    public function authorize()
    {
        return true;
    }

    public function get_age(Request $request)
    {
        $input = $request->date;
        $date = strtr($input, '/', '-');

        return date('m/d/Y', strtotime($date));

    }

    public function get_user(Request $request)
    {
        if ($user = User::where('cin', $request->user_id)->count() > 0) {
            return response()->json('1');

        } else {
            return response()->json('0');
        }


    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }


    public function index()
    {
        if (session('password_entered')) {
            $date_cloture = DB::table('date_cloture')->orderBy('id', 'DESC')->first();

            $current_date = date("Y-m-d");

            return view('welcome')->with('date_cloture', $date_cloture)->with('current_date', $current_date);
        }

        return view('enter_password_page');

    }

    public function showCandidatAdd(Request $request)
    {
        if (session('password_entered')) {
            $res = 0;
            $date_cloture = Date_cloture::where('id', 1)->first();
            $current_date = date("Y-m-d");

            if ($date_cloture->date_cloture <= $current_date) {
                Alert::error('', 'Le concours était cloturée dans la date ' . $date_cloture->date_cloture)->persistent('fermer');
                return back();
            }
            if (is_null($request->post)) {
                $post_id = '0';
            } else {
                $post_id = $request->post;
            }
            $cities = City::all();
            $diplomes = Diplome::all();
            $poste = DB::table('posts')->get();


            return view("inscription.premiere-inscription", [
                'candidats' => Candidat::all(),
                'post_id' => $post_id,
                'cities' => $cities,
                'diplomes' => $diplomes,
                'res' => $res,

            ])
                ->with('posts', $poste);
        }
        return view('enter_password_page');

    }

    public function handleCandidatAdd(Request $request)
    {


        $data = Input::all();


        $rules = [
            'poste' => 'required',
            'p_ref' => ['required'],
        ];

        switch ($data['p_ref']) {
            case 'C01/2019':
            case 'C02/1/2019':
            case 'C02/2/2019':
            case 'C03/2019':
            case 'C04/1/2019':
            case 'C04/2/2019':
            case 'C04/3/2019':
                $rules += [

                    'poste' => 'required',
                    'captcha' => 'required|captcha',
                    'cin' => 'required|numeric|unique:users',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'confirm_cin' => 'required|numeric|same:cin',
                    'mobile_phone' => 'required',
                    'addresse' => 'required',
                    'diploma' => 'required',

                    'captcha' => 'required|captcha',
                ];
                break;

            case 'C05/1/2019':
            case 'C05/2/2019':
            case 'C06/1/2019':
            case 'C06/2/2019':
            case 'C06/3/2019':
            case 'C06/4/2019':
            case 'C06/5/2019':
            case 'C06/6/2019':
            case 'C06/7/2019':
            case 'C06/8/2019':
                $rules += [
                    'p_ref' => 'required',
                    'poste' => 'required',
                    'cin' => 'required|numeric|unique:users',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'confirm_cin' => 'required|numeric|same:cin',
                    'dob' => 'required',
                    'mobile_phone' => 'required',

                    'addresse' => 'required',
                    'captcha' => 'required|captcha',

                ];
                break;
            case 'C11/2019':
            case 'C12/2019':
            case 'C13/2019':
            case 'C09/2019':
                $rules += [
                    'p_ref' => 'required',
                    'poste' => 'required',
                    'cin' => 'required|numeric|unique:users',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'confirm_cin' => 'required|numeric|same:cin',
                    'dob' => 'required',
                    'mobile_phone' => 'required',
                    'captcha' => 'required|captcha',


                    'addresse' => 'required',

                ];
                break;
        }
        $messages =
            [
                'poste.required' => 'Veuillez choisir un poste',
                'captcha.required' => 'Ce champ est obligatoire',
                'last_name.required' => 'Ce champ est obligatoire',
                'first_name.required' => ' Ce champ est obligatoire',
                'cin.unique' => 'Déja utilisé',
                'cin.required' => 'Ce champ est obligatoire',
                'cin.numeric' => 'Ce champ doit être numeric',
                'cin.min' => 'Ce champ doit être composée de 8 chiffres',
                'confirm_cin.required' => 'Ce champ est obligatoire',
                'confirm_cin.numeric' => 'Ce champ doit être numeric',
                'confirm_cin.min' => 'Ce champ doit être composée de 8 chiffres',
                'confirm_cin.same' => 'Non Compatible',
                'dob.required' => 'Ce champ est obligatoire',
                'mobile_phone.required' => 'Ce champ est obligatoire',

                'confirm_email.unique' => 'Vous avez fournit une addresse mail déja utilisée',

                'confirm_email.same' => 'Non compatible',


                'addresse.required' => 'Ce champ est obligatoire',


                'diploma.required' => 'Ce champ est obligatoire',
                'level_studies.required' => 'Ce champ est obligatoire',
                'preparatory_study.required' => 'Ce champ est obligatoire',
                'Bachelor_degree.required' => 'Ce champ est obligatoire',
                'last_year_degree_without_pfe.required' => 'Ce champ est obligatoire',

                'last_year_degree_with_pfe.required' => 'Ce champ est obligatoire',
                'pfe_note.required' => 'Ce champ est obligatoire',

                'date_of_obtaining_a_driving_license.required' => 'Ce champ est obligatoire',

                'captcha.captcha' => 'S\'il vous plaît vérifiez que vous n\'êtes pas un robot',
                'captcha.required' => 'Ce champ est obligatoire',
            ];


        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);

        } else {



                      $user = User::create([
                          'name' => $data['last_name'] . $data['first_name'],
                          'email' => $data['email'],
                          'password' => bcrypt($data['password']),
                          'role' => 'ROLE_CANDIDAT',
                          'cin' => $data['cin'],
                      ]);
                      $post = Post::where('id', $data['poste'])->first();

                      if ((
                          $data['p_ref'] == "C10/2019"
                          || $data['p_ref'] == "C05/1/2019" || $data['p_ref'] == "C05/2/2019" || $data['p_ref'] == "C06/2/2019" || $data['p_ref'] == "C06/1/2019"
                          || $data['p_ref'] == "C06/3/2019" || $data['p_ref'] == "C06/4/2019" || $data['p_ref'] == "C06/5/2019" || $data['p_ref'] == "C06/6/2019"
                          || $data['p_ref'] == "C06/7/2019" || $data['p_ref'] == "C06/8/2019" || $data['p_ref'] == "C06/9/2019"  || $data['p_ref'] == "C08/2019"


                      )) {
                          $data['preparatory_study'] = null;
                          $data['level_studies'] = null;
                          $data['date_of_obtaining_a_driving_license'] = null;
                          $data['dip_m'] = null;
                      } else if ( $data['p_ref'] == "C12/2019" || $data['p_ref'] == "C13/2019") {
                          $data['preparatory_study'] = null;
                          $data['bureau'] = null;
                          $data['date_of_obtaining_a_driving_license'] = null;
                          $data['dip_m'] = null;

                      } else if ( $data['p_ref'] == "C11/2019" ) {
                          $data['preparatory_study'] = null;
                          $data['bureau'] = null;

                      }
                          else if ($data['p_ref'] == "C07/2019" || $data['p_ref'] == "C09/2019") {
                              $data['preparatory_study'] = null;
                              $data['level_studies'] = null;
                              $data['date_of_obtaining_a_driving_license'] = null;
                              $data['dip_m'] = null;

                      }   else if ( $data['p_ref'] == "C02/1/2019"
                      || $data['p_ref'] == "C02/2/2019"
                      || $data['p_ref'] == "C03/2019"
                      || $data['p_ref'] == "C04/1/2019"
                      || $data['p_ref'] == "C04/2/2019"
                      || $data['p_ref'] == "C04/3/2019"
                      || $data['p_ref'] == "C01/2019") {
                              $data['level_studies'] = null;
                              $data['date_of_obtaining_a_driving_license'] = null;
                              $data['dip_m'] = null;

                      }
                      $date = strtr($data['dob'], '/', '-');
                      $candidat = new  Candidat();
                      $candidat->id_dossier = uniqid();
                      $candidat->poste_id = $data['poste'];
                      $candidat->poste = $post->postname;
                      $candidat->last_name= $data['last_name'];
                      $candidat->place_of_birth= $data['place_of_birth'];
                      $candidat->addresse= $data['addresse'];
                      $candidat->governorate = null;
                      $candidat->Postal_code = null;
                      $candidat->diploma = $data['diploma'];
                      $candidat->level_studies = $data['level_studies'];
                      $candidat->preparatory_study = $data['preparatory_study'];
                      $candidat->Bachelor_degree= $data['Bachelor_degree'];
                      $candidat->last_year_degree_without_pfe = $data['last_year_degree_without_pfe'];
                      $candidat->note_pfe = $data['note_pfe'];
                      $candidat->note_pfe_avec_pfe = $data['note_pfe_avec_pfe'];



                      if($data['date_of_obtaining_a_driving_license']==null)
                      {
                          $candidat->date_of_obtaining_a_driving_license =null;
                          $candidat->dip_m = null;

                      }else if ($data['date_of_obtaining_a_driving_license']!=null)
                      {
                          $date_drive = strtr($data['date_of_obtaining_a_driving_license'], '/', '-');

                          $candidat->date_of_obtaining_a_driving_license = date("Y-m-d", strtotime($date_drive));
                          $candidat->dip_m = $data['dip_m'];
                      }

                      $candidat->first_name = $data['first_name'];
                      $candidat->cin = $data['cin'];
                      $candidat->birthday = date("Y-m-d", strtotime($date));
                      $candidat->diplome_id = $data['diploma'];
                      $candidat->mobile_phone=$data['mobile_phone'];
                      $candidat->dip_m = $data['dip_m'];

                      $candidat->confirm_password= bcrypt($data['confirm_password']);
                      $candidat->user_id= $user->id;
                      $candidat->status= 0;
                      $candidat->state_sending_mail = 0;
                      $candidat->conformite_attestation_inscription = $data['bureau'];

                      $candidat->save();

            $data = array(
                'name' => $request->last_name,
            );

            if ($candidat->user->email) {
                $this->generateAttachement($candidat->id);
            }
            $this->calculateFirstScore($candidat->id);
            $data_email = $data = Message::where('id', 1)->first();


            Auth::login($user);

            if (Config::get('app.locale') == 'ar') {
                Alert::success('', 'تم التسجيل  بنجاح')->persistent('إغلاق');
                return response()->json([
                    'url' => route('showCandidatdeuxiemeAdd_done', Config('app.locale')),
                ]);

            } else {

                Alert::success('', 'Votre inscription a été bien enregistrée')->persistent('Fermer');
                return response()->json([
                    'url' => 'candidate/register/done',
                ]);
            }


        }
    }


    public function showCandidatdeuxiemeAdd()
    {
        $res = 0;
        $date_cloture = Date_cloture::where('id', 1)->first();
        $date_prevesoire = Date_cloture::where('id', 2)->first();
        $date_publicaltion = Date_cloture::where('id', 3)->first();
        $current_date = date("Y-m-d");
        $data = '';
        $candidat = Candidat::where('user_id', Auth::id())->first();
        if ($date_cloture->date_cloture <= $current_date) {
            $data = Message::where('id', $candidat->state_sending_mail)->first();
            $res = 1;
        } else {
            $res = 0;

        }

        $cities = City::all();
        $postes = Post::all();
        $diplomes = Diplome::where('post_id', '=', $candidat->poste_id)->get();

        return view('inscription.deuxieme-inscription', [
            'post' => Post::where('id', $candidat->poste_id)->first(),
            'cities' => $cities,
            'candidat' => $candidat,
            'postes' => $postes,
            'res' => $res,
            'data' => $data,
            'date_prevesoire' => $date_prevesoire->date_cloture,
            'date_publicaltion' => $date_publicaltion,
            'date_cloture' => $date_cloture,
            'diplomes' => $diplomes,

            'current_date' => $current_date
        ]);
    }


    public function showCandidatdeuxiemeAdd_done()
    {
        $res = 0;
        $date_cloture = Date_cloture::where('id', 1)->first();
        $date_prevesoire = Date_cloture::where('id', 2)->first();
        $date_publicaltion = Date_cloture::where('id', 3)->first();
        $current_date = date("Y-m-d");
        $data = '';
        $candidat = Candidat::where('user_id', Auth::id())->first();

        if ($date_cloture->date_cloture <= $current_date || $date_prevesoire->date_cloture <= $current_date || $date_publicaltion->date_cloture <= $current_date) {
            $res = 1;
        } else {
            $data = Message::where('id', $candidat->state_sending_mail)->first();
        }

        $cities = City::all();
        $postes = Post::all();
        return view('inscription.complete', [
            'post' => Post::where('id', $candidat->poste_id)->first(),
            'cities' => $cities,
            'candidat' => $candidat,
            'postes' => $postes,
            'res' => $res,
            'data' => $data]);
    }

    function handleCandidatdeuxiemeAdd(Request $request)
    {
        $data = Input::all();

        $rules = [
            'poste' => 'required',
            'p_ref' => ['required'],
        ];


        switch ($data['p_ref']) {
            case 'C01/2019':
            case 'C02/1/2019':
            case 'C02/2/2019':
            case 'C03/2019':
            case 'C04/1/2019':
            case 'C04/2/2019':
            case 'C04/3/2019':
                $rules += [
                    'poste' => 'required',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'dob' => 'required',
                    'mobile_phone' => 'required',
                    'addresse' => 'required',
                    'captcha' => 'required|captcha',

                ];
                break;

            case 'C05/1/2019':
            case 'C05/2/2019':
            case 'C06/1/2019':
            case 'C06/2/2019':
            case 'C06/3/2019':
            case 'C06/4/2019':
            case 'C06/5/2019':
            case 'C06/6/2019':
            case 'C06/7/2019':
            case 'C06/8/2019':
                $rules += [
                    'p_ref' => 'required',
                    'poste' => 'required',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'dob' => 'required',
                    'mobile_phone' => 'required',
                    'captcha' => 'required|captcha',


                ];
                break;
            case 'C11/2019':
            case 'C12/2019':
            case 'C13/2019':
            case 'C09/2019':
                $rules += [
                    'p_ref' => 'required',
                    'poste' => 'required',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'mobile_phone' => 'required',
                    'addresse' => 'required',
                    'captcha' => 'required|captcha',


                ];
                break;
        }

        $messages =
            [
                'poste.required' => 'Veuillez choisir un poste',
                'last_name.required' => 'Ce champ est obligatoire',
                'first_name.required' => ' Ce champ est obligatoire',

                'mobile_phone.required' => 'Ce champ est obligatoire',

                'captcha.captcha' => 'S\'il vous plaît vérifiez que vous n\'êtes pas un robot',
                'captcha.required' => 'Ce champ est obligatoire',


            ];


        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);

        } else {
            $post = Post::where('id', $data['poste'])->first();
            $old_candidat = Candidat::where('id', $data['c_id'])->first();

            if ((
                $data['p_ref'] == "C10/2019"
                || $data['p_ref'] == "C05/1/2019" || $data['p_ref'] == "C05/2/2019" || $data['p_ref'] == "C06/2/2019" || $data['p_ref'] == "C06/1/2019"
                || $data['p_ref'] == "C06/3/2019" || $data['p_ref'] == "C06/4/2019" || $data['p_ref'] == "C06/5/2019" || $data['p_ref'] == "C06/6/2019"
                || $data['p_ref'] == "C06/7/2019" || $data['p_ref'] == "C06/8/2019" || $data['p_ref'] == "C06/9/2019" || $data['p_ref'] == "C08/2019"
                || $data['p_ref'] == "C02/2/2019"

            )) {
                $data['preparatory_study'] = null;
                $data['level_studies'] = null;
                $data['date_of_obtaining_a_driving_license'] = null;
                $data['dip_m'] = null;

            } else if ($data['p_ref'] == "C11/2019" || $data['p_ref'] == "C12/2019" || $data['p_ref'] == "C13/2019") {
                $data['preparatory_study'] = null;
                $data['bureau'] = null;

            } else if ($data['p_ref'] == "C07/2019" || $data['p_ref'] == "C09/2019") {
                $data['preparatory_study'] = null;
                $data['level_studies'] = null;
                $data['date_of_obtaining_a_driving_license'] = null;
                $data['dip_m'] = null;

            }

            $candidat = Candidat::where('id', $data['candidat_iddd'])->first();


            $user = User::where('id', $candidat->user_id)->first();


            $user->email = $data['email'];

            $user->update();


            if (!in_array($data['p_ref'], ['C11/2019', 'C12/2019', 'C13/2019'])) {
                $candidat->preparatory_study = $data['preparatory_study'];
                $candidat->Bachelor_degree = $data['Bachelor_degree'];
                $candidat->last_year_degree_without_pfe = $data['last_year_degree_without_pfe'];
                $candidat->note_pfe_avec_pfe = $data['note_pfe_avec_pfe'];
                $candidat->note_pfe = $data['note_pfe'];
                $candidat->level_studies = null;
                $candidat->date_of_obtaining_a_driving_license = null;
                $candidat->dip_m = null;


            } else if ($data['p_ref'] == 'C11/2019') {
                $candidat->level_studies = $data['level_studies'];
                $candidat->dip_m = $data['dip_m'];
                $date_drive = strtr($data['date_of_obtaining_a_driving_license'], '/', '-');

                $candidat->date_of_obtaining_a_driving_license = date("Y-m-d", strtotime($date_drive));
                $candidat->preparatory_study = null;
                $candidat->Bachelor_degree = null;
                $candidat->last_year_degree_without_pfe = null;
                $candidat->note_pfe_avec_pfe = null;
                $candidat->note_pfe = null;

            } else if ($data['p_ref'] == 'C12/2019') {
                $candidat->level_studies = $data['level_studies'];
                $candidat->dip_m = null;
                $candidat->date_of_obtaining_a_driving_license = null;
                $candidat->preparatory_study = null;
                $candidat->Bachelor_degree = null;
                $candidat->last_year_degree_without_pfe = null;
                $candidat->note_pfe_avec_pfe = null;
                $candidat->note_pfe = null;
            } else if ($data['p_ref'] == 'C13/2019') {
                $candidat->level_studies = $data['level_studies'];
                $candidat->dip_m = null;
                $candidat->date_of_obtaining_a_driving_license = null;
                $candidat->preparatory_study = null;
                $candidat->Bachelor_degree = null;
                $candidat->last_year_degree_without_pfe = null;
                $candidat->note_pfe_avec_pfe = null;
                $candidat->note_pfe = null;
            }
            $candidat->city_id = $old_candidat->city_id;


            $candidat->poste_id = $data['poste'];
            $candidat->poste = $post->postname;
            $candidat->cin = $data['cin'];
            $candidat->last_name = $data['last_name'];
            $candidat->first_name = $data['first_name'];
            $date = strtr($data['dob'], '/', '-');

            $candidat->birthday = date("Y-m-d", strtotime($date));
            $candidat->place_of_birth = $data['place_of_birth'];
            $candidat->mobile_phone = $data['mobile_phone'];
            $candidat->addresse = $data['addresse'];
            $candidat->code_id = null;


            if ($data['p_ref'] != 'C10/2019') {
                $candidat->diplome_id = $data['diploma'];
            }


            $candidat->status = 0;
            $candidat->confirm_password = $old_candidat->confirm_password;
            $candidat->user_id = $old_candidat->user_id;


            $candidat->governorate = null;

            $candidat->id_dossier = $old_candidat->id_dossier;
            $candidat->conformite_attestation_inscription = $data['bureau'];

            $candidat->update();
            $this->calculateFirstScore($candidat->id);


            CandidatHistory::create($old_candidat->toArray());
            if ($candidat->user->email) {
                $this->generateAttachement($candidat->id);
            }

            if (Config::get('app.locale') == 'ar') {
                Alert::success('', 'تم تحديث معلوماتك  بنجاح')->persistent('إغلاق');
                return response()->json([
                    'url' => route('showCandidatdeuxiemeAdd_up', Config('app.locale')),
                    'candidat' => $candidat,
                ]);

            } else {

                Alert::success('', 'Votre inscription a été modifiée avec succés ')->persistent('Fermer');
                return response()->json([
                    'url' => route('showCandidatdeuxiemeAdd_up', Config('app.locale')),
                    'candidat' => $candidat,
                ]);
            }


        }
    }


    public
    function codes($city_id)
    {
        $codes = Code::where('city_id', '=', $city_id)->get();
        return response()->json($codes);
    }

    public
    function get_dip($poste_id)
    {
        $diplomes = Diplome::where('post_id', '=', $poste_id)->get();
        return response()->json($diplomes);
    }

    public
    function diplomes()
    {
        $poste_id = Input::get('post_id');
        $diplomes = Diplome::where('post_id', '=', $poste_id)->get();
        return response()->json($diplomes);
    }


    public
    function showLogin()
    {
        if (session('password_entered')) {

            return view('auth.login', ['data' => $data = [
                'email' => '',
                'password' => '',
            ]]);
        }
        return view('enter_password_page');

    }

    public
    function handleLogin()
    {
        $data = Input::all();
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $messages =
            [
                'email.required' => 'Ce champ est obligatoire',
                'email.email' => 'Ce champ doit avoir le format email',
                'password.required' => 'mot de passe est obligatoire',
            ];
        $validation = Validator::make($data, $rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        $credentials = [
            'cin' => trim($data['email']),
            'password' => trim($data['password']),
        ];

        $date_cloture = DB::table('date_cloture')->first();
        $current_date = date("Y-m-d");

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Auth::login($user);
            if ($user->role == 'ROLE_ADMIN') {
                return redirect()->route('candidatures.list', config('app.locale'));
            } else if (Auth::user()->role == "ROLE_CANDIDAT") {


                return redirect()->route('showCandidatdeuxiemeAdd', config('app.locale'));

                if ($date_cloture < $current_date) {
                    return redirect()->route('showCandidatdeuxiemeAdd', config('app.locale'));
                } else {

                    return redirect()->route('ShowResult', config('app.locale'));

                }
            }
        } else {
            Alert::error('', 'Vérifiez vos paramètres de connexion !')->persistent('Fermer');
            return back();
        }
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
                $candidat->score_1 = $score;
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

    public
    function generateficheinscription($id)
    {
        $candidat = Candidat::where('cin', $id)->orderBy('created_at', 'desc')->first();


        $view = \View::make('pdf.fiche-inscription-pdf', [
            'candidat' => $candidat,
        ]);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Inscription');

    }

    public
    function generateficheinscription_AR($id)
    {

        $candidat = Candidat::where('cin', $id)->orderBy('created_at', 'desc')->first();

        $html = \View::make('pdf.fiche-inscription-arabe-pdf', ['candidat' => $candidat])->render(); // file render
        $pdfarr = [
            'title' => 'استمارة التسجيل',
            'data' => $html, // render file blade with content html
            'header' => ['show' => false], // header content
            'footer' => ['show' => false], // Footer content
            'font' => 'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size' => 12, // font-size
            'text' => '', //Write
            'rtl' => true, //true or false
            'filename' => ' التسجيل.pdf', // filename example - invoice.pdf
            'display' => 'print', // stream , download , print
        ];

        AnonyPDF::HTML($pdfarr);


    }

    public
    function listCandidatExport($type, $keyword)
    {

        return Excel::download(new Export($type, $keyword), 'all-candidats.xlsx');
    }

    public
    function FirstSelectExport($post, $limit)
    {
        $post = Post::where('id', $post)->first();
        $name = $post->reference . $post->postname . '.xlsx';
        $name = str_replace('/', '-', $name);

        return Excel::download(new ExportFirstSelection($post, $limit), $name);
    }

    public
    function FinalSelectExport($post, $limit)
    {
        return Excel::download(new finalListExport($post, $limit), 'final-selection-candidats.xlsx');
    }

    public
    function ListeAttenteExport($post, $limit)
    {
        return Excel::download(new ListeAttenteExport($post, $limit), 'listes-attente-candidats.xlsx');
    }

    public
    function exportRejected($post)
    {
        return Excel::download(new ListeRejectedExport($post), 'listes-rejetes.xlsx');
    }

    public
    function exportSelection()
    {
        $data = Input::all();
        $name = 'selection';
        if (count(explode(',', $data['ids'])) === 1 && !is_null($data['ids'])) {
            $candidat = Candidat::where('id', $data['ids'])->first();
            $name = $candidat->user->cin;
        }
        $name = $name . '.xlsx';

        return Excel::download(new ExportSelection($data['ids']), $name);
    }


    public
    function showResetPassword()
    {
        return view('auth.reset');
    }

    public
    function handleResetPassword(Request $request)
    {

        $rules = [
            'email' => 'required',
            'captcha' => 'required|captcha',
        ];
        $customMessages = [
            'required' => 'Champ Obligatoire',
            'captcha.captcha' => 'S\'il vous plaît vérifiez que vous n\'êtes pas un robot.'
        ];


        $this->validate($request, $rules, $customMessages);

        $data = Input::all();
        $user = User::where('cin', $data['email'])->first();
        if (!$user) {
            Alert::error('Alert !', "Aucune candidature avec cet CIN")->persistent('Fermer');
            return back();
        }
        if (is_null($user->email)) {
            Alert::error('Alert !', "Veuillez appeler les numero ci-dessous  +216 71 874 700 / +216 70 014 400")->persistent('Fermer');
            return back();
        }
        // dd($user);

        $password = uniqid();
        $user->password = bcrypt($password);
        $user->save();
        $user->setAttribute('unhashed', $password);
        if ($user->email) {
            Mail::to($user->email)->send(new ResetPassword($user));
        }
        Alert::success('', "Merci de consulter votre Email")->persistent('Fermer');
        return back();
    }

    public function randomRegrexTwoChar($length = 2)
    {
        $chars = "!@#$%^*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    public
    function newPassword()
    {
        $data = Input::all();
        $candidat = Candidat::where('id', $data['id'])->first();
        $pwd = substr(md5(mt_rand()), 0, 2) . strtoupper(str_random(2)) . $this->randomRegrexTwoChar() . strtolower(str_random(2));
        //dd(substr(md5(mt_rand()), 0, 2) . strtoupper(str_random(2)) . $this->randomRegrexTwoChar() . strtolower(str_random(2)));
        User::where('id', $candidat->user->id)
            ->update(['password' => bcrypt($pwd)]);
        passwordHistory::create([
            'supervisor' => auth()->user()->email,
            'candidat' => $candidat->first_name . ' ' . $candidat->last_name,
            'cin' => $candidat->user->cin,
        ]);
        return response()->json(['status' => 'changed', 'password' => $pwd]);

    }

    public function getPasswordHistory()
    {
        return view('password.history',
            ['password' => passwordHistory::all()]
        );
    }

    public function generateAttachement($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $view = \View::make('pdf.fiche-inscription-pdf', [
            'candidat' => $candidat,
        ]);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        $storage = Storage::put('pdfs/' . $candidat->id_dossier . '-fiche-inscription.pdf', $pdf->stream());
        if ($storage) {
            Mail::to($candidat->user->email)->send(new sendAttachement($candidat));
        }

    }
}
