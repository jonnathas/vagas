<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jonnathas\Vagas\Models\Vacancy as Model;
use Jonnathas\Vagas\Models\State;
use Jonnathas\Vagas\Models\Candidancy;


class Vacancy extends BaseController
{
   
    public function index(Request $request){

        //DB::enableQueryLog();

        $model = Model::where($request->except(['_token','page','role','FK_state']));

        if($request->input('role')){
            $model = Model::where("role",'like',"%".$request->input('role')."%");
        }

        if($request->input('FK_state')){            
            $model = $model->where('states.id',$request->input('FK_state'));
        }

        $model->join('adresses','vacancies.FK_address','adresses.id');
        $model->join('states','adresses.FK_state','states.id');
        

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
            'FK_user' => auth()->user()->id,
            'FK_vacancy' => $id
        ])->get();

        if($candidandy){
            $is_candidate = true;
        }else{
            $is_candidate = false;
        }
        
        $model = Model::find($id);
        $model->join('adresses','vacancies.FK_address','adresses.id');
        $model->join('states','adresses.FK_state','states.id');

        return view('vagas::candidate.vacancy.show',
            [
                'vacancy'=> $model,
                'is_candidate' => $is_candidate
            ]);
    }
}
