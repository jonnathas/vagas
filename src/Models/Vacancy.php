<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'description','role','wage','journey','contract','user_id'
    ];

    protected $hidden = [

    ];

    public function address(){
        return $this->belongsTo(Address::Class,'address_id','id');
    }
    public function candidates(){
        return $this->belongsToMany('App\Models\User','candidancies','vacancy_id','user_id');
    }
}
