<?php

namespace Jonnathas\Vagas\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Jonnathas\Vagas\Models\Vacancy as Model;
use Jonnathas\Vagas\Models\Address;
use Jonnathas\Vagas\Models\State;

class Vacancy extends BaseController
{
    
    public function create(){

        $state = State::get();

        return view('vagas::recruiter.vacancy.create',['states' => $state ]);
    }
    public function store(Request $request){

        $valided = $request->validate([
            'role' => ['min:3',"max:255",'required'],
            'description' => ['min:20',"max:2000",'required'],
            'wage' => ['required', 'numeric'],
            'journey' => ["max:255",'required'],
            'contract' => ["max:255",'required'],

            'FK_state' =>  ["max:255",'required'],

            'place' =>  ["max:255",'required'],
            'complement' =>  ["max:255",'required'],
            'number' => ["required"]
        ]);
        
        $vacancy = [
            'role' => $request->input('role'),
            'description' => $request->input('description'),
            'wage' => $request->input('wage'),
            'journey' => $request->input('journey'),
            'contract' => $request->input('contract'),
        ];

        $address = [
            'FK_state' => $request->input('FK_state'),
            'place' => $request->input('place'),
            'complement' => $request->input('complement'),
            'number' => $request->input('number')
        ];

        if(auth()->check()){
            $vacancy['FK_user'] = auth()->user()->id;
            $address['FK_user'] = auth()->user()->id;
        }


        $address = Address::create($address);

        $vacancy = Model::create($vacancy);

        $vacancy->address()->associate($address->id);   

        $state = State::get();

        return view('vagas::recruiter.vacancy.create',[
            'states' => $state,
            'success' =>'Cadastrado com sucesso.'
        ]); 
    }
}
