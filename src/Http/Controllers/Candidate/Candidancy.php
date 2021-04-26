<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Candidancy as Model;


class Candidancy extends BaseController
{
   
    public function store($id, Request $request){

        $candidancy = Model::where([
            'user_id' => auth()->user()->id,
            'vacancy_id' => $id
        ])->get();

        if(!$candidancy){
            Model::create([
                'user_id' => auth()->user()->id,
                'vacancy_id' => $id
            ]);
            return redirect('vacancy/'.$id);
        } 
    }
}
