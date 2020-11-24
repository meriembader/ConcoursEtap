<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Notifications\SMSNotification;
use Notification;
use App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function authorize()
    {
        return true;
    }

    public function sendSmsNotif()
    {

        $user = new User();
        $user->phone_number = '+21629156804';   // Don't forget specify country code.
        $user->notify(new SMSNotification());
    }

    public function ChangeLanguage(String $locale)
    {
        App::setLocale($locale);

        session(['locale' => $locale]);
        return back();

    }

    public function getAllCandidatures()
    {
        return view('candidature.list',
            ['candidats' => App\Candidat::all(),
                'postes' => Post::all()
            ]

        );
    }
}
