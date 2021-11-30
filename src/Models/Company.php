<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
 
{
    protected $table = 'companies';
    protected $fillable = [
        'user_id','name','cnpj'
    ];

    protected $hidden = [

    ];
}
