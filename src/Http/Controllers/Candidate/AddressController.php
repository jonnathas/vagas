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
    }
}
