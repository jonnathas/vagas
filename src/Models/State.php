<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name','abbreviation','id'
    ];

    protected $hidden = [

    ];

}
