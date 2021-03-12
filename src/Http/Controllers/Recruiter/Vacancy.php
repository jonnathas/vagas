<?php

namespace Jonnathas\Vagas\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Jonnathas\Vagas\Models\Vacancy as Model;

class Vacancy extends BaseController
{
    
    public function create(){
        return view('vagas::recruiter.vacancy.create');
    }
    public function store(Request $request){

        $validation = $request->validate([
            'role' => ['min:3',"max:255",'required'],
            'description' => ['min:20',"max:2000",'required'],
            'wage' => ["max:255",'required', 'numeric'],
            'journey' => ["max:255",'required'],
            'contract' => ["max:255",'required']
        ]);

        Model::create($request->except('_token'));
        return view('vagas::recruiter.vacancy.create');
    }
}
