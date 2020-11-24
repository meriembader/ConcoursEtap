<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date_cloture extends Model
{
    protected $table='date_cloture';


    protected $fillable =
    [
        'id',
        'date_cloture'
    ];
}
