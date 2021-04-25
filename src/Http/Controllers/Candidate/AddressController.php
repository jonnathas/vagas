<?php

namespace Jonnathas\Vagas\Http\Controllers\Candidate;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Address;
use Jonnathas\Vagas\Models\State;


class AddressController extends BaseController
{
    public function create(){

        $states = State::get();

        return view('vagas::candidate.address.create',[
            'states' => $states 
        ]); 
    }
    public function edit($id){

        $address = Address::find($id);

        $states = State::get();

        return view('vagas::candidate.address.create',[
            'states' => $states,
            'address' => $address
        ]); 
    }
    public function update($id, Request $request){
        
        $data = $request->except(['_token','user_id']);

        $address = Address::find($id);

        if($address->update($data)){
            return redirect()->back()->with('success', 'Sucesso ao salvar!');
        }

        return redirect()->back()->with('error','Falha ao salvar');
    }

    public function store(Request $request){

        $request->validate([
            'state_id' => 'required',
            'place' => 'required | min:5',
            'complement' => 'required | min:5',
            'number' => 'required'
        ]);

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;

        if(Address::create($data)){
            return redirect()->back()->with('success', 'Endereço salvo com sucesso!');
        }
        return redirect()->back()->with('error','Falha ao salvar!');

    }
    public function destroy($id){
        
        $address = Address::find($id);
        
        if($address->delete()){
            return redirect()->back()->with('success', 'Endereço deletado com sucesso!');

        }
        return redirect()->back()->with('error', 'Erro ao deletar!');
         
    }
}
