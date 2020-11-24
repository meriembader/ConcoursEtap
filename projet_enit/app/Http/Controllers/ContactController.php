<?php

namespace App\Http\Controllers;

use App\Date_cloture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Contact;
use Auth;
use Illuminate\Validation\Rules\In;
use Alert;



class ContactController extends Controller
{

    public function authorize()
    {
        return true;
    } 
    public function showContactPage()
    {
        return view('contact.contactUS');
    }

    public function handleContactAdd(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'captcha' => 'required|captcha',
        ];
        $customMessages = [
            'required' => 'Champ Obligatoire',
            'email.email' => 'veuillez entrer une adresse email valide.',
            'captcha.captcha' => 'S\'il vous plaît vérifiez que vous n\'êtes pas un robot.'
        ];


        $this->validate($request, $rules, $customMessages);


        $data = Input::all();
        Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);

        Alert::success('', 'Message envoyé')->persistent('Fermer');

        return back();
    }

    public function getCantactList()
    {
        return view('contact.list',
            ['contacts' => Contact::all()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function getClotureDates()
    {
        return response()->json(['dates' => Date_cloture::all()]);
    }

    public function SaveDates()
    {
        $data = Input::all();
        Date_cloture::where('id', 1)->update(['date_cloture' => $data['date_1']]);
        Date_cloture::where('id', 2)->update(['date_cloture' => $data['date_2']]);
        Date_cloture::where('id', 3)->update(['date_cloture' => $data['date_3']]);
        return response()->json(['succes' => 1]);
    }
}
 


