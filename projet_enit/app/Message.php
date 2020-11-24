<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'id',
        'objet',
        'msg',
    
    ];

    protected $table = 'message';

}