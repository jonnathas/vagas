<?php

namespace Jonnathas\Vagas\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use Jonnathas\Vagas\Models\Vacancy as Model;
use Jonnathas\Vagas\Models\Address;
use Jonnathas\Vagas\Models\State;

class Vacancy extends BaseController
{
    public function index(Request $request){

        $vacancies = Model::where('FK_user',auth()->user()->id)
            ->orderByDesc('created_at')
            ->paginate(20);

        $search = $request->except(['_token','page']);

        return view('vagas::recruiter.vacancy.index',[
            'vacancies' => $vacancies,
            'search' => $search,
        ]);
    }
    public function create(){

        $states = State::get();

        return view('vagas::recruiter.vacancy.create',[
            'states' => $states
        ]);
    }
    public function store(Request $request){

        $request->validate([
            'role' => ['min:3',"max:255",'required'],
            'description' => ['min:20',"max:2000",'required'],
            'wage' => ['required', 'numeric'],
            'journey' => ["max:255",'required'],
            'contract' => ["max:255",'required'],
            
            'FK_state' => ["max:255",'required'],
            'place' => ["max:255",'required'],
            'complement' => ["max:255",'required'],
            'number' => ['required']
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

        $vacancy->save();   
        

        $state = State::get();

        Model::create($request->except('_token'));
        return view('vagas::recruiter.vacancy.create');
    }

    public function show($id, Request $request){
        $vacancy = Model::find($id);

        $candidates = $vacancy->candidates()->paginate(20);
    
        //DB::enableQueryLog();

        //dd(DB::getQueryLog());

        return view('vagas::recruiter.vacancy.show',[
            'vacancy' => $vacancy,
            'candidates' => $candidates
        ]);
    }
}
