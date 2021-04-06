<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;

use Jonnathas\Vagas\Models\Candidancy as Model;



class PersonalData extends BaseController
{
   
    public function create(Request $request){

        return view('vagas::candidate.personal-data.create');
    }
    
    public function index(){

        $user = User::find(auth()->user()->id);
        $phone = $user->phones()->get();
        $address = $user->adresses()->get();

        return view('vagas::candidate.personal-data.index',[
            'user' => $user,
            'phones' => $phone,
            'adresses' => $address
        ]);
    }
    public function store(Request $request){

    }
}