<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class passwordHistory extends Model
{

  //  use SoftDeletes;

    protected $table = 'password_history';

    protected $fillable = [
        'supervisor',
        'candidat',
        'cin',
    ];

}
