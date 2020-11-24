<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class diplome extends Model
{
    protected $table = 'diplomes';
    protected $fillables = [
        'titre',
        'qualification',
        'poste_id',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post', 'poste_id', 'id');
    }
}
