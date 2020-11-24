<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diplome extends Model


{
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'titre',
        'qualification',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function candidat()
    {
        return $this->hasMany('App\Candidat');

    }

    protected $table = 'diplomes';
}
