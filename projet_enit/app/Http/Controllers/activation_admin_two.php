<?php


namespace App\Http\Controllers;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class activation_admin_two extends Mailable
{
    public function authorize()
    {
        return true;
    }  



    use Queueable, SerializesModels;





    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */



    public function build()
    {
        return $this->from('meriembader97@gmail.com')
            ->subject('[RE] Condidature ')
            ->view('emails.activated_Inscription')
            ->with('data', $this->data);
    }

}