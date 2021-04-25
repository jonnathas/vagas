<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\ProfessionalExperience;



class ProfessionalExperienceController extends BaseController
{
   
    public function create(){
        return view('vagas::candidate.professional-experience.create');
    }

    public function store(Request $request){
        
        $data = $request->except(['_token','user_id']);
        $data['user_id'] = auth()->user()->id;

        if(ProfessionalExperience::create($data)){
            return redirect()->back()->with('success','Experiencia profissional criada com sucesso!');
        }
        return redirect()->back()->with('success','Falha ao salvar sua experiencia profissional!');
    }

    public function edit($id){

        $experience = ProfessionalExperience::find($id);
        
        return view('vagas::candidate.professional-experience.create',[
            'experience' => $experience
        ]);
    } 

    public function update($id, Request $request){
        $experience = ProfessionalExperience::find($id);

        $data = $request->except(['_token','user_id']);
        $data['user_id'] = auth()->user()->id;

        if($experience->update($data)){

            $experience->save();

            return redirect()->back()->with('success','Experiencia profissional salva com sucesso!');
        }
        return redirect()->back()->with('success','Falha ao salvar sua experiencia profissional!');
    }

    public function destroy($id){
        $experience = ProfessionalExperience::find($id);
        $experience->delete();

        return redirect()->back()->with('success','Experiencia profissional deletada com sucesso!');
    }
}
