<?php

namespace Jonnathas\Vagas\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Candidancy as Model;
use App\Models\User;


class Candidancy extends BaseController
{
   public function showCandidate($vacancy, $candidate){
    
        $candidancy = Model::where([
            'user_id' => $candidate,
            'vacancy_id' => $vacancy
        ])->get();

        if($candidancy){
            
            $user = User::find(auth()->user()->id);
            $phone = $user->phones()->get();
            $address = $user->adresses()->get();
            $academic_e = $user->academic_experiences()->get();
            $professional_e = $user->professional_experiences()->get();
            

            return view('vagas::recruiter.personal-data.index',[
                'user' => $user,
                'phones' => $phone,
                'adresses' => $address,
                'academic_experiences' => $academic_e,
                'professional_experiences' => $professional_e
            ]);
        }
   }

}
