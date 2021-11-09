<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jonnathas\Vagas\Models\Vacancy as Model;
use Jonnathas\Vagas\Models\State;
use Jonnathas\Vagas\Models\Candidancy;


class VacancyController extends BaseController
{
   
    public function index(Request $request){

        
        //DB::enableQueryLog();

        $model = Model::where($request->except(['_token','page','role','state_id']));

        if($request->input('role')){
            $model = Model::where("role",'like',"%".$request->input('role')."%");
        }

        $model->join('adresses','vacancies.address_id','adresses.id');
        $model->join('states','adresses.state_id','states.id');

        $model->select(
            'states.id as fk_state',
            'adresses.id as fk_address',
            'vacancies.id as id',
            'role',
            'description',
            'wage',
            'journey',
            'contract'
            );
        
        if($request->input('state_id')){            
            $model = $model->where('states.id',$request->input('state_id'));
        }

        $model = $model->orderByDesc('vacancies.created_at');

        $model = $model->paginate(20);

        //dd(DB::getQueryLog());

        $search = $request->except(['_token','page']);

        $state = State::get();

		return view('vagas::candidate.vacancy.index',
            [
                'vacancies'=> $model,
                'search' => $search, 
                'states' => $state
            ]);
    }
    public function show($id, Request $request){

        $candidandy = Candidancy::where([
            'user_id' => auth()->user()->id,
            'vacancy_id' => $id
        ])->get();

        if($candidandy){
            $is_candidate = true;
        }else{
            $is_candidate = false;
        }
        
        $model = Model::find($id);
        $model->join('adresses','vacancies.address_id','adresses.id');
        $model->join('states','adresses.state_id','states.id');

        return view('vagas::candidate.vacancy.show',
            [
                'vacancy'=> $model,
                'is_candidate' => $is_candidate
            ]);
    }
}
