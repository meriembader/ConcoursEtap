<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;


class MessageController extends Controller
{
    public function authorize()
    {
        return true;
    }

    /** 
     * Show all Messages
     */
    public function showMessage()
    {
        return view('messages.list', [
            'Message' => Message::all()
        ]);
    } 

    /**
     * edit Message
     */
    public function handleEditMessage()
    {
        $data = Input::all();
      
        Message::where('id', 1)->update([
            'objet' => $data['objet_1'],
            'msg' => $data['message_1'],
        ]);
        Message::where('id', 2)->update([
            'objet' => $data['objet_2'],
            'msg' => $data['message_2'],
        ]);
        Message::where('id', 3)->update([
            'objet' => $data['objet_3'],
            'msg' => $data['message_3'],
        ]);
        Message::where('id', 4)->update([
            'objet' => $data['objet_4'],
            'msg' => $data['message_4'],
        ]);
        Message::where('id', 5)->update([
            'objet' => $data['objet_5'],
            'msg' => $data['message_5'],
        ]);
        Message::where('id', 6)->update([
            'objet' => $data['objet_6'],
            'msg' => $data['message_6'],
        ]);

        Alert::success('message modifié !')->persistent('Fermer');
        return back();
    }

    /**
    * delete Msg
     */
    public function handleDeleteMessage()
    {
        $data = Input::all();
        $msg = Message::find($data['id']);
        if ($msg) {
            $msg->delete();
        } else {
            Alert::error('Vérifier l\'existance du message selectionné', 'Erreur')->persistent('Ok');
            return back();
        }
        Alert::success('message supprimé ', 'Succés')->persistent('Ok');
        return back();
    }


}
