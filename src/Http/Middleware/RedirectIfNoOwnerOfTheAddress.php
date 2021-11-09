<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Address; 

class RedirectIfNoOwnerOfTheAddress
{

    public function handle($request, Closure $next){

        //dd($request->route()->parameters('teste'));

        $address = Address::find($request->route('address'));

        if((isset($address->user_id))&&($address->user_id != auth()->user()->id)){
            return redirect()->back()->with('error','Acesso negado. É preciso ser o criador deste endereço!');
        }
        return $next($request); 
    }
}
