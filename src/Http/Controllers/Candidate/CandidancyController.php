<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Candidancy as Model;


class Candidancy extends BaseController
{
   
    public function store($id){

        $candidancy = Model::where([
            'user_id' => auth()->user()->id,
            'vacancy_id' => $id
        ])->exists();

        if(!$candidancy){
            Model::create([
                'user_id' => auth()->user()->id,
                'vacancy_id' => $id
            ]);
            return redirect('vacancy/'.$id)->with('success','Candidatura concluida.');
        } 
        return redirect('vacancy/'.$id)->with('error','Imposível candidatar-se mais de uma vez.');
    }
}
