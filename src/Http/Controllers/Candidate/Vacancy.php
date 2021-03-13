<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jonnathas\Vagas\Models\Vacancy as Model;
use Jonnathas\Vagas\Models\States;


class Vacancy extends BaseController
{
   
    public function index(Request $request){

        //DB::enableQueryLog();

        $model = Model::where($request->except(['_token','page','role']));

        if($request->input('role')){
            $model = Model::where("role",'like',"%".$request->input('role')."%");
        } 
        
        $model = $model->paginate(20);

        //dd(DB::getQueryLog());

        //$states = States::get();

        $search = $request->except(['_token','page']);

		return view('vagas::candidate.vacancy.index',
            [
                'vacancies'=> $model,
                'search' => $search , 
                ]);
    }
}
