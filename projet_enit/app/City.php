<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name,name_AR",
    ];


    public function codes()
    {
        return $this->hasMany('App\Code');
    }

    public function candidat()
    {
        return $this->hasMany('App\Candidat');
    }

    protected $table = 'cities';
}
