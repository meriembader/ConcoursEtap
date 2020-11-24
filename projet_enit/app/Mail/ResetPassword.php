<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->user) {
            if ($this->user->role == 'ROLE_ADMIN') {
                return $this->from(['contact@concours-etap.tn', 'ENIT'])->subject('Password Reset')->view('auth.reset-mail-admin');
            } else {
                return $this->from(['contact@concours-etap.tn', 'ENIT'])->subject('Password Reset')->view('auth.reset-mail');
            }
        }
    }
}
