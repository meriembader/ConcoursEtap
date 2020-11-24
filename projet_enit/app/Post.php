<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use SoftDeletes;

    protected $fillable = [
        'id',
        'postname',
        'reference',
        'qualification',
        'postnumber',
        'date_ouverture',
        'date_cloture',
        'period',

    ];

    public function candidats()
    {
        return $this->hasMany('App\Candidat');
    }

    public function diplomes()
    {
        return $this->hasMany('App\Diplome');
    }

    protected $table = 'posts';
}
