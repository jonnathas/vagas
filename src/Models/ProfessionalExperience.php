<?php

namespace Jonnathas\Vagas\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
 
{
    protected $table = 'professional_experiences';
    protected $fillable = [
        'FK_user','company','description','role','start','end'
    ];

    protected $hidden = [

    ];
}
