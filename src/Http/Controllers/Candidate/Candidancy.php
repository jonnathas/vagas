<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Candidancy as Model;



class Candidancy extends BaseController
{
   
    public function store($id, Request $request){

        $candidandy = Model::where([
            'FK_user' => auth()->user()->id,
            'FK_vacancy' => $id
        ])->get();

        if($candidandy){
            Model::create([
                'FK_user' => auth()->user()->id,
                'FK_vacancy' => $id
            ]);
            return redirect('vacancy/'.$id);
        }
        
        
    }
}
