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

<<<<<<< HEAD
=======
    public function address(){
        return $this->belongsTo(address::Class,'Fk_address','id');
    }
    public function candidates(){
        return $this->belongsToMany('App\Models\User','candidancies','FK_vacancy','FK_user');
    }

>>>>>>> 2eedbcdd7798c16e08368ad326b13df701d9faa4
}
