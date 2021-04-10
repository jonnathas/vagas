<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
 
{
    protected $table = 'adresses';
    protected $fillable = [
        'user_id','state_id','place','complement','number'
    ];

    protected $hidden = [

    ];
}
