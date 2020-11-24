<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendAttachement extends Mailable
{
    use Queueable, SerializesModels;

    private $candidat;
    // private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($candidat)
    {
        $this->candidat = $candidat;
        // $this->message = $mesage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd(storage_path("app\public\pdf") . "/".$this->candidat->id_dossier . '-fiche-inscription.pdf');
        //  dd(storage_path("app\public\pdf\ ", $this->candidat->id_dossier . '-fiche-inscription.pdf'));
        return $this->from(['contact@concours-etap.tn', 'ENIT'])->subject("Confirmation d'inscription")
            ->view('emails.enit-inscription', [
                    'candidat' => $this->candidat]
            //'data' => $this->message]
            )->attachFromStorage('pdfs/' . $this->candidat->id_dossier . '-fiche-inscription.pdf');
    }

}
