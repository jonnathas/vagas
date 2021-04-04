<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Candidancy as Model;



class PersonalData extends BaseController
{
   
    public function create(Request $request){

        return view('vagas::candidate.personal-data.create');
    }
    
    public function index(){

        return view('vagas::candidate.personal-data.index');
    }
    public function store(Request $request){

    }
}
