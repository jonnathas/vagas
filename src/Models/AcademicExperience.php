<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicExperience extends Model
 
{
    protected $table = 'academic_experiences';
    protected $fillable = [
        'FK_user','school_name','school_level','country','status','start','end'
    ];

    protected $hidden = [

    ];
}
