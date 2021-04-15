<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;

use Jonnathas\Vagas\Models\Candidancy as Model;



class PersonalDataController extends BaseController
{   
    public function edit($id, Request $request){
        

        return view('vagas::candidate.personal-data.edit',[
            
            'user'=> User::find($id)
        ]);   
    }

    public function update($id, Request $request){
        
        $user = User::find($id);
        // update($request->except(['_token'])$user->);
        $user->birth_date = $request->birth_date;
        $user->name = $request->name;

        $user->save();

        return redirect()->back()->with('success','Atualizado com sucesso!');
    }
}
