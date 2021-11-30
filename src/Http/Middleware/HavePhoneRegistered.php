<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Phone; 

class HavePhoneRegistered
{

    public function handle($request, Closure $next){

        //dd($request->route()->parameters('teste'));

        $phone_count = Phone::where('user_id',auth()->user()->id)->count();

        if($phone_count < 1){
            return redirect('phone/create')->with('error','Acesso negado. Cadastre um numero de telefone!');
        }
        return $next($request); 
    }
}
