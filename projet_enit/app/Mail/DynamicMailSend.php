<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DynamicMailSend extends Mailable
{
    use Queueable, SerializesModels;

    private $candidat;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($candidat, $mesage)
    {
        $this->candidat = $candidat;
        $this->message = $mesage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['contact@concours-etap.tn', 'ENIT'])->subject($this->message->objet)
            ->view('emails.enit', [
                    'candidat' => $this->candidat,
                    'data' => $this->message]
            );
    }
}
