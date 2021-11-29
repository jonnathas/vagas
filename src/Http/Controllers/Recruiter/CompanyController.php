<?php

namespace Jonnathas\Vagas\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Company;
use Jonnathas\Vagas\Models\Phone;

class CompanyController extends BaseController
{
    public function create(){

        return view('vagas::recruiter.company.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'cnpj' => 'required'
        ]);

        $data = $request->except(['_token']);
        $data['user_id'] = auth()->user()->id;
        
        if($company = Company::create($data)){

            return redirect('recruiter/company/'.$company->id.'/edit')->with('success', 'Informações salvas com sucesso!');
        }
        return redirect()->back()->with('error','Falha ao salvar!');
    }
    public function edit(){
    
        $company = Company::where('user_id',auth()->user()->id)->first();
    
        return view('vagas::recruiter.company.create',[
            'company' => $company
        ]);
    }
    public function update(Request $request,$company){
    
        $data = $request->except(['_token','user_id']);

        $company = Company::find($company);

        if($company->update($data)){
            return redirect()->back()->with('success', 'Sucesso ao salvar!');
        }
        return redirect()->back()->with('error','Falha ao salvar');
    }
}
    