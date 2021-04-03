<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
 
{
    protected $table = 'adresses';
    protected $fillable = [
        'FK_user','FK_state','place','complement','number'
    ];

    protected $hidden = [

    ];
}
