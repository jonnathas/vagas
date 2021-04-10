<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicExperience extends Model
 
{
    protected $table = 'academic_experiences';
    protected $fillable = [
        'user_id','school_name','course_name','course_level','country','status','start','end'
    ];

    protected $hidden = [

    ];
}
