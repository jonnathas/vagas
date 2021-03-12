<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Vacancy as Model;


class Vacancy extends BaseController
{
   
    public function index(Request $request){

		$model = Model::where($request->except('_token'))->get();

		return view('vagas::candidate.vacancy.index',['vacancies'=> $model]);
    }
}
