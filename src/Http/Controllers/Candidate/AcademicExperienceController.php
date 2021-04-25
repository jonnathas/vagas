<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\AcademicExperience;



class AcademicExperienceController extends BaseController
{
   
    public function create(){
        return view('vagas::candidate.academic-experience.create');
    }


    public function store(Request $request){

        $request->validate([
            'school_name'=> 'required',
            'course_name'=> 'required',
            'course_level'=> 'required',
            'country'=> 'required',
            'status'=> 'required',
            'start'=> 'required',
            'end'=> 'required'
        ]);

        $data = $request->except(['_token','user_id']);
        $data['user_id'] = auth()->user()->id;


        if(AcademicExperience::create($data)){
            return redirect()->back()->with('success','Cadastrado com sucesso');
        }
        return redirect()->back()->with('error','Erro ao cadastrar');
    }
    public function edit($id){

        $experience = AcademicExperience::find($id);

        return view('vagas::candidate.academic-experience.create',[
            'experience' => $experience
        ]);
    }

    public function update($id, Request $request){
        
        $experience = AcademicExperience::find($id);

        $experience->update($request->except(['_token','user_id']));
        $experience->save();

        return redirect()->back()->with('success','Atualizado com sucesso');
    }
    public function destroy($id){
        $experience = AcademicExperience::find($id);

        $experience->delete();

        return redirect()->back()->with('success','Deletado com sucesso');
    }
}
