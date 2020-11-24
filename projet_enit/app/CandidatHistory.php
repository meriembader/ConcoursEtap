<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidatHistory extends Model
{
    use SoftDeletes;

    protected $table = 'candidats_history';

    protected $fillable = [
        'cin',
        'last_name',
        'first_name',
        'birthday',
        'place_of_birth',
        'mobile_phone',
        'status',
        'email',
        'password',
        'confirm_password',
        'addresse',
        'governorate',
        'Postal_code',
        'diploma',
        'diplome_id',
        'level_studies',
        'preparatory_study',
        'Bachelor_degree',
        'last_year_degree_without_pfe',
        'date_of_obtaining_a_driving_license',
        'score_1',
        'score_2',
        'state_sending_mail',
        'state_sending_sms',
        'reason_for_rejection',
        'poste',
        'conformite_age',
        'conformite_cin',
        'conformite_diplome',
        'conformite_permis',
        'conformite_note',
        'conformite_autre',
        'dossier_complet',
        'remarque',
        'poste_id',
        'user_id',
        'city_id',
        'code_id',
        'id_dossier',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post', 'poste_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function diplome()
    {
        return $this->belongsTo('App\Diplome', 'diplome_id', 'id');
    }

    public function notes()
    {
        return $this->hasMany('App\Notes');
    }

    public function governorat()
    {
        return $this->hasMany('App\City');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function code()
    {
        return $this->belongsTo('App\Code', 'code_id', 'id');
    }

}
