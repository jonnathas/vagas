<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Candidancy extends Model
{
    protected $table = 'candidancies';
    
    protected $fillable = [
        'FK_user','FK_vacancy'
    ];

    protected $hidden = [

    ];
}
