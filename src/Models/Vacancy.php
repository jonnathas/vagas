<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'description','role','wage','journey','contract','FK_user'
    ];

    protected $hidden = [

    ];

    public function address(){
        return $this->belongsTo(address::Class,'Fk_address','id');
    }

}
