<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'description','role','wage','journey','contract'
    ];

    protected $hidden = [

    ];

}
