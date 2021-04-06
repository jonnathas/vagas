<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'number','FK_user','id'
    ];

    protected $hidden = [

    ];

}
