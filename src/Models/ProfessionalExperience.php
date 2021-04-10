<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
 
{
    protected $table = 'professional_experiences';
    protected $fillable = [
        'user_id','company','description','role','start','end'
    ];

    protected $hidden = [

    ];
}
