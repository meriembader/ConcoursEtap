<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends Model


{
    use SoftDeletes;

    protected $fillable = [
        'candidat_id',
        'note_dossier',
        'note_psychotechnique',
        'note_question_ecrite',

        
    ];


    public function candidat()
    {
        return $this->belongsTo('App\Candidat', 'candidat_id', 'id');
    }

    protected $table = 'notes';
}
