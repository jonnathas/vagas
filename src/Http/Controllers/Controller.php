<?php

namespace Jonnathas\Vagas\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
   
    public function index(){

		//return print("olá mundo!!");

		return view('vagas::candidate.vacancy');

    }
}
