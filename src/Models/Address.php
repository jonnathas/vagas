<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'FK_state','place','complement','number','FK_user'
    ];

    protected $table = "adresses";

    protected $hidden = [

    ];

    public function vacancy(){
        return $this->hasMany(Vacancy::Class,'FK_address','id');
    } 

}
