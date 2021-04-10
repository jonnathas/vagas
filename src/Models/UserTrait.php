<?php 
namespace Jonnathas\Vagas\Models;

trait UserTrait{

    public function phones(){
        return $this->hasMany(Phone::class,'user_id','id');
    }
    public function adresses(){
        return $this->hasMany(Address::class,'user_id','id');
    }
    public function academic_experiences(){
        return $this->hasMany(AcademicExperience::class,'user_id','id');
    }
    
    public function professional_experiences(){
        return $this->hasMany(ProfessionalExperience::class,'user_id','id');
    }
}