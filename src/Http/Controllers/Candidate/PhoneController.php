<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Jonnathas\Vagas\Models\Phone;

use Jonnathas\Vagas\Models\Candidancy as Model;



class PhoneController extends BaseController
{   
    public function edit($id,Request $request){

        $phone = Phone::find($id);

        return view('vagas::candidate.phone.create',[
            'phone' => $phone,
            ]);
    }
    public function create(){
        return view('vagas::candidate.phone.create');
    }
    public function store(Request $request){

        $request->validate([
            'number' => 'required | min:8 | max:20'
        ]);

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;

        $create = Phone::create($data);

        return redirect()->back()->with('success','Telefone cadastrado com sucesso!');
    }

    public function update($id, Request $request){
        $phone = Phone::find($id);
        $phone->update($request->except(['_token','user_id']));
        $phone->save();

        return redirect()->back()->with('success','Telefone atualizado com sucesso!');


    }
    public function destroy($id){

        $phone = Phone::find($id);
        $phone->delete();

        return redirect('curriculum')->with('success','Telefone deletado com sucesso!');
    }

}
