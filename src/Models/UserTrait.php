<?php 
namespace Jonnathas\Vagas\Models;

trait UserTrait{

    public function phones(){
        return $this->hasMany(Phone::class,'FK_user','id');
    }
    public function adresses(){
        return $this->hasMany(Address::class,'FK_user','id');
    }

}