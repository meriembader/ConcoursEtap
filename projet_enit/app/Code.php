<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Code extends Model
{
    use SoftDeletes;

    protected $fillable =[

        'codenumber',
        'city_id'
    ];
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function candidat()
    {
        return $this->hasMany('App\Candidat');
    }

    protected $table = 'codes';
}
