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

    public function address(){
        return $this->belongsTo(Address::Class,'Fk_address','id');
    }
    public function candidates(){
        return $this->belongsToMany('App\Models\User','candidancies','FK_vacancy','FK_user');
    }
}
