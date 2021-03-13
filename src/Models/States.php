<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $fillable = [
        'name','abbreviation','id'
    ];

    protected $hidden = [

    ];

}
