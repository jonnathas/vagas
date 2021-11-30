<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Company; 

class HaveCompanyRegistered
{

    public function handle($request, Closure $next){

        //dd($request->route()->parameters('teste'));

        $company_count = Company::where('user_id',auth()->user()->id)->count();

        if($company_count < 1){
            return redirect('recruiter/company')->with('error','Acesso negado. É preciso cadastrar o nome e o CNPJ da empresa!');
        }
        return $next($request); 
    }
}
